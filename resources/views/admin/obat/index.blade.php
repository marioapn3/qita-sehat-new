@extends('layouts.admin')

@section('content')
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Data Obat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Data Obat</li>
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
                            <p>Data Obat</p>
                            <span class="text-muted">Qita Sehat</span>
                        </div>
                        <div class="col-12 col-md-6 text-md-end mt-2 mb-2 d-grid gap-2 d-md-block">
                            <a href="{{ route('admin.obat.create') }}" class="btn btn-success btn-sm">
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
                                        <th>Nama Obat</th>
                                        <th>Kemasan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obats as $obat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $obat->nama_obat }}</td>
                                            <td>{{ $obat->kemasan }}</td>
                                            <td>{{ $obat->harga }}</td>
                                            <td>
                                                <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn btn-warning"
                                                    role="button" title="Ubah Data"><i class="bi bi-pencil-square"></i></a>
                                                <a href="#" class="btn btn-danger  delete-btn deleteData"
                                                    data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"
                                                    data-id="{{ $obat->id }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Hapus Data">
                                                    <i class="bi bi-trash"></i>
                                                </a>
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
                    <form action="{{ route('admin.obat.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input id="id_data" hidden name="id">
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
            $('#obat').DataTable();
        });

        $(document).on('click', '.deleteData', function() {
            let id = $(this).attr('data-id');
            $('#id_data').val(id);
        });
    </script>
@endsection
