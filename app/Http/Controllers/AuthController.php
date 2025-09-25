<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('livewire.pages.auth.login');
    }

    public function attemptLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/login')->withErrors($validator)->withInput();
        }

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->role === 'Admin') {
                return redirect('/dashboard/admin')->with('success', 'Selamat kamu berhasil masuk');
            } else if ($user->role === 'Mitra') {
                return redirect('/dashboard/mitra')->with('success', 'Selamat kamu berhasil masuk');
            } else {
                return redirect()->route('user.dashboard')->with('success','Selamat kamu berhasil masuk');
            }
        } else {
            return redirect()->route('user.login')->with('error', 'Gagal untuk masuk! Periksa kembali email dan password kamu');
        }
    }



    public function showUserRegisterForm()
    {
        return view('livewire.pages.auth.register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users,email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8|same:password',
        ], [
            'name.required' => 'Kamu harus mengisi nama',
            'name.max' => 'Nama anda melebihi batas jumlah karakter',
            'email.required' => 'Kamu harus mengisi alamat email',
            'email.email' => 'Tolong sertakan @ pada alamat email kamu',
            'email.unique' => 'Alamat email ini sudah digunakan.',
            'password.required' => 'Kamu harus membuat password',
            'password.min' => 'Password minimal 8 karakter',
            'password_confirmation.required' => 'Kamu harus konfirmasi ulang password',
            'password_confirmation.same' => 'Password yang kamu masukan tidak sama',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };

        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'User',
        ]);

        if ($users) {
            return redirect()->route('user.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
        } else {
            return redirect()->back()->with('error', 'Pendaftaran gagal! Mohon ulangi pendaftaran');
        }
    }

    public function showMitraRegisterForm()
    {
        return view('livewire.pages.auth.register-mitra');
    }


    public function registerMitra(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|same:password',
            'address' => 'required|string|max:255',
            'partner' => ['required', 'string', Rule::in(['Toko Sembako', 'Toko Peralatan', 'Toko Ritel'])],
        ], [
            'name.required' => 'Kamu harus mengisi nama',
            'name.max' => 'Nama kamu melebihi batas jumlah karakter',
            'email.required' => 'Kamu harus mengisi alamat email',
            'email.unique' => 'Alamat email ini sudah digunakan.',
            'password.required' => 'Kamu harus membuat password',
            'password.min' => 'Password minimal 8 karakter',
            'password_confirmation.required' => 'Kamu harus membuat konfirmasi password',
            'password_confirmation.same' => 'Password yang kamu masukan tidak sama',
            'address.required' => 'Kamu harus mengisi alamat toko',
            'address.max' => 'Alamat kamu melebihi batas jumlah karakter',
            'partner.required' => 'Kamu harus mengisi jenis toko',
        ]);

        if ($validator->fails()) {
            return redirect()->route('mitra.register')->withErrors($validator)->withInput();
        };

        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
            'partnerr' => $request->input('partnerr'),
            'role' => 'Mitra',
        ]);
        
        return redirect()->route('user.login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }
}
