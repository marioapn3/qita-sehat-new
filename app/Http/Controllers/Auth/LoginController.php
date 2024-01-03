<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif (Auth::user()->role == 'dokter') {
                return redirect()->intended('dokter');
            } else {
                return redirect()->intended('pasien');
            }
        }
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function admin()
    {
        return view('auth.admin');
    }

    public function dokter()
    {
        return view('auth.dokter');
    }

    public function pasien()
    {
        return view('auth.pasien');
    }
}
