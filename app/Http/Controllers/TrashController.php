<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $recentSubmission = Transaction::with(['Users', 'Tps'])->where('type', 'Sampah')->whereHas('Tps', function ($query) use ($user) {
            $query->where('tps_id', $user->id);
        })->orderBy('created_at', 'desc')->paginate(5);
        $tpsList = Tps::all();
        return view('dashboard.user.trash-submission', compact('recentSubmission', 'tpsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transaction = ['Plastik', 'Kaca', 'Kaleng', 'Kardus', 'Botol'];
        $tpsList = Tps::all();
        return view('dashboard.user.add-trash-submission', compact('transaction', 'tpsList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'tps_id' => 'required|numeric',
            'trash' => ['required', 'string', Rule::in(['Plastik', 'Kaca', 'Kaleng', 'Kardus', 'Botol'])],
            'weight' => 'required|numeric',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'tps_id.required' => 'Kamu harus memilih TPS',
            'trash.required' => 'Kamu harus memilih jenis sampah',
            'weight.required' => 'Kamu harus mengisi berat sampah',
            'description.required' => 'Kamu harus mengisi deskripsi',
            'description.max' => 'Deskripsi yang diisi melebih batas karakter',
            'photo.mimes' => 'Format untuk foto harus jpg, jpeg, png',
            'photo.image' => 'Kamu bukan memasukan foto',
            'photo.max' => 'Foto yang kamu masukan ukurannya terlalu besar',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $upload_path = $request->file('photo')->store('trash_photos', 'public');

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

        // dd($transaction->status);

        $qrcodeDir = public_path('storage/qrcodes');
        if (!is_dir($qrcodeDir)) {
            mkdir($qrcodeDir, 0755, true);
        }

        // Generate QR
        $qrcodeData = $transaction->id;
        $qrcodePath = 'qrcodes/' . $qrcodeData . '.svg';
        QrCode::size(200)->generate($qrcodeData, public_path('storage/' . $qrcodePath));

        $transaction->qrcode = $qrcodePath;
        $transaction->save();

        return redirect()->route('trash-submission', $transaction->id)->with('success', 'Pengajuan sampah berhasil! Silakan pindai QR code Anda di TPS.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $transaction = Transaction::findOrfail($id);
        return view('dashboard.user.detail-trash-submission', compact('transaction'));
    }

    public function cancel(string $id)
    {

        $transaction = Transaction::findOrfail($id);



        if ($transaction->status === 'Pending') {
            $transaction->status = 'Dibatalkan';
            $transaction->save();
            return redirect()->route('trash-submission')->with('success', 'Pengajuan Sampah berhasil dibatalkan');
        } else {
            return redirect()->back()->with('error', 'Pengajuan sampah tidak dapat dibatalkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        if ($transaction->status !== 'Pending') {
            return redirect()->back()->with('error', 'Pengajuan hanya bisa diedit saat berstatus pending');
        }

        $tpsList = Tps::all();
        $trash = ['Plastik', 'Kaca', 'Kaleng', 'Kardus', 'Botol'];
        return view('dashboard.user.edit-trash-submission', compact('transaction', 'tpsList', 'trash'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        if ($transaction->status !== 'Pending') {
            return redirect()->back()->with('error', 'Pengajuan hanya bisa diedit saat berstatus pending');
        }

        $validator = Validator::make($request->all(), [
            'tps_id' => 'required|numeric',
            'trash' => ['required', 'string', Rule::in(['Plastik', 'Kaca', 'Kaleng', 'Kardus', 'Botol'])],
            'weight' => 'required|numeric',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ], [
            'tps_id.required' => 'Kamu harus memilih TPS',
            'trash.required' => 'Kamu harus memilih jenis sampah',
            'weight.required' => 'Kamu harus mengisi berat sampah',
            'description.required' => 'Kamu harus mengisi deskripsi',
            'description.max' => 'Deskripsi yang diisi melebih batas karakter',
            'photo.mimes' => 'Format untuk foto harus jpg, jpeg, png',
            'photo.image' => 'Kamu bukan memasukan foto',
            'photo.max' => 'Foto yang kamu masukan ukurannya terlalu besar',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $photo_path = $transaction->photo;

        if ($request->hasFile('photo')) {
            if ($transaction->photo) {
                Storage::disk('public')->delete($transaction->photo);
            }

            $photo_path = $request->file('photo')->store('trash_photos', 'public');
        }

        $transaction->update([
            'tps_id' => $request->tps_id,
            'type' => 'Sampah',
            'trash' => $request->trash,
            'weight' => $request->weight,
            'description' => $request->description,
            'photo' => $photo_path,
        ]);


        return redirect()->route('trash-submission', $transaction->id)->with('success', 'Pengajuan sampah berhasil diperbarui.');
    }

    public function downloadQrCode(Transaction $transaction)
    {
        // Pastikan QR code ada dan file fisik ada di storage
        if ($transaction->qrcode && Storage::disk('public')->exists($transaction->qrcode)) {
            $filePath = $transaction->qrcode;
            $fileName = 'qrcode-' . $transaction->id . '.svg';

            // Menggunakan facade Storage untuk mengunduh file
            return Storage::download($filePath, $fileName);
        }

        return redirect()->back()->with('error', 'QR Code tidak ditemukan atau file tidak ada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
