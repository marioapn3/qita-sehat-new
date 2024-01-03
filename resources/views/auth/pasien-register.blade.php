<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Register - Qita Sehat</title>

    <meta name="author" content="Muhammad Fadhil Abyansyah" />
    <meta name="description" content="Poliklinik" />
    <meta name="keywords" content="Poliklinik" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo/hospital.svg') }}" rel="icon">
    <link href="{{ asset('assets/img/logo/hospital.svg') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    </nav>
    <div class="d-flex w-100">
        <div class="container d-flex flex-column">
            @if ($errors->any())
                <div class=" alert alert-danger alert-dismissible fade show">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card">
                            <div class="card-header text-center fs-3 fw-bold">Register</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('pasien.register.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label for="username">Nama Pengguna Akun</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            placeholder="Nama Pengguna Akun" autocomplete="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Kata Sandi</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Kata Sandi" autocomplete="current-password" required>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="confirm_password">Konfirmasi Kata Sandi</label>
                                        <input type="password" name="password_confirmation" id="confirm_password"
                                            class="form-control" placeholder="Konfirmasi Kata Sandi "
                                            autocomplete="current-password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            placeholder="Nama Lengkap" autocomplete="nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_ktp">Nomor KTP</label>
                                        <input type="text" name="no_ktp" id="no_ktp" class="form-control"
                                            placeholder="Nomor KTP" autocomplete="no_ktp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp">Nomor Telepon</label>
                                        <input type="text" name="no_hp" id="no_hp" class="form-control"
                                            placeholder="Nomor Telepon" autocomplete="no_hp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control"
                                            placeholder="Alamat" autocomplete="alamat" required>
                                    </div>
                                    <div class=" text-center">
                                        <button type="submit" class="btn btn-primary col-12">Register</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-body-secondary text-center">
                                <p class="mt-3">Sudah Punya Akun? <a href="{{ route('login.pasien') }}">Login</a>
                                </p>
                                <a href="{{ route('home') }}" class="btn btn-secondary btn-sm mt-4">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Main JS File -->
    <!-- <script src="../../../assets/js/main.js"></script> -->
</body>

</html>
