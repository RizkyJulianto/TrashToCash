<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $transaction = Transaction::where('users_id', $user->id)->with('Tps')->orderBy('created_at','desc')->get();
        $tpsList = Tps::all();
        return view('dashboard.user.trash-submission', compact('transaction', 'tpsList'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'tps_id' => 'required|numeric',
            'trash' => ['required', 'string', Rule::in(['Plastik', 'Kaca', 'Kaleng', 'Kardus', 'Botol'])],
            'weight' => 'required|numeric',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ],[
            'tps_id.required' => 'Kamu harus memilih TPS',
            'trash.required' => 'Kamu harus memilih jenis sampah',
            'weight.required' => 'Kamu harus mengisi berat sampah',
            'description.required' => 'Kamu harus mengisi deskripsi',
            'description.max' => 'Deskripsi yang diisi melebih batas karakter',
            'photo.mimes' => 'Format untuk foto harus jpg, jpeg, png',
            'photo.image' => 'Kamu bukan memasukan foto'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $upload_path = $request->file('photo')->store('trash_photos','public');

        $transaction = Transaction::create([
            'users_id' => $user->id,
            'tps_id' => $request->tps_id,
            'type' => 'Sampah',
            'trash' => $request->trash,
            'weight' => $request->weight,
            'description' => $request->description,
            'photo' => $upload_path,
            'points' => 0,
            'status' => 'Pending'
        ]);

        $qrcodeDir = public_path('storage/qrcodes');
        if(!is_dir($qrcodeDir)) {
            mkdir($qrcodeDir, 0755, true);
        }

        // Generate QR
        $qrcodeData = $transaction->id;
        $qrcodePath = 'qrcodes/'.$qrcodeData.'.svg';
        QrCode::size(200)->generate($qrcodeData, public_path('storage/'.$qrcodePath));

        $transaction->qrcode = $qrcodePath;
        $transaction->save();

        return redirect()->route('trash-submission', $transaction->id)->with('success', 'Pengajuan sampah berhasil! Silakan pindai QR code Anda di TPS.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
