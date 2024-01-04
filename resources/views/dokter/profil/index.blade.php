@extends('layouts.dokter')

@section('content')
    <div class="pagetitle">
        <h1>Profil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dokter.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <h5 class="card-title my-auto">Data Profil</h5>
                        <a href="{{ route('dokter.profile.edit') }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pen"></i>
                            <span class="ms-1">Ubah Profil</span>
                        </a>
                    </div>
                    <div class="card-body d-flex flex-column flex-md-row align-items-start justify-content-between">
                        <div class="text-center mb-4 mb-md-0 mb-lg-0 me-lg-4 me-sm-0 me-md-4 me-sm-0">
                            <img class="ratio ratio-1x1" src="{{ asset('assets/img/avatars/default.png') }}"
                                alt="Profil" />
                        </div>
                        <div class="col-12 col-md-8 text-md-start d-grid gap-2 d-md-block">
                            <h5 class="card-title p-2">Detail Data Profil</h5>
                            <table class="table table-divider mt-2 p-4" id="datatable">
                                <tbody>
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->dokter->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->dokter->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor KTP</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->dokter->no_ktp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->dokter->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Poli</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->dokter->poli->nama_poli }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
