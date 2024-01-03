@extends('layouts.admin')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Tambah Data Poli</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.poli.index') }}">Data Poli</a>
                </li>
                <li class="breadcrumb-item active">Tambah Data Poli</li>
            </ol>
        </nav>
    </div>

    <section class="content">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">
                <div class="card">
                    <form role="form" method="post" action="{{ route('admin.poli.store') }}" class="container p-4">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama_poli" class="form-control" placeholder="Nama Poli" required>
                        </div>
                        <div class="mb-3">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                        </div>
                        <div class="d-flex flex-md-row flex-column gap-2">
                            <button type="submit" class="btn btn-success" title="Simpan Data">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
