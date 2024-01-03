<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $this->middleware(['auth', 'checkRole:admin']);
        return view('admin.index');
    }

    public function dokter()
    {
        $this->middleware(['auth', 'checkRole:dokter']);
        return view('dokter.index');
    }

    public function pasien()
    {
        $this->middleware(['auth', 'checkRole:pasien']);
        return view('pasien.index');
    }
}
