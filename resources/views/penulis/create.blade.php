@extends('layouts.app')

@section('title', 'Tambah Penulis')

@section('content')
<div class="page-head fade-up">
    <div>
        <div class="eyebrow">Penulis</div>
        <h1>Tambah Penulis</h1>
    </div>
    <a href="{{ route('penulis.index') }}" class="btn btn-soft px-3 py-2">← Kembali</a>
</div>

<div class="card-soft fade-up d1 p-4 p-md-5" style="max-width:820px;">
    <form action="{{ route('penulis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="nama_depan" class="form-label">Nama Depan <span class="req">*</span></label>
                <input type="text" class="form-control @error('nama_depan') is-invalid @enderror"
                       id="nama_depan" name="nama_depan" value="{{ old('nama_depan') }}" placeholder="Masukkan nama depan">
                @error('nama_depan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="col-md-6">
                <label for="nama_belakang" class="form-label">Nama Belakang <span class="req">*</span></label>
                <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror"
                       id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}" placeholder="Masukkan nama belakang">
                @error('nama_belakang') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="user_name" class="form-label">Username <span class="req">*</span></label>
            <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                   id="user_name" name="user_name" value="{{ old('user_name') }}" placeholder="Masukkan username">
            @error('user_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="req">*</span></label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                   id="password" name="password" placeholder="Masukkan password (minimal 8 karakter)">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="foto" class="form-label">Foto Profil</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                   id="foto" name="foto" accept="image/jpg,image/jpeg,image/png">
            <div class="form-text">Format: JPG, JPEG, PNG. Maksimal 2 MB. Jika kosong, foto default dipakai.</div>
            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('penulis.index') }}" class="btn btn-soft px-3">Batal</a>
            <button type="submit" class="btn btn-emerald px-4">Simpan Data</button>
        </div>
    </form>
</div>
@endsection
