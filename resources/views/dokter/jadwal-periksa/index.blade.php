@extends('layouts.dokter')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Jadwal Periksa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dokter.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Jadwal Periksa</li>
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
                            <p>Jadwal Periksa</p>
                            <span class="text-muted">Qita Sehat</span>
                        </div>
                        <div class="col-12 col-md-6 text-md-end mt-2 mb-2 d-grid gap-2 d-md-block">
                            <a href="{{ route('dokter.jadwal-periksa.create') }}" class="btn btn-success btn-sm">
                                <i class="bi bi-plus"></i>
                                <span class="ms-1">Tambah</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" style="min-width: 800px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwals as $jadwal)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jadwal->hari }}</td>
                                            <td>{{ $jadwal->jam_mulai }}</td>
                                            <td>{{ $jadwal->jam_selesai }}</td>
                                            <td>
                                                @if ($jadwal->aktif == 'Y')
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('dokter.jadwal-periksa.edit', $jadwal->id) }}"
                                                    class="btn btn-warning" role="button" title="Ubah Data"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                {{-- <a href="#" class="btn btn-danger  delete-btn deleteData"
                                                    data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                                    data-id="{{ $jadwal->id }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus Data">
                                                    <i class="bi bi-trash"></i>
                                                </a> --}}
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

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">
                        Konfirmasi Hapus Data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <form action="{{ route('dokter.jadwal-periksa.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input hidden id="id_data" name="id">
                        <button type="submit" class="btn btn-danger" id="confirmDelete">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript Datatable -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pasien').DataTable();
        });

        $(document).on('click', '.deleteData', function() {
            let id = $(this).attr('data-id');
            $('#id_data').val(id);
        });
    </script>
@endsection
