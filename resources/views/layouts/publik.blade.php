<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/blog-theme.css') }}" rel="stylesheet">
</head>
<body>
<header class="pub-top">
    <div class="container inner">
        <a href="{{ route('blog.index') }}" class="pub-brand">Blog Kami<small>Artikel terbaru seputar teknologi dan pemrograman</small></a>
        <nav class="pub-nav">
            <a href="{{ route('blog.index') }}">Beranda</a>
            <a href="{{ route('blog.index') }}">Artikel</a>
            <a href="{{ route('blog.index') }}#kategori">Kategori</a>

        </nav>
    </div>
</header>

<div class="container py-4">
    <div class="row g-4">
        <div class="col-lg-8">
            @yield('main')
        </div>
        <div class="col-lg-4" id="kategori">
            @yield('sidebar')
        </div>
    </div>
</div>

<footer class="pub-footer">
    <div class="container d-flex justify-content-between">
        <div>© {{ date('Y') }} Blog Kami. Seluruh hak cipta dilindungi.</div>
        <div>
            @auth
                <a href="{{ route('dashboard') }}" style="color: #9aa099; text-decoration: none;">Masuk Dashboard</a>
            @else
                <a href="{{ route('login') }}" style="color: #9aa099; text-decoration: none;">Login Admin</a>
            @endauth
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
