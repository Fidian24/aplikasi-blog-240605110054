@extends('layouts.app')

@section('title', 'Edit Kategori Artikel')

@section('content')
<div class="page-head fade-up">
    <div>
        <div class="eyebrow">Kategori</div>
        <h1>Edit Kategori</h1>
    </div>
    <a href="{{ route('kategori.index') }}" class="btn btn-soft px-3 py-2">← Kembali</a>
</div>

<div class="card-soft fade-up d1 p-4 p-md-5" style="max-width:720px;">
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori <span class="req">*</span></label>
            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror"
                   id="nama_kategori" name="nama_kategori"
                   value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                   placeholder="Masukkan nama kategori">
            @error('nama_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror"
                      id="keterangan" name="keterangan" rows="4"
                      placeholder="Masukkan keterangan kategori (opsional)">{{ old('keterangan', $kategori->keterangan) }}</textarea>
            @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('kategori.index') }}" class="btn btn-soft px-3">Batal</a>
            <button type="submit" class="btn btn-emerald px-4">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
