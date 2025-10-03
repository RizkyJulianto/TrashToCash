<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $user = Auth::user();
        $query = Transaction::where('users_id', $user->id)
            ->whereIn('type', ['Barang', 'Tunai']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('type', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $transaction = $query->orderBy('created_at', 'desc')->paginate(5);

        if ($transaction->isEmpty() && $request->filled('search')) {
            return redirect()->route('history')->with('warning', 'Tidak ada data ditemukan! Mohon periksa kembali kata kunci Anda.');
        }
        return view('dashboard.user.history', compact('transaction'));
    }
}
