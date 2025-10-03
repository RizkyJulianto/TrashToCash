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
            $totalUsers = User::where('role', 'User')->count();
            $submissions = Transaction::with(['Users', 'Tps'])
                ->whereIn('type', ['Sampah', 'Tunai'])->orderBy('created_at', 'desc')->paginate(5);

            $trashSubmissions = Transaction::where('type', 'Sampah')->count();
            $cashSubmissions = Transaction::where('type', 'Tunai')->count();

            return view('dashboard.admin.admin', compact('user', 'totalUsers', 'submissions', 'trashSubmissions', 'cashSubmissions'));
        } else if ($user->role === 'Mitra') {
            $query = Transaction::where('users_id', $user->id);
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where('trash', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            }



            $totalProduct = Product::where('mitra_id', $user->id)->count('id');
            $recentSubmission = Transaction::with(['Users', 'Products'])->where('type', 'Barang')->whereHas('Products', function ($query) use ($user) {
                $query->where('mitra_id', $user->id);
            })->orderBy('created_at', 'desc')->get();


            return view('dashboard.mitra.mitra', compact('user',  'totalProduct', 'recentSubmission'));
        } else {
            $query = Transaction::where('users_id', $user->id)
                ->where('type', 'Sampah') 
                ->with('Tps');

            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('trash', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
                });

                $query->orWhereHas('Tps', function ($q) use ($search) {
                    $q->where('name_tps', 'like', '%' . $search . '%');
                });
            }

            $recentSubmission = $query->orderBy('created_at', 'desc')->paginate(5);

            if ($recentSubmission->isEmpty() && $request->filled('search')) {
                return redirect()->route('user.dashboard')->with('warning', 'Tidak ada data ditemukan! Mohon periksa kembali kata kunci Anda.');
            }

            $totalWeight = Transaction::where('users_id', $user->id)->where('type', 'Sampah')->sum('weight');

            return view('dashboard.user.user', compact('user', 'recentSubmission', 'totalWeight'));
        }
    }
}
