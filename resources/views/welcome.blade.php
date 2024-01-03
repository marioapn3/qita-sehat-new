<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Qita Sehat</title>

    <meta name="author" content="Muhammad Fadhil Abyansyah" />
    <meta name="description" content="Poliklinik" />
    <meta name="keywords" content="Poliklinik" />

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo/hospital.svg') }}" rel="icon">
    <link href="{{ asset('assets/img/logo/hospital.svg') }}" rel="apple-touch-icon">
    {{-- <link href="./assets/img/logo/hospital.svg" rel="icon" />
    <link href="./assets/img/logo/hospital.svg" rel="apple-touch-icon" /> --}}

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
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow-lg ps-4 pe-4" data-bs-theme="dark">
        <a class="navbar-brand" href="">
            <i class="bi bi-hospital-fill me-2" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top"></i>
            Qita Sehat
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav gap-3 ms-auto">
                @auth
                    <li class="nav-item">
                        @if (Auth::user()->role == 'admin')
                            <a class="nav-link text-light" href="{{ route('admin.index') }}">Dashboard</a>
                        @elseif (Auth::user()->role == 'dokter')
                            <a class="nav-link text-light" href="{{ route('dokter.index') }}">Dashboard</a>
                        @elseif (Auth::user()->role == 'pasien')
                            <a class="nav-link text-light" href="{{ route('pasien.index') }}">Dashboard</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="nav-link text-light">Logout</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>

    <header class="bg-primary pt-5 pb-5 text-white text-center">
        <h1 class="fw-bold">Sistem Temu Janji</h1>
        <h1 class="fw-bold">Pasien - Dokter</h1>
        <p>- Qita Sehat -</p>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <i class="bi bi-person-fill bg-primary text-white p-3 fs-3 rounded"></i>
                <h2 class="fw-bold mt-4">Login Sebagai Pasien</h2>
                <p>Apabila anda adalah seorang pasien, silahkan login terlebih dahulu untuk melakukan pendaftaran
                    sebagai pasien!</p>
                <a href="{{ route('login.pasien') }}">Klik Link Berikut <i class="fas fa-arrow-right"></i></a>
            </div>

            <div class="col-md-6 mt-5">
                <i class="bi bi-person-fill bg-primary text-white p-3 fs-3 rounded"></i>
                <h2 class="fw-bold mt-4">Login Sebagai Dokter</h2>
                <p>Apabila anda adalah seorang dokter, silahkan login terlebih dahulu untuk melakukan mulai melayani
                    pasien!</p>
                <a href="{{ route('login.dokter') }}">Klik Link Berikut <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer" class="footer ms-0 mt-5">
        <div class="copyright">
            Copyright &copy; <span id="year"></span>
            <strong><span>A11.2020.12544</span></strong>. All Rights Reserved
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script src="./assets/js/main.js"></script> --}}
    {{-- <script src="./assets/js/main.js"></script> --}}
</body>

</html>
