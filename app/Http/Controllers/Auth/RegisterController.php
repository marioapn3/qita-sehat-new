<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.pasien-register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'nama' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::create([
            'username' => request('username'),
            'password' => Hash::make(request('password')),
            'role' => 'pasien',
        ]);

        $tahunBulanSekarang = date('Ym');
        $countPasien = Pasien::where('created_at', '>=', Carbon::now()->startOfMonth())->count() + 1;
        $nomorRM = sprintf('%03d', $countPasien);
        $no_rm = $tahunBulanSekarang . ' - ' . $nomorRM;

        //jika no_rm ada di atribut pasien no_rm maka $nomorRM + 1 dan diulang sampai tidak ada yang sama
        while (Pasien::where('no_rm', $no_rm)->exists()) {
            $countPasien++;
            $nomorRM = sprintf('%03d', $countPasien);
            $no_rm = $tahunBulanSekarang . ' - ' . $nomorRM;
        }

        // Sign them in
        Pasien::create([
            'id_user' => $user->id,
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_rm' => $no_rm
        ]);

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
}
