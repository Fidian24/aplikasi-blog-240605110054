@extends('layouts.publik')

@section('title', $artikel->judul)

@section('main')
<div class="mb-3 fade-up">
    <a href="{{ route('blog.index') }}" class="read-more">← Kembali ke daftar</a>
</div>

<article class="post-card fade-up d1">
    <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="article-hero">
    <div class="p-4 p-md-5">
        <a href="{{ route('blog.kategori', $artikel->kategori->id) }}" class="badge-soft text-decoration-none d-inline-block mb-3">
            {{ $artikel->kategori->nama_kategori }}
        </a>

        <h1 style="font-size:34px; font-weight:600; letter-spacing:-.02em; line-height:1.15; color:var(--ink);">
            {{ $artikel->judul }}
        </h1>

        <div class="d-flex align-items-center my-4 pb-3" style="border-bottom:1px solid var(--line);">
            <img src="{{ asset('storage/foto/' . $artikel->penulis->foto) }}"
                 onerror="this.src='{{ asset('storage/foto/default.png') }}'" alt="Penulis" class="post-avatar me-2">
            <div>
                <div class="post-author">{{ $artikel->penulis->nama_depan }} {{ $artikel->penulis->nama_belakang }}</div>
                <div class="post-meta">{{ $artikel->hari_tanggal }}</div>
            </div>
        </div>

        <div class="article-body">{!! nl2br(e($artikel->isi)) !!}</div>
    </div>
</article>
@endsection
