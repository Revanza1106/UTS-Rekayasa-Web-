<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f7f6f1">
    <meta name="description" content="Temukan acara seru dan teman baru di RuangTemu, kalender acara komunitas lokal.">
    <title>@yield('title', 'RuangTemu — Acara komunitas dekatmu')</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg site-nav">
        <div class="container nav-inner">
            <a class="navbar-brand brand" href="{{ route('events.index') }}" aria-label="RuangTemu, halaman utama">
                <span class="brand-mark" aria-hidden="true">r.</span>
                <span>ruang<span class="brand-heavy">temu</span></span>
            </a>
            <div class="nav-links">
                <a class="nav-link {{ request()->routeIs('events.index') ? 'active' : '' }}" href="{{ route('events.index') }}">Jelajahi acara</a>
                <a class="nav-link" href="{{ route('events.index') }}#tentang">Tentang</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer" id="tentang">
        <div class="container footer-inner">
            <a class="brand footer-brand" href="{{ route('events.index') }}">
                <span class="brand-mark" aria-hidden="true">r.</span>
                <span>ruang<span class="brand-heavy">temu</span></span>
            </a>
            <p>Ruang kecil untuk menemukan hal besar bersama komunitas.</p>
            <span class="footer-note">Dibuat dengan semangat gotong royong <span aria-hidden="true">✳</span></span>
        </div>
    </footer>
    <script src="{{ asset('Bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
