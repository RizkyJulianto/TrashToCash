<?php

namespace App\Http\Controllers\mitra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Product::where('mitra_id', $user->id);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name_product', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }

        $product = $query->paginate(5); 

        if ($product->isEmpty() && $request->filled('search')) {
            return redirect()->route('list.product')->with('warning', 'Tidak ada data produk ditemukan! Mohon periksa kembali kata kunci Anda.');
        }
        return view('dashboard.mitra.products', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.mitra.add-products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name_product' => 'required|string|max:255',
            'stock' => 'required|numeric',
            'product_point' => 'required|numeric',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name_product.required' => 'Kamu harus memasukan nama produk',
            'stock.required' => 'Kamu harus memasukan stok produk',
            'stock.numeric' => 'Stok produk harus angka',
            'product_point.required' => 'Kamu harus memasukan poin untuk produk',
            'product_point.numeric' => 'Poin produk harus angka',
            'description.required' => 'Kamu harus mengisi deskripsi',
            'description.max' => 'Deskripsi yang diisi melebih batas karakter',
            'photo.mimes' => 'Format untuk foto harus jpg, jpeg, png',
            'photo.image' => 'Kamu bukan memasukan foto',
            'photo.max' => 'Foto yang kamu masukan ukurannya terlalu besar',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $upload_path = $request->file('photo')->store('products', 'public');

        $products = Product::create([
            'mitra_id' => $user->id,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'stock' => $request->stock,
            'product_point' => $request->product_point,
            'photo' => $upload_path,
        ]);



        return redirect()->route('list.product')->with('success', 'Tambah data produk berhasil! Silakan cek pada dashboard.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrfail($id);
        return view('dashboard.mitra.detail-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrfail($id);
        return view('dashboard.mitra.edit-products', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrfail($id);
        $validator = Validator::make($request->all(), [
            'name_product' => 'required|string|max:255',
            'stock' => 'required|numeric',
            'product_point' => 'required|numeric',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name_product.required' => 'Kamu harus memasukan nama produk',
            'stock.required' => 'Kamu harus memasukan stok produk',
            'stock.numeric' => 'Stok produk harus angka',
            'product_point.required' => 'Kamu harus memasukan poin untuk produk',
            'product_point.numeric' => 'Poin produk harus angka',
            'description.required' => 'Kamu harus mengisi deskripsi',
            'description.max' => 'Deskripsi yang diisi melebih batas karakter',
            'photo.mimes' => 'Format untuk foto harus jpg, jpeg, png',
            'photo.image' => 'Kamu bukan memasukan foto',
            'photo.max' => 'Foto yang kamu masukan ukurannya terlalu besar',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo_path = $product->photo;

        if ($request->hasFile('photo')) {
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            $photo_path = $request->file('photo')->store('products', 'public');
        }

        $product->update([
            'name_product' => $request->name_product,
            'description' => $request->description,
            'stock' => $request->stock,
            'photo' => $photo_path,
            'product_point' => $request->product_point,
        ]);


        return redirect()->route('list.product')->with('success', 'Data produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrfail($id);
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }
        $product->delete();

        return redirect()->route('list.product')->with('success', 'Produk berhasil dihapus');
    }
}
