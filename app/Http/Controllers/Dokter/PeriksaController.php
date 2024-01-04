<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:dokter']);
    }

    public function index()
    {
        $id_jadwal_periksa = JadwalPeriksa::where('id_dokter', Auth::user()->dokter->id)->pluck('id');
        if ($id_jadwal_periksa) {
            $daftar_poli = DaftarPoli::whereIn('id_jadwal', $id_jadwal_periksa)->get();
        }
        return view('dokter.periksa-pasien.index', compact('daftar_poli'));
    }

    public function create($id)
    {
        $periksa = DaftarPoli::find($id);
        $obats = Obat::all();
        return view('dokter.periksa-pasien.create', compact('obats', 'periksa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'catatan' => 'required',
            'biaya_periksa' => 'required',
            'nama_obat' => 'nullable',
            'jumlah_obat' => 'nullable',
            'id_daftar_polis' => 'required',
        ]);

        $daftar_polis = DaftarPoli::find($request->id_daftar_polis);
        $daftar_polis->status = 'Selesai';
        $daftar_polis->save();

        $periksa = Periksa::create([
            'id_daftar_poli' => $request->id_daftar_polis,
            'tgl_periksa' => Carbon::now('Asia/Jakarta'),
            'catatan' => $request->catatan,
            'biaya_periksa' => $request->biaya_periksa,
        ]);

        foreach ($request->nama_obat as $key => $value) {
            $periksa->detailPeriksa()->create([
                'id_obat' => $value,
                'jumlah' => $request->jumlah_obat[$key],
            ]);
        }
        return redirect()->route('dokter.periksa-pasien.index')->with('success', 'Pasien berhasil diperiksa');
    }
}
