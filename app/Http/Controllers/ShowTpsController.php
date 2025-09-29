<?php

namespace App\Http\Controllers;

use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowTpsController extends Controller
{
    public function show() {
        $user = Auth::user();
        $tps = Tps::orderBy('created_at','desc')->paginate(5);
        return view('dashboard.user.tps', compact('user','tps'));
    }
}
