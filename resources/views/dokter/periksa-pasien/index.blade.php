@extends('layouts.dokter')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Periksa Pasien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dokter.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Periksa Pasien</li>
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
                            <p>Periksa Pasien</p>
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
                                        <th>Keluhan</th>
                                        <th>Antrian Ke</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftar_poli as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->pasien->nama }}</td>
                                            <td>{{ $item->keluhan }}</td>
                                            <td>{{ $item->no_antrian }}</td>
                                            <td>
                                                @if ($item->status == 'Menunggu')
                                                    <span class="badge bg-warning text-dark">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Dalam Periksa')
                                                    <span class="badge bg-primary">{{ $item->status }}</span>
                                                @elseif ($item->status == 'Selesai')
                                                    <span class="badge bg-success">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 'Menunggu')
                                                    <a href="{{ route('dokter.periksa-pasien.create', $item->id) }}"
                                                        class="btn btn-primary" role="button" title="Periksa Pasien"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                @endif
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
