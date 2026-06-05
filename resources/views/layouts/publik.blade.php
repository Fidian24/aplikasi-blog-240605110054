<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/blog-theme.css') }}" rel="stylesheet">
</head>
<body>
@php
    $sidebarKategori = \App\Models\KategoriArtikel::withCount('artikel')->orderBy('nama_kategori')->get();
    $sidebarTerbaru  = \App\Models\Artikel::orderBy('id', 'desc')->take(5)->get();
@endphp

<header class="pub-top">
    <div class="container inner">
        <a href="{{ route('blog.index') }}" class="pub-brand">Blog<b>.</b><small>db_blog</small></a>
        <nav class="pub-nav">
            <a href="{{ route('blog.index') }}">Beranda</a>
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </nav>
    </div>
</header>

<div class="container py-4">
    <div class="row g-4">
        <!-- KONTEN UTAMA (kiri) -->
        <div class="col-lg-8">
            @yield('main')
        </div>

        <!-- SIDEBAR (kanan) -->
        <div class="col-lg-4">
            <div class="side-card fade-up d1 p-4 mb-4">
                <div class="side-card-title mb-2">Navigasi</div>
                <a href="{{ route('blog.index') }}" class="side-row">Beranda</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="side-row">Dashboard Admin</a>
                @else
                    <a href="{{ route('login') }}" class="side-row">Login Penulis</a>
                @endauth
            </div>

            <div class="side-card fade-up d2 p-4 mb-4">
                <div class="side-card-title mb-2">Kategori</div>
                @forelse($sidebarKategori as $kat)
                    <a href="{{ route('blog.kategori', $kat->id) }}" class="side-row">
                        <span>{{ $kat->nama_kategori }}</span>
                        <span class="side-count">{{ $kat->artikel_count }}</span>
                    </a>
                @empty
                    <p class="post-meta mb-0">Belum ada kategori.</p>
                @endforelse
            </div>

            <div class="side-card fade-up d3 p-4">
                <div class="side-card-title mb-2">Artikel Terbaru</div>
                @forelse($sidebarTerbaru as $t)
                    <a href="{{ route('blog.show', $t->id) }}" class="side-row">
                        {{ \Illuminate\Support\Str::limit($t->judul, 42) }}
                    </a>
                @empty
                    <p class="post-meta mb-0">Belum ada artikel.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
