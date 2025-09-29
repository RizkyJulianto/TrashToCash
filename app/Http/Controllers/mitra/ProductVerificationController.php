<?php

namespace App\Http\Controllers\mitra;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $user = Auth::user();
       $query = Transaction::where('users_id', $user->id);
            // if ($request->filled('search')) {
            //     $search = $request->input('search');
            //     $query->where('trash', 'like', '%' . $search . '%')
            //           ->orWhere('description', 'like', '%' . $search . '%');
            // }

            
            $transaction = $query->with('Tps')
                                  ->orderBy('created_at', 'desc')
                                  ->get();
            
            // if($transaction->isEmpty() && $request->filled('search')) {
            //     return redirect()->back()->with('warning', 'Tidak ada data ditemukan! Mohon periksa kata kunci anda');
            // }
            
            
            $totalProduct = Product::where('mitra_id', $user->id)->count('id');
            $recentSubmission = Transaction::with(['Users','Products'])->where('type', 'Barang')->whereHas('Products', function($query) use ($user) {
                $query->where('mitra_id', $user->id);
            })->orderBy('created_at','desc')->get();
           

            return view('dashboard.mitra.product-verifications', compact('user', 'transaction', 'totalProduct','recentSubmission'));
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
        //
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
