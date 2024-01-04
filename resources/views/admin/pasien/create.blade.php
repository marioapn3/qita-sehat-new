@extends('layouts.admin')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Tambah Data Pasien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.pasien.index') }}">Data Pasien</a>
                </li>
                <li class="breadcrumb-item active">Tambah Data Pasien</li>
            </ol>
        </nav>
    </div>

    <section class="content">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">
                <div class="card">
                    <form role="form" method="POST" action="{{ route('admin.pasien.store') }}" class="container p-4">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Pasien" required>
                        </div>
                        <div class="mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                        </div>
                        <div class="mb-3">
                            <label>Nomor Telepon</label>
                            <input type="number" name="no_hp" class="form-control" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="mb-3">
                            <label>Nomor KTP</label>
                            <input type="number" name="no_ktp" class="form-control" placeholder="Nomor KTP" required>
                        </div>
                        <div class="mb-3">
                            <label>Nama Pengguna Akun</label>
                            <input type="text" placeholder="Nama Pengguna Akun" name="username" class="form-control"
                                value="" required>
                        </div>
                        <div class="mb-3">
                            <label>Kata Sandi Akun</label>
                            <div class="input-group">
                                <input placeholder="Kata Sandi Akun" type="password" name="password" id="password"
                                    class="form-control" value="" required>
                                <button type="button" class="btn btn-secondary" id="togglePassword"> <i
                                        class="bi bi-eye"></i> </button>
                            </div>
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
