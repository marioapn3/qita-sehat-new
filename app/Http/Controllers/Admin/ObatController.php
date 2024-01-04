<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:admin']);
    }

    public function index()
    {
        $obats = Obat::all();
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }
    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|numeric',
        ]);

        // Simpan data ke dalam database menggunakan model Obat
        $obat = new Obat();
        $obat->nama_obat = $request->input('nama_obat');
        $obat->kemasan = $request->input('kemasan');
        $obat->harga = $request->input('harga');
        $obat->save();
        // Redirect ke halaman tertentu setelah berhasil menyimpan
        return redirect()->route('admin.obat.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        // Validasi form
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|numeric',
        ]);

        // Simpan data ke dalam database menggunakan model Obat
        $obat = Obat::findOrFail($id);
        $obat->nama_obat = $request->input('nama_obat');
        $obat->kemasan = $request->input('kemasan');
        $obat->harga = $request->input('harga');
        $obat->save();

        // Redirect ke halaman tertentu setelah berhasil menyimpan
        return redirect()->route('admin.obat.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Request $request)
    {
        $obat = Obat::findOrFail($request->input('id'));
        $obat->delete();
        return redirect()->route('admin.obat.index')->with('success', 'Data berhasil dihapus');
    }
}
