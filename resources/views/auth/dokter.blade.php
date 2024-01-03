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
    {{-- <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" /> --}}

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <link href="./assets/css/style.css" rel="stylesheet" /> --}}
</head>

<body>
    <div class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="card mb-0">
                            <div class="card-header text-center fs-3 fw-bold">Login</div>
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
                                <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">Kembali</a>
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
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}


    <!-- Main JS File -->
    <!-- <script src="../../../assets/js/main.js"></script> -->
</body>

</html>
