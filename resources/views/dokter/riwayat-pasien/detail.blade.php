@extends('layouts.dokter')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Detail Riwayat Pasien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dokter.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('dokter.riwayat-pasien.index') }}">Riwayat Pasien</a>
                </li>
                <li class="breadcrumb-item active">Detail Riwayat Pasien</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-6 w-100">
                            <div class="col-lg-12">
                                <h4 class=" text-uppercase fw-bold">Data Pasien</h4>
                                <div class="table-responsive mt-3">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="col-md-2 ps-0">Nama Pasien</th>
                                                <td class="text-center col-md-0">:</td>
                                                <td class="col-md-10">{{ $pasien->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-md-2 ps-0">Alamat</th>
                                                <td class="text-center col-md-0">:</td>
                                                <td class="col-md-10">{{ $pasien->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th class="col-md-2 ps-0">Nomor Telepon</th>
                                                <td class="text-center col-md-0">:</td>
                                                <td class="col-md-10">
                                                    {{ $pasien->no_hp }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-md-2 ps-0">Nomor KTP</th>
                                                <td class="text-center col-md-0">:</td>
                                                <td class="col-md-10">
                                                    {{ $pasien->no_ktp }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="col-md-2 ps-0">Nomor Rekam Medis</th>
                                                <td class="text-center col-md-0">:</td>
                                                <td class="col-md-10">{{ $pasien->no_rm }}</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-uppercase fw-bold mt-3">Riwayat Pasien</h4>
                        <div class="table-responsive">
                            <table class="table datatable" style="min-width: 800px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keluhan</th>
                                        <th>Dokter</th>
                                        <th>Poli</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Catatan</th>
                                        <th>Obat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pasien->daftar_poli as $dft_poli)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dft_poli->keluhan }}</td>
                                            <td>{{ $dft_poli->jadwal->dokter->nama }}</td>
                                            <td>{{ $dft_poli->jadwal->dokter->poli->nama_poli }}</td>
                                            @if ($dft_poli->status == 'Selesai')
                                                <td>{{ $dft_poli->periksa->tgl_periksa }}</td>
                                                <td>{{ $dft_poli->periksa->catatan }}</td>
                                                <td>
                                                    @foreach ($dft_poli->periksa->detailPeriksa as $detail)
                                                        <ul>
                                                            <li>{{ $detail->obat->nama_obat }} Jumlah :
                                                                {{ $detail->jumlah }}</li>

                                                        </ul>
                                                    @endforeach
                                                </td>
                                            @else
                                            @endif

                                        </tr>
                                    @endforeach
                                    <tr></tr>
                                    {{-- @foreach ($daftar_poli as $item)
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
                                    @endforeach --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
