@extends('layouts.dokter')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Riwayat Pasien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dokter.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Riwayat Pasien</li>
            </ol>
        </nav>
    </div>

    <section class="content">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="card-title col-12 col-md-6 text-md-start">
                            <p>Riwayat Pasien</p>
                            <span class="text-muted">Qita Sehat</span>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" style="min-width: 800px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pasien</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telepon</th>
                                        <th>Nomor KTP</th>
                                        <th>Nomor Rekam Medis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasiens as $pasien)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pasien->nama }}</td>
                                            <td>{{ $pasien->alamat }}</td>
                                            <td>{{ $pasien->no_ktp }}</td>
                                            <td>{{ $pasien->no_hp }}</td>
                                            <td>{{ $pasien->no_rm }}</td>
                                            <td>
                                                <a href="{{ route('dokter.riwayat-pasien.detail', $pasien->id) }}"
                                                    class="btn btn-primary" role="button"
                                                    title="Lihat Detail Riwayat Pasien"><i class="bi bi-eye-fill"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Javascript Datatable -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#obat').DataTable();
        });
    </script>
@endsection
