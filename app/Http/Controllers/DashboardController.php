<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role === 'Admin') {
            return view('dashboard.admin.admin');
        } else if($user->role === 'Mitra') {
            return view('dashboard.mitra.mitra');
        } else {
            $transaction = Transaction::where('users_id', $user->id)->with('Tps')->orderBy('created_at','desc')->get();
            $totalWeight = Transaction::where('type', 'trash')->sum('weight');
            return view('dashboard.user.user', compact('user','transaction', 'totalWeight'));
        }
    }

}
