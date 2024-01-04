<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Login - Qita Sehat</title>

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
    <div class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card mb-0">
                            <div class="row card-header m-2 d-flex align-items-center justify-content-center">
                                <h4 class="col-8 col-lg-8 fs-3 text-start fw-bold p-0 mb-0">Login</h4>
                                <p class="col-4 col-lg-4 text-end align-top p-0 mb-0">
                                    <a href="{{ route('home') }}">
                                        <i class="bi bi-arrow-left"></i>
                                    </a>
                                </p>
                            </div>
                            <div class="card-body m-2">
                                <form method="POST" action="{{ route('login.authenticate') }}">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label for="username">Nama Pengguna</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            placeholder="Nama Pengguna" autocomplete="username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Kata Sandi</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Kata Sandi" autocomplete="current-password" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary col-12">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-body-secondary text-center">
                                <p>Belum punya akun? <a href="{{ route('pasien.register.index') }}">Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
