<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Transaction::with(['Users', 'Tps'])
            ->whereIn('type', ['Sampah', 'Tunai']);

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->whereHas('Users', function ($q_user) use ($search) {
                    $q_user->where('name', 'like', '%' . $search . '%');
                })->orWhere('type', 'like', '%' . $search . '%');
            });
        }

        $submissions = $query->orderBy('created_at', 'desc')->paginate(5);

        if ($submissions->isEmpty() && $request->filled('search')) {
            return redirect()->route('data-verifications')->with('warning', 'Tidak ada data ditemukan! Mohon periksa kembali kata kunci Anda.');
        }

        return view('dashboard.admin.data-verifications', compact('submissions'));
    }

    public function scanQrCode(Request $request)
    {
        $qrcode = $request->json('qrcode');

        // Pastikan data QR code ada
        if (!$qrcode) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data QR code tidak valid.'
            ], 400);
        }

        $transaction = Transaction::where('id', $qrcode)
            ->whereIn('status', ['Pending'])
            ->with(['Users', 'Tps'])
            ->first();

        if ($transaction) {
            return response()->json([
                'status' => 'success',
                'transaction' => $transaction
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Transaksi tidak ditemukan atau sudah diverifikasi.'
        ], 404);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($transaction->type === 'Sampah') {
            return view('dashboard.admin.detail-verifications-trash', compact('transaction'));
        } else {
            return view('dashboard.admin.detail-verifications-cash', compact('transaction'));
        }
    }

    public function verifyTrash(Request $request, Transaction $transaction)
    {
        $trashPoints = [
            'Plastik' => 100,
            'Kaca' => 50,
            'Kaleng' => 80,
            'Kardus' => 60,
            'Botol' => 70,
        ];

        // Pastikan hanya transaksi pending yang bisa diverifikasi
        if ($transaction->status !== 'Pending' || !isset($trashPoints[$transaction->trash])) {
            return redirect()->back()->with('error', 'Transaksi tidak dapat diverifikasi.');
        }

        $pointsAwarded = $trashPoints[$transaction->trash] * $transaction->weight;

        DB::transaction(function () use ($transaction, $pointsAwarded) {
            $user = $transaction->Users;
            $user->point += $pointsAwarded;
            $user->save();

            $transaction->status = 'Sukses';
            $transaction->points = $pointsAwarded;
            $transaction->save();
        });

        return redirect()->route('data-verifications')->with('success', 'Pengajuan berhasil diverifikasi dan poin ditambahkan.');
    }

    public function verifyCash(Request $request, Transaction $transaction)
    {
        if ($transaction->status !== 'Pending') {
            return redirect()->back()->with('error', 'Pengajuan tidak dapat diverifikasi.');
        }

        DB::transaction(function () use ($transaction) {

            $transaction->status = 'Sukses';
            $transaction->save();
        });

        return redirect()->route('data-verifications')->with('success', 'Pengajuan berhasil diverifikasi.');
    }

    public function reject(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($transaction->status !== 'Pending') {
            return redirect()->back()->with('error', 'Pengajuan tidak dapat ditolak.');
        }

        DB::transaction(function () use ($transaction) {

            $transaction->status = 'Gagal';
            $transaction->save();
        });

        return redirect()->route('data-verifications')->with('success', 'Pengajuan berhasil ditolak.');
    }

    public function rejectCash(Request $request, string $id)
    {
        $transaction = Transaction::findOrFail($id);
        if ($transaction->status !== 'Pending') {
            return redirect()->back()->with('error', 'Pengajuan tidak dapat ditolak.');
        }

        DB::transaction(function () use ($transaction) {
            $user = $transaction->Users;
            $user->point += $transaction->points;
            $user->save();

            $transaction->status = 'Gagal';
            $transaction->save();
        });

        return redirect()->route('data-verifications')->with('success', 'Pengajuan berhasil ditolak.');
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
