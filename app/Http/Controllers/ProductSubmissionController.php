<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.user.product-submission', compact('products'));
    }

   public function redeem(Request $request, Product $product) {

    // dd('stok produk:' .$product->stock, 'jumlah dimintaa: '. $request->input('quantity',1));
    // dd($product->stock);
     $user = Auth::user();
     $quantity = $request->input('quantity',1);

     $request->validate([
        'quantity' => 'required|numeric|min:1',

     ],[
        'quantity.required' => 'Kamu harus mengisi jumlah produk untuk ditukar',
        'quantity.numeric' => 'Jumlah yang disi harus angka',
        'quantity.min' => 'Kamu harus mengisi jumlah produk minimal 1',
     ]);


     if($user->point < ($product->product_point * $quantity)) {
        return redirect()->back()->with('error', 'Poin kamu tidak cukup untuk menukar produk ini');
     }


     if($product->stock < $quantity) {
         return redirect()->back()->with('error', 'Maaf, stok produk tidak mencukupi');
     }

     DB::transaction(function () use ($user,$product,$quantity){
         $user->point -= $product->product_point * $quantity;
         $user->save();
         $product->stock -= $quantity;
         $product->save();

         Transaction::create([
            'users_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'type' => 'Barang',
            'description' => 'Penukaran '. $product->name_product . ' dengan jumlah '. $quantity,
            'points' => $product->product_point * $quantity,
            'status' => 'Pending',
         ]);
     });
     
     return redirect()->route('point-submission')->with('success', 'Kamu berhasil menukar produk! Silahkan Datang kemitra terdekat');
   }

   
}
