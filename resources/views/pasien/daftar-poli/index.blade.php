@extends('layouts.pasien')

@section('content')
    <div class="pagetitle">

        <h1>Daftar Poli</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('pasien.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Daftar Poli</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="card-title col-12 col-md-6 text-md-start">
                            <p>Riwayat Data Poli</p>
                            <span class="text-muted">Qita Sehat</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" style="min-width: 800px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Poli</th>
                                        <th>Dokter</th>
                                        <th>Hari</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Antrian</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftar_polis as $daftar_poli)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $daftar_poli->jadwal->dokter->poli->nama_poli }}</td>
                                            <td>{{ $daftar_poli->jadwal->dokter->nama }}</td>
                                            <td>{{ $daftar_poli->jadwal->hari }}</td>
                                            <td>{{ $daftar_poli->jadwal->jam_mulai }}</td>
                                            <td>{{ $daftar_poli->jadwal->jam_selesai }}</td>
                                            <td>{{ $daftar_poli->no_antrian }}</td>
                                            <td>
                                                @if ($daftar_poli->status == 'Menunggu')
                                                    <span
                                                        class="badge bg-warning text-dark">{{ $daftar_poli->status }}</span>
                                                @elseif ($daftar_poli->status == 'Dalam Periksa')
                                                    <span class="badge bg-primary">{{ $daftar_poli->status }}</span>
                                                @elseif ($daftar_poli->status == 'Selesai')
                                                    <span class="badge bg-success">{{ $daftar_poli->status }}</span>
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
            <!-- Right side columns -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="card-title col-12 col-md-6 text-md-start">
                            <p>Daftar Poli</p>
                            <span class="text-muted">Qita Sehat</span>
                        </div>
                    </div>
                    <form action="{{ route('pasien.daftar-poli.store') }}" class="container p-3" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-3">
                            <label for="no_rm" class=" mb-1">Nomor Rekam Medis</label>
                            <input readonly class="form-control" type="no_rm" value="{{ Auth::user()->pasien->no_rm }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="id_poli" class="mb-1">Pilih Poli</label>
                            <select class="form-select w-full" name="id_poli" id="id_poli">
                                @foreach ($polis as $poli)
                                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="id_jadwal" class="mb-1">Pilih Jadwal</label>
                            <select class="form-select w-full" name="id_jadwal" id="id_jadwal">
                                @foreach ($jadwal_periksas as $jadwal)
                                    <option value="{{ $jadwal->id }}">{{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} -
                                        {{ $jadwal->jam_selesai }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Keluhan</label>
                            <textarea name="keluhan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="d-flex flex-md-row flex-column gap-2">
                            <button type="button" class="btn btn-secondary mb-md-0 mb-2">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
