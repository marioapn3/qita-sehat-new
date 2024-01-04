@extends('layouts.pasien')

@php
    $pasien = Auth::user()->pasien;
@endphp

@section('content')
    <div class="pagetitle">
        <h1>Ubah Profil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('pasien.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{ route('pasien.profile') }}">Profil</a>
                </li>
                <li class="breadcrumb-item active">Ubah Profil</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <h5 class="card-title my-auto">Ubah Data Profil</h5>
                    </div>
                    <div class="card-body d-flex flex-column flex-md-row align-items-start justify-content-between">
                        <div class="text-center mb-4 mb-md-0 mb-lg-0 me-lg-4 me-sm-0 me-md-4 me-sm-0">
                            <img class="ratio ratio-1x1" src="{{ asset('assets/img/avatars/default.png') }}"
                                alt="Profil" />
                        </div>
                        <div class="col-12 col-md-8 text-md-start d-grid gap-2 d-md-block">
                            <h5 class="card-title">Detail Data Profil</h5>
                            <form action="{{ route('pasien.profile.store') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between pt-3">
                                    <label class="col-lg-4 control-label my-auto">Nama Pengguna Akun:</label>
                                    <div class="col-lg-8">
                                        <input value="{{ $pasien->user->username }}" class="form-control" type="text"
                                            placeholder="Nama Pengguna Akun" name="username" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between pt-3">
                                    <label class="col-lg-4 control-label my-auto">Nama Lengkap:</label>
                                    <div class="col-lg-8">
                                        <input value="{{ $pasien->nama }}" class="form-control" type="text"
                                            placeholder="Nama Lengkap" name="nama" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between pt-3">
                                    <label class="col-lg-4 control-label my-auto">Nomor Telepon:</label>
                                    <div class="col-lg-8">
                                        <input value="{{ $pasien->no_hp }}" class="form-control" type="text"
                                            placeholder="Nomor Telepon" name="no_hp" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between pt-3">
                                    <label class="col-lg-4 control-label my-auto">Nomor KTP:</label>
                                    <div class="col-lg-8">
                                        <input value="{{ $pasien->no_ktp }}" class="form-control" type="text"
                                            placeholder="Nomor KTP" name="no_ktp" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between pt-3">
                                    <label class="col-lg-4 control-label my-auto">Alamat:</label>
                                    <div class="col-lg-8">
                                        <input value="{{ $pasien->alamat }}" class="form-control" type="text"
                                            placeholder="Alamat" name="alamat" />
                                    </div>
                                </div>
                                <div class="d-flex flex-md-row flex-column justify-content-end gap-2 pt-3">
                                    <button type="button" class="btn btn-secondary mb-md-0 mb-2">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                            <h5 class="card-title mt-5">Ubah Kata Sandi</h5>
                            <form action="{{ route('ubah-sandi') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between pt-3">
                                    <label class="col-lg-4 control-label my-auto">Kata Sandi Lama:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="password" placeholder="Kata Sandi Lama"
                                            name="old_password" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row align-items-start justify-content-between pt-3">
                                    <label class="col-lg-4 control-label my-auto">Kata Sandi Baru:</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="password" placeholder="Kata Sandi Baru"
                                            name="new_password" />
                                    </div>
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-between pt-3">
                                    <label class="col-lg-4 control-label my-auto">Konfirmasi Kata Sandi:</label>
                                    <div class="col-lg-8">
                                        <input type="password" name="new_password_confirmation" class="form-control"
                                            type="confirmationpassword" placeholder="Konfirmasi Kata Sandi" />
                                    </div>
                                </div>

                                <div class="d-flex flex-md-row flex-column justify-content-end gap-2 pt-3">
                                    <button type="button" class="btn btn-secondary mb-md-0 mb-2">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
