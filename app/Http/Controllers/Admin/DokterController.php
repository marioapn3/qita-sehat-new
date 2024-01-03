<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:admin']);
    }

    public function index()
    {
        $dokters = Dokter::all();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        $polis = Poli::all();
        return view('admin.dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'nama' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
            'poli_id' => 'required'
        ]);

        $user =  User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role' => 'dokter',

        ]);

        // Simpan data ke dalam database menggunakan model Dokter
        $dokter = new Dokter();
        $dokter->id_user = $user->id;
        $dokter->id_poli = $request->input('poli_id');
        $dokter->nama = $request->input('nama');
        $dokter->no_hp = $request->input('no_hp');
        $dokter->no_ktp = $request->input('no_ktp');
        $dokter->alamat = $request->input('alamat');

        $dokter->save();

        // Redirect ke halaman tertentu setelah berhasil menyimpan
        return redirect()->route('admin.dokter.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter_poli = $dokter->poli->id;
        //SEMUA POLI KECUALI DOKTER POLI
        $polis = Poli::where('id', '!=', $dokter_poli)->get();
        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_ktp' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'poli_id' => 'required',
            'user_id' => 'required'
        ]);
        $user = User::findOrFail($request->input('user_id'));
        $user->username = $request->input('username');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        // Cari dokter berdasarkan id
        $dokter = Dokter::findOrFail($id);

        // Update data
        $dokter->id_poli = $request->input('poli_id');
        $dokter->nama = $request->input('nama');
        $dokter->no_hp = $request->input('no_hp');
        $dokter->no_ktp = $request->input('no_ktp');
        $dokter->alamat = $request->input('alamat');

        $dokter->save();

        // Redirect ke halaman tertentu
        return redirect()->route('admin.dokter.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Request $request)
    {
        // Cari dokter berdasarkan id
        $dokter = Dokter::findOrFail($request->id);
        $user = User::findOrFail($dokter->id_user);
        // Hapus data
        $dokter->delete();
        $user->delete();
        // Redirect ke halaman tertentu
        return redirect()->route('admin.dokter.index')->with('success', 'Data berhasil dihapus');
    }
}
