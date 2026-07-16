<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMP Negeri 1 Purworejo')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght=300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        *, body {
            font-family: 'Poppins', sans-serif !important;
        }

        body {
            background: #f8fafc;
            color: #1e293b;
        }

        .navbar-custom {
            background: #ffffff;
            box-shadow: 0 4px 25px rgba(0,0,0,.08);
            padding: 12px 0;
        }

        .school-logo {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .school-name {
            font-size: 20px;
            font-weight: 700 !important;
            color: #0d47a1;
            margin: 0;
        }

        .school-subtitle {
            font-size: 12px;
            color: #64748b;
            margin: 0;
        }

        .navbar-nav .nav-link {
            color: #334155 !important;
            font-weight: 600 !important;
            margin-left: 10px;
            transition: .3s;
        }

        .navbar-nav .nav-link:hover {
            color: #2563eb !important;
        }

        .navbar-nav .nav-link.active {
            color: #2563eb !important;
            font-weight: 700 !important;
        }

        .dropdown-menu {
            border-radius: 12px !important;
            padding: 8px 0;
        }

        .dropdown-item {
            font-weight: 500;
            color: #334155;
            transition: .2s;
        }

        .dropdown-item:hover {
            background-color: #f1f5f9;
            color: #2563eb;
        }

        .dropdown-item.active-menu {
            background-color: #eff6ff;
            color: #2563eb;
            font-weight: 600;
        }

        .btn-login {
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 600 !important;
        }

        .btn-ppdb {
            border-radius: 50px;
            padding: 10px 22px;
            font-weight: 600 !important;
            color: white !important;
        }

        main {
            min-height: 600px;
            display: block; /* Memaksa penempatan blok baru */
            clear: both;
        }

        footer {
            background: #0f172a;
            color: white;
            margin-top: 80px;
        }

        .footer-top {
            padding: 70px 0 50px;
        }

        .footer-title {
            font-size: 20px;
            font-weight: 700 !important;
            margin-bottom: 20px;
        }

        .footer-links a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            margin-bottom: 12px;
            transition: .3s;
        }

        .footer-links a:hover {
            color: #ffffff;
            padding-left: 5px;
        }

        .social-icon {
            width: 45px;
            height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
            color: white;
            text-decoration: none;
            margin-right: 10px;
            transition: .3s;
        }

        .social-icon:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.1);
            text-align: center;
            padding: 20px;
            color: #cbd5e1;
            font-size: 14px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-sekolah.png') }}" class="school-logo me-3" alt="Logo Sekolah">
            <div>
                <h5 class="school-name">SMP Negeri 1 Purworejo</h5>
                <p class="school-subtitle">Unggul • Berkarakter • Berprestasi</p>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                {{-- DROPDOWN PROFIL SESUAI URUTAN PEMINTAAN --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('profil*') ? 'active' : '' }}" href="#" id="navbarDropdownProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu border-0 shadow mt-2" aria-labelledby="navbarDropdownProfil">
                        {{-- 1. Sejarah Sekolah --}}
                        <li>
                            <a class="dropdown-item py-2 {{ request()->routeIs('frontend.sejarah') ? 'active-menu' : '' }}"
                            href="{{ route('frontend.sejarah') }}">
                                Sejarah Sekolah
                            </a>
                        </li>

                        {{-- 2. Visi & Misi --}}
                        <li>
                            <a class="dropdown-item py-2 {{ request()->routeIs('frontend.visimisi') ? 'active-menu' : '' }}"
                            href="{{ route('frontend.visimisi') }}">
                                Visi & Misi
                            </a>
                        </li>

                        {{-- 3. Struktur Organisasi --}}
                        <li>
                            <a class="dropdown-item py-2 {{ request()->routeIs('frontend.struktur') ? 'active-menu' : '' }}"
                            href="{{ route('frontend.struktur') }}">
                                Struktur Organisasi
                            </a>
                        </li>

                        {{-- 4. Akreditasi --}}
                        <li>
                            <a class="dropdown-item py-2 {{ request()->routeIs('frontend.akreditasi') ? 'active-menu' : '' }}"
                            href="{{ route('frontend.akreditasi') }}">
                                <i class="bi bi-patch-check-fill text-primary me-1"></i>
                                Akreditasi
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        {{-- 5. Ekstrakurikuler --}}
                        <li>
                            <a class="dropdown-item py-2 {{ request()->routeIs('frontend.ekstrakurikuler*') ? 'active-menu' : '' }}"
                            href="{{ route('frontend.ekstrakurikuler') }}">
                                Ekstrakurikuler
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.guru.*') ? 'active' : '' }}" href="{{ route('frontend.guru.index') }}">
                        Guru & Staf
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.berita.*') ? 'active' : '' }}" href="{{ route('frontend.berita.index') }}">
                        Berita
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('frontend.kontak') ? 'active' : '' }}" href="{{ route('frontend.kontak') }}">
                        Kontak
                    </a>
                </li>

                <li class="nav-item ms-lg-3 my-2 my-lg-0">
                    <a href="{{ route('frontend.ppdb') }}" class="btn btn-warning btn-ppdb w-100 text-center">
                        <i class="bi bi-megaphone-fill"></i> PPDB
                    </a>
                </li>

                <li class="nav-item dropdown ms-lg-2">
                    <a href="#" class="btn btn-outline-primary btn-login dropdown-toggle d-block w-100 text-center" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> Akses Akun
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow mt-2">
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('login') }}">
                                <i class="bi bi-person-lock text-primary me-2"></i> Login Admin
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ route('register') }}">
                                <i class="bi bi-person-plus text-success me-2"></i> Register
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<footer id="kontak">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="footer-title">SMP Negeri 1 Purworejo</h4>
                    <p class="text-light">
                        Sekolah yang berkomitmen mencetak generasi unggul, berkarakter, berprestasi, dan siap menghadapi tantangan masa depan.
                    </p>
                </div>

                <div class="col-lg-3 mb-4">
                    <h4 class="footer-title">Menu Cepat</h4>
                    <div class="footer-links">
                        <a href="{{ route('home') }}">Beranda</a>
                        <a href="{{ route('frontend.sejarah') }}">Profil</a>
                        <a href="{{ route('frontend.berita.index') }}">Berita</a>
                        <a href="{{ route('frontend.ppdb') }}">PPDB</a>
                    </div>
                </div>

                <div class="col-lg-5">
                    <h4 class="footer-title">Hubungi Kami</h4>
                    <p><i class="bi bi-geo-alt-fill me-2"></i> Jl. Jenderal Sudirman No.8, Ngupasan, Pangenjurutengah, Kec. Purworejo, Kabupaten Purworejo, Jawa Tengah 54114</p>
                    <p><i class="bi bi-envelope-fill me-2"></i> smp1pwj@gmail.com</p>
                    <p><i class="bi bi-telephone-fill me-2"></i> (0275) 321405</p>

                    <div class="mt-4">
                        <a href="https://www.instagram.com/spensaofficial/" target="_blank" rel="noopener noreferrer" class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://www.tiktok.com/@spensaaofficial?_r=1&_t=ZS-97r6KI5XMZd" target="_blank" rel="noopener noreferrer" class="social-icon">
                            <i class="bi bi-tiktok"></i>
                        </a>
                        <a href="https://youtube.com/channel/UCihVWtbZnwFa6zorwxCnMog" target="_blank" rel="noopener noreferrer" class="social-icon">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        © {{ date('Y') }} SMP Negeri 1 Purworejo. All Rights Reserved.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>