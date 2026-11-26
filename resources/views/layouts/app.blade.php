<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Kost')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="bi bi-house-door-fill me-1"></i> SIM-KOST
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('kamar*') ? 'active fw-semibold' : '' }}" href="{{ url('/kamar') }}">Data Kamar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('penghuni*') ? 'active fw-semibold' : '' }}" href="{{ url('/penghuni') }}">Data Penghuni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pembayaran*') ? 'active fw-semibold' : '' }}" href="{{ url('/pembayaran') }}">Pembayaran</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pembayaran*') ? 'active fw-semibold' : '' }}" href="{{ url('/pembayaran') }}">Tagihan & Pembayaran Saya</a>
                        </li>
                    @endif
                </ul>
                <div class="d-flex align-items-center text-white gap-3">
                    <span class="small">
                        <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                        <span class="badge bg-light text-primary text-uppercase ms-1">{{ Auth::user()->role }}</span>
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>