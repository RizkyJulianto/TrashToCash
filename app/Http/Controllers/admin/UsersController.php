<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        $query = User::where('role', 'User')->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        $users = $query->paginate(5);

        if ($users->isEmpty() && $request->filled('search')) {
            return redirect()->route('data-users')->with('warning', 'Tidak ada data produk ditemukan! Mohon periksa kembali kata kunci Anda.');
        }
        return view('dashboard.admin.users', compact('users'));
    }

    public function destroy(string $id)
    {

        $user = User::findOrFail($id);
        if (Auth::id() === $user->id) {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
