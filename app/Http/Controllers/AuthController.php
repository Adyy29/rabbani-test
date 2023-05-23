<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function gas(Request $asup)
    {
    //    $data = $asup->validate([
    //         'email' => 'required|email:dns',
    //         'password' => 'required'
    //     ]);

        if(Auth()->attempt(['username' => $asup->username, 'password' => $asup->password])) {
            $asup->session()->regenerate();

            return redirect('/admin');
        }
        return back()->with('loginerror', 'Gagal Masuk');
    }

    public function keluar()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
