<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard - Qita Sehat</title>

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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <!-- Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <!-- Logo -->
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <i class="bi bi-hospital-fill me-2"></i>
                <span class="d-none d-lg-block">Qita Sehat</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- Nav -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="">
                        <img src="{{ asset('assets/img/avatars/default.png') }}" alt="Profile"
                            class="rounded-circle" />
                        <p class="d-none d-md-block ps-2 mb-0">
                            Selamat Datang,
                            <span>{{ Auth::user()->dokter->nama }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dokter') ? '' : 'collapsed' }}" href="{{ route('dokter.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-heading">Data Utama</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dokter/jadwal-periksa*') ? '' : 'collapsed' }}"
                    href="{{ route('dokter.jadwal-periksa.index') }}">
                    <i class="bi bi-card-list"></i>
                    <span>Jadwal Periksa</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dokter/periksa-pasien*') ? '' : 'collapsed' }}"
                    href="{{ route('dokter.periksa-pasien.index') }}">
                    <i class="bi bi-heart-pulse"></i>
                    <span>Periksa Pasien</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dokter/riwayat-pasien*') ? '' : 'collapsed' }}"
                    href="{{ route('dokter.riwayat-pasien.index') }}">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat Pasien</span>
                </a>
            </li>

            <li class="nav-heading">Menu Akun</li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dokter/profile*') ? '' : 'collapsed' }}"
                    href="{{ route('dokter.profile') }}">
                    <i class="bi bi-person"></i>
                    <span>Profil</span>
                </a>
            </li>

            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="nav-link collapsed w-full" href="#" onclick="this.closest('form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span>
                    </a>
                </form>
            </li>
        </ul>
    </aside>

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <!-- Columns -->
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class=" alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success </strong>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class=" alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="">Error </strong>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class=" alert alert-danger alert-dismissible fade show">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="footer" class="footer">
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
