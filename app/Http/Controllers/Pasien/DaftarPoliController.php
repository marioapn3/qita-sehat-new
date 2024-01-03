<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:pasien']);
    }
    public function getDoktersByPoli($id_poli)
    {
        $dokters = Dokter::where('id_poli', $id_poli)->get();

        $jadwals = [];
        foreach ($dokters as $dokter) {
            foreach ($dokter->jadwal_periksas as $jadwal) {
                array_push($jadwals, $jadwal);
            }
        }

        return response()->json([
            'jadwals' => $jadwals,
        ]);
    }

    public function index()
    {
        $daftar_polis = DaftarPoli::where('id_pasien', auth()->user()->pasien->id)->get();
        $polis = Poli::all();
        $jadwal_periksas = JadwalPeriksa::all();
        return view('pasien.daftar-poli.index', compact('daftar_polis', 'polis', 'jadwal_periksas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required',
            'keluhan' => 'required',
            'id_poli' => 'required',
        ]);


        $no_antrian = DaftarPoli::where('id_jadwal', $request->id_jadwal)
            ->whereDate('created_at', today())
            ->count() + 1;

        DaftarPoli::create([
            'id_pasien' => auth()->user()->pasien->id,
            'id_jadwal' => $request->id_jadwal,
            'keluhan' => $request->keluhan,
            'keterangan' => $request->keterangan,
            'no_antrian' => $no_antrian,
        ]);

        return redirect()->route('pasien.daftar-poli.index')->with('success', 'Pendaftaran berhasil ditambahkan');
    }
}
