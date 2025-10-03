<?php

namespace App\Http\Controllers\mitra;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Transaction::with(['Users', 'Products'])
            ->where('type', 'Barang')
            ->whereHas('products', function ($q) use ($user) {
                $q->where('mitra_id', $user->id);
            });

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->whereHas('Products', function ($q_prod) use ($search) {
                    $q_prod->where('name_product', 'like', '%' . $search . '%');
                })->orWhereHas('Users', function ($q_user) use ($search) {
                    $q_user->where('name', 'like', '%' . $search . '%');
                });
            });
        }

        $recentSubmission = $query->orderBy('created_at', 'desc')->paginate(5);

        if ($recentSubmission->isEmpty() && $request->filled('search')) {
            return redirect()->route('list.product-verifications')->with('warning', 'Tidak ada data ditemukan! Mohon periksa kembali kata kunci Anda.');
        }

        $totalProduct = Product::where('mitra_id', $user->id)->count('id');

        return view('dashboard.mitra.product-verifications', compact('user', 'totalProduct', 'recentSubmission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('dashboard.mitra.detail-verifications', compact('transaction'));
    }

    public function verify(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($transaction->status !== 'Pending') {
            return redirect()->back()->with('error', 'Pengajuan tidak dapat diverifikasi.');
        }

        DB::transaction(function () use ($transaction) {

            $transaction->status = 'Sukses';
            $transaction->save();
        });

        return redirect()->route('list.product-verifications')->with('success', 'Pengajuan berhasil diverifikasi.');
    }

    public function reject(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($transaction->status !== 'Pending') {
            return redirect()->back()->with('error', 'Pengajuan tidak dapat ditolak.');
        }

        DB::transaction(function () use ($transaction) {
            $user = $transaction->Users;
            $product = $transaction->Products;


            $user->point += $transaction->points;
            $user->save();




            $product->stock += $transaction->quantity;
            $product->save();


            $transaction->status = 'Gagal';
            $transaction->points = 0;
            $transaction->save();
        });

        return redirect()->route('list.product-verifications')->with('success', 'Pengajuan berhasil ditolak.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
