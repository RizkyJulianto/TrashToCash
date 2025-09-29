<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->role === 'Admin') {
            return view('dashboard.admin.admin');
        } else if ($user->role === 'Mitra') {
            $query = Transaction::where('users_id', $user->id);
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('trash', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            }

            
        
            
            $totalProduct = Product::where('mitra_id', $user->id)->count('id');
            $recentSubmission = Transaction::with(['Users','Products'])->where('type', 'Barang')->whereHas('Products', function($query) use ($user) {
                $query->where('mitra_id', $user->id);
            })->orderBy('created_at','desc')->get();
           

            return view('dashboard.mitra.mitra', compact('user', 'transaction', 'totalProduct','recentSubmission'));
            
        } else {
          $query = Transaction::where('users_id', $user->id);
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('trash', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            }

            
            $recentSubmission = Transaction::with(['Users','Tps'])->where('type', 'Sampah')->whereHas('Tps', function($query) use ($user) {
                $query->where('tps_id', $user->id);
            })->orderBy('created_at','desc')->paginate(5);
            
            $totalWeight = Transaction::where('users_id', $user->id)->sum('weight');

            return view('dashboard.user.user', compact('user', 'recentSubmission', 'totalWeight'));
        }   
    }
}
