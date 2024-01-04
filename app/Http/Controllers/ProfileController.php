<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function profil_dokter()
    {
        $this->middleware(['auth', 'checkRole:dokter']);
        return view('dokter.profil.index');
    }

    public function edit_dokter()
    {
        $this->middleware(['auth', 'checkRole:dokter']);
        return view('dokter.profil.edit');
    }

    public function update_dokter(Request $request)
    {
        $this->middleware(['auth', 'checkRole:dokter']);
        $request->validate([
            'nama' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'username' => 'required'
        ]);

        $dokter = auth()->user()->dokter;

        $dokter->nama = $request->nama;
        $dokter->no_ktp = $request->no_ktp;
        $dokter->no_hp = $request->no_hp;
        $dokter->alamat = $request->alamat;
        $dokter->save();

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->save();
        return redirect()->route('dokter.profile')->with('success', 'Profil Berhasil Diubah');
    }
    public function profil_pasien()
    {
        $this->middleware(['auth', 'checkRole:pasien']);
        return view('pasien.profil.index');
    }
    public function edit_pasien()
    {
        $this->middleware(['auth', 'checkRole:pasien']);
        return view('pasien.profil.edit');
    }
    public function update_pasien(Request $request)
    {
        $this->middleware(['auth', 'checkRole:dokter']);
        $request->validate([
            'nama' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'username' => 'required'
        ]);

        $pasien = auth()->user()->pasien;

        $pasien->nama = $request->nama;
        $pasien->no_ktp = $request->no_ktp;
        $pasien->no_hp = $request->no_hp;
        $pasien->alamat = $request->alamat;
        $pasien->save();

        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->save();
        return redirect()->route('pasien.profile')->with('success', 'Profil Berhasil Diubah');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'nullable',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);
        $user = User::find(Auth::user()->id);
        // Check if the old password matches the user's current password
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->with('error', 'Password Lama Salah');
        }

        // Check if the new password matches the confirmation password
        if ($request->input('new_password') !== $request->input('new_password_confirmation')) {
            return redirect()->back()->with('error', 'Password Konfirmasi Salah');
        }
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        if ($user->role == 'dokter') {
            return redirect()->route('dokter.profile')->with('success', 'Password Berhasil Diubah');
        } else {
            return redirect()->route('pasien.profile')->with('success', 'Password Berhasil Diubah');
        }
    }
}
