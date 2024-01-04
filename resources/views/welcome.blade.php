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
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow-lg" data-bs-theme="dark">
        <div class="container px-5">
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
        </div>
    </nav>

    <header class="bg-primary py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Sistem Temu Janji<br>Pasien - Dokter</h1>
                        <p class="lead text-white-50 mb-4">- Qita Sehat -</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5 border-bottom">
        <div class="container px-5 my-2">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="background bg-primary bg-gradient text-white rounded-3 mb-3"><i
                            class="bi bi-person-fill"></i></div>
                    <h2 class="h4 fw-bolder">Login Sebagai Pasien</h2>
                    <p>Apabila anda adalah seorang pasien, silahkan login terlebih dahulu untuk melakukan pendaftaran
                        sebagai pasien!</p>
                    <a class="text-decoration-none" href="{{ route('login.pasien') }}">Klik Link Berikut
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="background bg-primary bg-gradient text-white rounded-3 mb-3"><i
                            class="bi bi-person-fill"></i>
                    </div>
                    <h2 class="h4 fw-bolder">Login Sebagai Dokter</h2>
                    <p>Apabila anda adalah seorang dokter, silahkan login terlebih dahulu untuk mulai melayani
                        pasien!</p>
                    <a class="text-decoration-none" href="{{ route('login.dokter') }}">Klik Link Berikut
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-lg-0">
                    <img src="{{ asset('assets/img/photos/clinic.jpg') }}" alt="Foto Qita Sehat"
                        class="img-fluid rounded mb-4" />
                </div>
                <div class="col-lg-6 mb-lg-0">
                    <h1 class="display-5 fw-bolder mb-3">Qita Sehat</h1>
                    <p class="lead fw-normal text-muted mb-4">Qita Sehat adalah sebuah sistem temu janji antara pasien
                        dengan dokter. Qita Sehat memudahkan pasien untuk melakukan pendaftaran dan temu janji dengan
                        dokter yang diinginkan.</p>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
