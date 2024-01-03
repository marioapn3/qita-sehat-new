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
                <li class="breadcrumb-item ">
                    <a href="{{ route('dokter.periksa-pasien.index') }}">Periksa Pasien</a>
                </li>
                <li class="breadcrumb-item active">Memeriksa Pasien</li>
            </ol>
        </nav>
    </div>



    <section class="content">
        <div class="row">
            <!-- Columns -->
            <div class="col-lg-12">

                <div class="card">

                    <form role="form" method="post" action="{{ route('dokter.periksa-pasien.store') }}"
                        class="container p-4">
                        <h3>Periksa Pasien </h3>
                        @csrf
                        @method('POST')
                        <input hidden type="number" name="id_daftar_polis" value="{{ $periksa->id }}">
                        <div class="mb-3">
                            <label>Nomor Rekam Medis Pasien</label>
                            <input type="text" name="no_rm" class="form-control" value="{{ $periksa->pasien->no_rm }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label>Nama Pasien</label>
                            <input type="text" class="form-control" value="{{ $periksa->pasien->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Keluhan Pasien</label>
                            <input type="text" name="keluhan" class="form-control" value="{{ $periksa->keluhan }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label>Catatan Dari Dokter</label>
                            <input type="text" name="catatan" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Biaya Periksa</label>
                            <input type="number" name="biaya_periksa" class="form-control" required>
                        </div>
                        <div class="mb-3 ">
                            <h3>List Obat</h3>
                            <div id="obat-container" class="mb-2">
                                <div class="form-group row">
                                    <div class="col-lg-8">
                                        <label for="nama_obat">Nama Obat</label>
                                        <select name="nama_obat[]" id="" class="form-select ">
                                            @foreach ($obats as $obat)
                                                <option value="{{ $obat->id }}">{{ $obat->nama_obat }} -
                                                    {{ $obat->kemasan }} - {{ $obat->harga }}</option>
                                            @endforeach
                                            <option value="Tidak Butuh Obat">Tidak Butuh Obat</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="jumlah_obat">Jumlah Obat</label>
                                        <input type="number" name="jumlah_obat[]" class=" form-control w-full">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mb-3" onclick="tambahObat()">Tambah Obat</button>
                        <button type="button" class="btn btn-danger mb-3" onclick="hapusObat()">Hapus Obat</button>
                        <div class="d-flex flex-md-row flex-column gap-2">
                            <button type="submit" class="btn btn-success" title="Simpan Data">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#obat').DataTable();
        });

        function tambahObat() {
            var obatContainer = document.getElementById('obat-container');
            var newObatRow = obatContainer.children[0].cloneNode(true);
            obatContainer.appendChild(newObatRow);
        }

        function hapusObat() {
            var obatContainer = document.getElementById('obat-container');
            if (obatContainer.children.length > 1) {
                obatContainer.removeChild(obatContainer.lastChild);
            }
        }
    </script>
@endsection
