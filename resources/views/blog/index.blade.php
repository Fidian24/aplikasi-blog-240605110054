@extends('layouts.publik')

@section('title', $judulHalaman)

@section('main')
<div class="pub-hero fade-up">
    <div class="kicker">{{ $modeKategori ? 'Kategori' : 'Jurnal' }}</div>
    <h1>{{ $modeKategori ? \Illuminate\Support\Str::after($judulHalaman, 'Kategori: ') : 'Artikel Terbaru' }}</h1>
    <div class="rule"></div>
</div>

<div id="daftar" class="mt-4">
@forelse($artikel as $item)
    @php
        $isiBersih = strip_tags($item->isi);
        $separuh   = \Illuminate\Support\Str::limit($isiBersih, (int) ceil(mb_strlen($isiBersih) / 2));
    @endphp
    <article class="post-card fade-up mb-4">
        <div class="p-4">
            <div class="d-flex align-items-center mb-3">
                <img src="{{ asset('storage/foto/' . $item->penulis->foto) }}"
                     onerror="this.src='{{ asset('storage/foto/default.png') }}'" alt="Penulis" class="post-avatar me-2">
                <div>
                    <div class="post-author">{{ $item->penulis->nama_depan }} {{ $item->penulis->nama_belakang }}</div>
                    <div class="post-meta">{{ $item->hari_tanggal }}</div>
                </div>
                <span class="badge-soft ms-auto">{{ $item->kategori->nama_kategori }}</span>
            </div>

            <a href="{{ route('blog.show', $item->id) }}" class="post-title d-block mb-2">{{ $item->judul }}</a>
            <p class="post-excerpt mb-3">{{ $separuh }}</p>
            <a href="{{ route('blog.show', $item->id) }}" class="read-more">Baca selengkapnya →</a>
        </div>
    </article>
@empty
    <div class="post-card p-4 text-center" style="color:var(--muted); font-style:italic;">
        Belum ada artikel untuk ditampilkan.
    </div>
@endforelse
</div>

@if(!$modeKategori && $total > $tampil)
    <div class="text-center mt-4 fade-up">
        <a href="{{ route('blog.index', ['tampil' => $tampil + $tambah]) }}#daftar" class="btn btn-emerald btn-pill px-4 py-2">
            Tampilkan {{ min($tambah, $total - $tampil) }} artikel lagi
        </a>
        <div class="post-meta mt-2">Menampilkan {{ $tampil > $total ? $total : $tampil }} dari {{ $total }} artikel</div>
    </div>
@endif
@endsection
