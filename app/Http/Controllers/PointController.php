<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $recentSubmission = Transaction::whereIn('type',['Barang','Tunai'])->orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.user.point-submission', compact('recentSubmission'));
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
         $transaction = Transaction::findOrfail($id);
      if($transaction->type === 'Barang') {
         return view('dashboard.user.detail-product-submission', compact('transaction'));
      }  else if($transaction->type === 'Tunai') {
         return view('dashboard.user.detail-cash-submission', compact('transaction'));
      }
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
