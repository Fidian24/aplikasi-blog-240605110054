@extends('layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
<div class="page-head fade-up">
    <div>
        <div class="eyebrow">Konten</div>
        <h1>Artikel</h1>
        <p>Semua tulisan yang dipublikasikan di blog.</p>
    </div>
    <a href="{{ route('artikel.create') }}" class="btn btn-emerald px-3 py-2">+ Tambah Artikel</a>
</div>

<div class="card-soft fade-up d1">
    <table class="table-clean">
        <thead>
            <tr>
                <th style="width:72px;">Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Tanggal</th>
                <th style="width:150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($artikel as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/gambar/' . $item->gambar) }}"
                             alt="Gambar {{ $item->judul }}" class="thumb" style="width:52px; height:52px;">
                    </td>
                    <td style="font-weight:600; max-width:240px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                        {{ $item->judul }}
                    </td>
                    <td><span class="badge-soft">{{ $item->kategori->nama_kategori }}</span></td>
                    <td>{{ $item->penulis->nama_depan }} {{ $item->penulis->nama_belakang }}</td>
                    <td style="font-size:12px; color:var(--muted);">{{ $item->hari_tanggal }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('artikel.edit', $item->id) }}" class="btn act-edit">Edit</a>
                            <form action="{{ route('artikel.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn act-del">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="table-empty">Belum ada data artikel.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
