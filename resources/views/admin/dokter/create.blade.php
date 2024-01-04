@extends('layouts.admin')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Tambah Data Dokter</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dokter.index') }}">Data Dokter</a>
                </li>
                <li class="breadcrumb-item active">Tambah Data Dokter</li>
            </ol>
        </nav>
    </div>

    <section class="content">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">
                <div class="card">
                    <form method="post" action="{{ route('admin.dokter.store') }}" class="container p-4">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="mb-3">
                            <label>Nomor KTP</label>
                            <input type="text" name="no_ktp" class="form-control" placeholder="Nomor KTP" required>
                        </div>
                        <div class="mb-3">
                            <label>Nama Pengguna Akun</label>
                            <input type="text" name="username" class="form-control" placeholder="Nama Pengguna Akun"
                                required>
                        </div>
                        <div class="mb-3">
                            <label>Kata Sandi Akun</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Kata Sandi Akun" required>
                                <button type="button" class="btn btn-secondary" id="togglePassword"> <i
                                        class="bi bi-eye"></i> </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Poli</label>
                            <select name="poli_id" class="form-select" required>
                                <option>-Pilih poli-</option>
                                @foreach ($polis as $poli)
                                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-md-row flex-column gap-2">
                            <button type="submit" class="btn btn-success" title="Simpan Data">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });
    </script>
@endsection
