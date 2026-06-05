<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/blog-theme.css') }}" rel="stylesheet">
</head>
<body>
<div class="layout">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="brand">Blog<b>.</b>CMS</div>
        <div class="brand-sub">db_blog · panel admin</div>

        <div class="side-profile">
            <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}"
                 onerror="this.src='{{ asset('storage/foto/default.png') }}'" alt="Foto Profil">
            <div>
                <div class="greet">Halo,</div>
                <div class="name">{{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}</div>
            </div>
        </div>

        <div class="side-label">Menu Utama</div>

        <a href="{{ route('dashboard') }}" class="side-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10h5v-6h4v6h5V10"/></svg>
            Dashboard
        </a>
        <a href="{{ route('artikel.index') }}" class="side-link {{ request()->routeIs('artikel.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5 4h14v16H5zM8 8h8M8 12h8M8 16h5"/></svg>
            Kelola Artikel
        </a>
        <a href="{{ route('penulis.index') }}" class="side-link {{ request()->routeIs('penulis.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 12a4 4 0 100-8 4 4 0 000 8zM4 20c0-3.3 3.6-6 8-6s8 2.7 8 6"/></svg>
            Kelola Penulis
        </a>
        <a href="{{ route('kategori.index') }}" class="side-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h10"/></svg>
            Kelola Kategori
        </a>
        <a href="{{ route('blog.index') }}" class="side-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/><circle cx="12" cy="12" r="3"/></svg>
            Data Pengunjung
        </a>

        <div class="side-bottom">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Keluar</button>
            </form>
        </div>
    </aside>

    <!-- KONTEN -->
    <main class="content">
        @if(session('sukses'))
            <div class="alert alert-success fade-up" role="alert">
                {{ session('sukses') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('gagal'))
            <div class="alert alert-danger fade-up" role="alert">
                {{ session('gagal') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
