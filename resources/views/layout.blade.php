<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <title>Foodies</title>
</head>
<body class="site-body" data-motion="booting">
    <div class="page-transition" id="pageTransition" aria-hidden="true">
        <div class="page-transition__grain"></div>
        <div class="page-transition__label">Foodies Experience</div>
    </div>

    <div class="cinema-vignette" aria-hidden="true"></div>
    <div class="scroll-progress" id="scrollProgress"></div>
    <canvas class="fx-canvas" id="fxCanvas" aria-hidden="true"></canvas>
    <div class="cursor-aura" id="cursorAura" aria-hidden="true"></div>

    <div class="page-bg-orb orb-one"></div>
    <div class="page-bg-orb orb-two"></div>
    <div class="site-wrap">
        <header class="main-header">
            <div class="container header-inner">
                <a href="{{ route('home') }}" class="brand">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Foodies" class="brand-logo">
                    <div class="brand-copy">
                        <span class="brand-name">Foodies</span>
                        <span class="brand-tag">Resep Semua Makanan</span>
                    </div>
                </a>

                <nav class="nav-menu">
                    <a class="nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    <a class="nav-link {{ request()->routeIs('recipes.index', 'recipes.show') ? 'is-active' : '' }}" href="{{ route('recipes.index') }}">Semua Resep</a>
                    @if (Auth::check())
                        <a class="nav-link {{ request()->routeIs('recipes.create', 'recipes.edit') ? 'is-active' : '' }}" href="{{ route('recipes.create') }}">Tambah Resep</a>
                        <a class="nav-link {{ request()->routeIs('profile') ? 'is-active' : '' }}" href="{{ route('profile') }}">Profil</a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link border-0 bg-transparent">Logout</button>
                        </form>
                    @else
                        <a class="nav-link {{ request()->routeIs('register') ? 'is-active' : '' }}" href="{{ route('register') }}">Daftar</a>
                        <a class="nav-link {{ request()->routeIs('login') ? 'is-active' : '' }}" href="{{ route('login') }}">Login</a>
                    @endif
                </nav>
            </div>
        </header>

        <main class="page-content">
            @yield('content')
        </main>
    </div>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Foodies. Project Website Programming.</p>
    </footer>

    <script src="{{ asset('js/visitor-effects.js') }}" defer></script>
</body>
</html>
