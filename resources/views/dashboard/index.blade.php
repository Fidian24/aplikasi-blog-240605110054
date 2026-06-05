@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-head fade-up">
    <div>
        <div class="eyebrow">Beranda Admin</div>
        <h1>Dashboard</h1>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card-soft fade-up d1 p-4 p-md-5">
            <div class="auth-emblem" style="margin:0 0 18px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#15784a" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
            <h2 style="font-size:28px; font-weight:600; margin:0 0 6px;">
                Selamat datang, <span style="color:var(--accent);">{{ $nama_lengkap }}</span>
            </h2>
            <p style="color:var(--muted); margin:0; font-size:14.5px; line-height:1.6;">
                Silakan pilih menu di sebelah kiri untuk mulai mengelola konten blog —
                artikel, penulis, dan kategori.
            </p>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card-soft fade-up d2 p-4 mb-4">
            <div class="eyebrow" style="font-size:10.5px; letter-spacing:.12em;">Login sebagai</div>
            <div style="font-family:'Fraunces',serif; font-size:20px; font-weight:600; margin-top:4px;">{{ $nama_lengkap }}</div>
        </div>
        <div class="card-soft fade-up d3 p-4">
            <div class="eyebrow" style="font-size:10.5px; letter-spacing:.12em;">Waktu login</div>
            <div style="font-size:15px; font-weight:600; margin-top:4px; color:var(--ink-soft);">{{ $waktu_login }}</div>
        </div>
    </div>
</div>
@endsection
