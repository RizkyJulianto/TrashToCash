<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowTpsController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $query = Tps::orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name_tps', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        }
        $tps = $query->paginate(5);

        if ($tps->isEmpty() && $request->filled('search')) {
            return redirect()->route('list.tps')->with('warning', 'Tidak ada data ditemukan! Mohon periksa kembali kata kunci Anda.');
        }
        return view('dashboard.user.tps', compact('user', 'tps'));
    }
}
