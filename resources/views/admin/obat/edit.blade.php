@extends('layouts.admin')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Edit Data Obat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.obat.index') }}">Data Obat</a>
                </li>
                <li class="breadcrumb-item active">Edit Data Obat</li>
            </ol>
        </nav>
    </div>

    <section class="content">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('admin.obat.update', $obat->id) }}"
                        class="container p-4">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label>Nama Obat</label>
                            <input type="text" value="{{ $obat->nama_obat }}" name="nama_obat" class="form-control"
                                placeholder="Nama Obat" required>
                        </div>
                        <div class="mb-3">
                            <label>Kemasan</label>
                            <input type="text" value="{{ $obat->kemasan }}" name="kemasan" class="form-control"
                                placeholder="Kemasan" required>
                        </div>
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="text" value="{{ $obat->harga }}" name="harga" class="form-control"
                                placeholder="Harga" required>
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
