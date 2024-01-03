<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:admin']);
    }

    public function index()
    {
        $polis = Poli::all();
        return view('admin.poli.index', compact('polis'));
    }

    public function create()
    {
        return view('admin.poli.create');
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'nama_poli' => 'required',
            'keterangan' => 'required',
        ]);

        // Simpan data ke dalam database menggunakan model Poli
        $poli = new Poli();
        $poli->nama_poli = $request->input('nama_poli');
        $poli->keterangan = $request->input('keterangan');
        $poli->save();

        // Redirect ke halaman tertentu setelah berhasil menyimpan
        return redirect()->route('admin.poli.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $poli = Poli::findOrFail($id);
        return view('admin.poli.edit', compact('poli'));
    }

    public function update(Request $request, $id)
    {
        // Validasi form
        $request->validate([
            'nama_poli' => 'required',
            'keterangan' => 'required',
        ]);

        // Simpan data ke dalam database menggunakan model Poli
        $poli = Poli::findOrFail($id);
        $poli->nama_poli = $request->input('nama_poli');
        $poli->keterangan = $request->input('keterangan');
        $poli->save();

        // Redirect ke halaman tertentu setelah berhasil menyimpan
        return redirect()->route('admin.poli.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Request $request)
    {
        $poli = Poli::findOrFail($request->id);
        $poli->delete();
        return redirect()->route('admin.poli.index')->with('success', 'Data berhasil dihapus');
    }
}
