<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class DetailPeriksaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:dokter']);
    }

    public function index()
    {
        $pasiens = Pasien::all();
        return view('dokter.riwayat-pasien.index', compact('pasiens'));
    }

    public function detail($id)
    {
        $pasien = Pasien::find($id);
        return view('dokter.riwayat-pasien.detail', compact('pasien'));
    }
}
