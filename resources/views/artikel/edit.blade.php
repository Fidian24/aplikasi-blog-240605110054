@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<div class="page-head fade-up">
    <div>
        <div class="eyebrow">Artikel</div>
        <h1>Edit Artikel</h1>
    </div>
    <a href="{{ route('artikel.index') }}" class="btn btn-soft px-3 py-2">← Kembali</a>
</div>

<div class="card-soft fade-up d1 p-4 p-md-5" style="max-width:880px;">
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul <span class="req">*</span></label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                   id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" placeholder="Masukkan judul artikel">
            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori <span class="req">*</span></label>
            <select class="form-select @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $item)
                    <option value="{{ $item->id }}" {{ old('id_kategori', $artikel->id_kategori) == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Artikel <span class="req">*</span></label>
            <textarea class="form-control @error('isi') is-invalid @enderror"
                      id="isi" name="isi" rows="7" placeholder="Masukkan isi artikel">{{ old('isi', $artikel->isi) }}</textarea>
            @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="gambar" class="form-label">Gambar</label>
            <div class="mb-2">
                <img src="{{ asset('storage/gambar/' . $artikel->gambar) }}"
                     alt="Gambar Artikel" class="thumb" style="width:120px; height:80px;">
            </div>
            <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                   id="gambar" name="gambar" accept="image/jpg,image/jpeg,image/png">
            <div class="form-text">Format: JPG, JPEG, PNG. Maksimal 2 MB. Kosongkan jika tidak ingin mengubah gambar.</div>
            @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('artikel.index') }}" class="btn btn-soft px-3">Batal</a>
            <button type="submit" class="btn btn-emerald px-4">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
