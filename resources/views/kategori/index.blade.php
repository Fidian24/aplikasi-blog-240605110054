@extends('layouts.app')

@section('title', 'Kelola Kategori Artikel')

@section('content')
<div class="page-head fade-up">
    <div>
        <div class="eyebrow">Konten</div>
        <h1>Kategori Artikel</h1>
        <p>Kelompokkan artikel berdasarkan kategori.</p>
    </div>
    <a href="{{ route('kategori.create') }}" class="btn btn-emerald px-3 py-2">+ Tambah Kategori</a>
</div>

<div class="card-soft fade-up d1">
    <table class="table-clean">
        <thead>
            <tr>
                <th style="width:60px;">No</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th style="width:150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategori as $index => $item)
                <tr>
                    <td style="color:var(--muted);">{{ $index + 1 }}</td>
                    <td style="font-weight:600;">{{ $item->nama_kategori }}</td>
                    <td style="color:var(--muted);">{{ $item->keterangan ?? '—' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('kategori.edit', $item->id) }}" class="btn act-edit">Edit</a>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn act-del">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="table-empty">Belum ada data kategori.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
