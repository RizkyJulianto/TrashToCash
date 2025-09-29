<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::orderBy('created_at','desc')->paginate(5);
        return view('dashboard.user.history', compact('transaction'));
    }

    
}
