<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin SMP NEGERI 1 PURWOREJO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* SIDEBAR (Fix di kiri dengan internal scrollbar) */
        .sidebar {
            width: 270px;
            height: 100vh;
            background: linear-gradient(180deg, #2563eb, #1d4ed8);
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px;
            color: white;
            overflow-y: auto;
            box-shadow: 10px 0 30px rgba(0,0,0,0.08);
            z-index: 100;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .brand-box {
            margin-bottom: 35px;
        }

        .brand-title {
            font-size: 24px;
            font-weight: 700;
        }

        .brand-subtitle {
            opacity: 0.8;
            font-size: 14px;
        }

        /* PROFILE CARD */
        .profile-card {
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(10px);
            border-radius: 18px;
            padding: 18px;
            margin-bottom: 30px;
        }

        .profile-name {
            font-weight: 600;
            font-size: 16px;
        }

        .profile-role {
            font-size: 13px;
            opacity: 0.8;
        }

        /* MENU */
        .menu-title {
            font-size: 12px;
            letter-spacing: 1px;
            text-transform: uppercase;
            opacity: 0.7;
            margin-bottom: 15px;
            margin-top: 20px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 14px 16px;
            border-radius: 14px;
            margin-bottom: 10px;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            text-decoration: none;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.15);
            transform: translateX(5px);
            color: white;
        }

        .sidebar .nav-link.active {
            background: white;
            color: #2563eb;
            font-weight: 600;
        }

        /* MAIN CONTENT AREA */
        .main-content {
            margin-left: 270px;
            padding: 30px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-box {
            flex: 1;
            background: transparent;
        }

        /* BUTTONS */
        .btn-profile {
            background: #22c55e;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 18px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-profile:hover {
            background: #16a34a;
            color: white;
        }

        .btn-logout {
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 18px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background: #dc2626;
            color: white;
        }

        /* RESPONSIVE */
        @media(max-width: 991px){
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">

        <div class="brand-box">
            <div class="brand-title">SMP NEGERI 1 PURWOREJO</div>
            <div class="brand-subtitle">Admin Panel Sekolah</div>
        </div>

        <div class="profile-card">
            <div class="profile-name">{{ Auth::user()->name }}</div>
            <div class="profile-role">Administrator Sekolah</div>
        </div>

        <div class="menu-title">Main Menu</div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('berita.index') }}" class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> Berita
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('guru.index') }}" class="nav-link {{ request()->routeIs('guru.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Guru & Staf
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kepala-sekolah.index') }}" class="nav-link {{ request()->routeIs('kepala-sekolah.*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge-fill"></i> Kepala Sekolah
                </a>
            </li>

            <div class="menu-title">Manajemen Profil</div>

            <li class="nav-item">
                <a href="{{ url('/admin/profil/sejarah') }}" class="nav-link {{ request()->is('admin/profil/sejarah*') ? 'active' : '' }}">
                    <i class="bi bi-hourglass-split"></i> Sejarah Sekolah
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('ekstrakurikuler.index') }}"
                class="nav-link {{ request()->routeIs('ekstrakurikuler.*') ? 'active' : '' }}">
                    <i class="bi bi-trophy-fill"></i>
                    Ekstrakurikuler
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('visi-misi.index') }}" class="nav-link {{ request()->routeIs('visi-misi.*') ? 'active' : '' }}">
                    <i class="bi bi-bullseye"></i> Visi Misi
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/admin/profil/struktur-organisasi') }}" class="nav-link {{ request()->is('admin/profil/struktur-organisasi*') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3-fill"></i> Struktur Organisasi
                </a>
            </li>


            <div class="menu-title">Akademik</div>

            <li class="nav-item">
                <a href="{{ route('akreditasi.index') }}" class="nav-link {{ request()->routeIs('akreditasi.*') ? 'active' : '' }}">
                    <i class="bi bi-award-fill"></i> Akreditasi
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('ppdb.index') }}" class="nav-link {{ request()->routeIs('ppdb.*') ? 'active' : '' }}">
                    <i class="bi bi-megaphone-fill"></i> PPDB
                </a>
            </li>
        </ul>

        <div class="mt-5 pb-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-profile w-100 mb-2">
                <i class="bi bi-person-circle"></i> Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout w-100">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>

    </div>

    <div class="main-content">
        <div class="content-box">
            {{ $slot }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>