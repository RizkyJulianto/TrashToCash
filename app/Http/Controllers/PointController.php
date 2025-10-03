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

      $recentSubmission = $query->orderBy('created_at', 'desc')->paginate(5);

      if ($recentSubmission->isEmpty() && $request->filled('search')) {
         return redirect()->route('point-submission')->with('warning', 'Tidak ada data ditemukan! Mohon periksa kembali kata kunci Anda.');
      }
      return view('dashboard.user.point-submission', compact('recentSubmission'));
   }


   public function show(string $id)
   {
      $transaction = Transaction::findOrfail($id);
      if ($transaction->type === 'Barang') {
         return view('dashboard.user.detail-product-submission', compact('transaction'));
      } else if ($transaction->type === 'Tunai') {
         return view('dashboard.user.detail-cash-submission', compact('transaction'));
      }
   }
}
