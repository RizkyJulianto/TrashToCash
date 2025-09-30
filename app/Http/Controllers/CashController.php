<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.cash-submission');
    }

    public function showBankForm()
    {
        $user = Auth::user();
        $bankList = ['BRI', 'Mandiri', 'BCA'];
        return view('dashboard.user.bank-form', compact('user', 'bankList'));
    }

    public function showEwalletForm()
    {
        $user = Auth::user();
        return view('dashboard.user.ewallet-form', compact('user'));
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
        $user = Auth::user();
        $cashToPointMapping = [
            5000 => 500,
            10000 => 2000,
            15000 => 2500,
            50000 => 7000,
            100000 => 10000,
        ];

        $validAmounts = array_keys($cashToPointMapping);

        $rules = [
            'totals' => ['required', 'numeric', Rule::in($validAmounts)],
            'type_bank' => 'required',
            'bank_number' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'totals.required' => 'Jumlah penukaran harus diisi.',
            'totals.in' => 'Jumlah tidak sesuai dengan panduan.',
            'type_bank.required' => 'Nama bank harus dipilih.',
            'bank_number.required' => 'Nomor rekening harus diisi.',
            'bank_number.numeric' => 'Nomor rekening harus angka.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $totals = (int) $request->totals;
        $pointsNeeded = $cashToPointMapping[$totals];

        if ($user->point < $pointsNeeded) {
            return redirect()->back()->with('error', 'Poin Anda tidak mencukupi.');
        }

        DB::transaction(function () use ($user, $request, $pointsNeeded, $totals) {
            $user->point -= $pointsNeeded;
            $user->save();

            Transaction::create([
                'users_id' => $user->id,
                'type' => 'Tunai',
                'description' => 'Penarikan uang tunai sebesar Rp. ' . number_format($totals, 0, ',', '.'),
                'points' => $pointsNeeded,
                'status' => 'Pending',
                'type_bank' => $request->type_bank,
                'bank_number' => $request->bank_number,
                'totals' => $totals,
            ]);
        });

        return redirect()->route('point-submission')->with('success', 'Permintaan penarikan poin berhasil diajukan!');
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
