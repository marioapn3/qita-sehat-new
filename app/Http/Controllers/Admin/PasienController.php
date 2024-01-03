<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:admin']);
    }

    public function index()
    {
        $pasiens = Pasien::all();
        return view('admin.pasien.index', compact('pasiens'));
    }

    public function create()
    {
        return view('admin.pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'no_ktp' => 'required',
            'alamat' => 'required',

        ]);

        $user = User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
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


        $pasien = new Pasien();
        $pasien->id_user = $user->id;
        $pasien->nama = $request->input('nama');
        $pasien->no_hp = $request->input('no_hp');
        $pasien->no_ktp = $request->input('no_ktp');
        $pasien->alamat = $request->input('alamat');
        $pasien->no_rm = $no_rm;
        $pasien->save();

        return redirect()->route('admin.pasien.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('admin.pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',

            'nama' => 'required',
            'no_hp' => 'required',
            'no_ktp' => 'required',
            'alamat' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);

        $user = User::findOrFail($pasien->id_user);

        $user->username = $request->input('username');
        if ($request->input('password') != null) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        $pasien->nama = $request->input('nama');
        $pasien->no_hp = $request->input('no_hp');
        $pasien->no_ktp = $request->input('no_ktp');
        $pasien->alamat = $request->input('alamat');
        $pasien->save();

        return redirect()->route('admin.pasien.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Request $request)
    {
        $pasien = Pasien::findOrFail($request->id);
        $user = User::findOrFail($pasien->id_user);
        $user->delete();
        $pasien->delete();
        return redirect()->route('admin.pasien.index')->with('success', 'Data berhasil dihapus');
    }
}
