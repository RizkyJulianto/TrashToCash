<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tps;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tps = Tps::orderBy('created_at', 'desc')->paginate(5);
        return view('dashboard.admin.tps', compact('tps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.add-tps');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_tps' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:255',
        ], [
            'name_tps.required' => 'Kamu harus memasukan nama tps',
            'phone_number.required' => 'Kamu harus memasukan nomor telepon ',
            'phone_number.numeric' => 'Nomor telepon produk harus angka',

            'address.required' => 'Kamu harus mengisi alamat',
            'address.max' => 'Alamat yang diisi melebih batas karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $tps = Tps::create([
            'name_tps' => $request->name_tps,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);



        return redirect()->route('data-tps')->with('success', 'Tambah data tps berhasil! Silakan cek pada dashboard.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tps = Tps::findOrFail($id);
        return view('dashboard.admin.detail-tps', compact('tps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tps = Tps::findOrfail($id);
        return view('dashboard.admin.edit-tps', compact('tps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tps = Tps::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name_tps' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:255',
        ], [
            'name_tps.required' => 'Kamu harus memasukan nama tps',
            'phone_number.required' => 'Kamu harus memasukan nomor telepon ',
            'phone_number.numeric' => 'Nomor telepon produk harus angka',

            'address.required' => 'Kamu harus mengisi alamat',
            'address.max' => 'Alamat yang diisi melebih batas karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $tps->update([
            'name_tps' => $request->name_tps,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);



        return redirect()->route('data-tps')->with('success', 'Ubah data tps berhasil! Silakan cek pada dashboard.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tps = Tps::findOrFail($id);
        if (Auth::id() === $tps->id) {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus data ini.');
        }

        $tps->delete();

        return redirect()->route('data-tps')->with('success', 'Data berhasil dihapus.');
    }
}
