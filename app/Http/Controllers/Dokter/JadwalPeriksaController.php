<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:dokter']);
    }

    public function index()
    {
        $jadwals = JadwalPeriksa::where('id_dokter', auth()->user()->dokter->id)->get();
        return view('dokter.jadwal-periksa.index', compact('jadwals'));
    }

    public function create()
    {
        return view('dokter.jadwal-periksa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        JadwalPeriksa::create([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'id_dokter' => auth()->user()->dokter->id,
            'aktif' => 'T',
        ]);
        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal periksa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        return view('dokter.jadwal-periksa.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        JadwalPeriksa::query()->update(['aktif' => 'T']);
        $jadwal = JadwalPeriksa::findOrFail($id);
        $jadwal->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'aktif' => $request->aktif,
        ]);
        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal periksa berhasil diubah');
    }

    public function destroy(Request $request)
    {
        $jadwal = JadwalPeriksa::findOrFail($request->id);
        $jadwal->delete();
        return redirect()->route('dokter.jadwal-periksa.index')->with('success', 'Jadwal periksa berhasil dihapus');
    }
}
