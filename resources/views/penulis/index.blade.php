@extends('layouts.app')

@section('title', 'Kelola Penulis')

@section('content')
<div class="page-head fade-up">
    <div>
        <div class="eyebrow">Tim</div>
        <h1>Penulis</h1>
        <p>Daftar penulis yang dapat membuat artikel.</p>
    </div>
    <a href="{{ route('penulis.create') }}" class="btn btn-emerald px-3 py-2">+ Tambah Penulis</a>
</div>

<div class="card-soft fade-up d1">
    <table class="table-clean">
        <thead>
            <tr>
                <th style="width:70px;">Foto</th>
                <th>Nama</th>
                <th>Username</th>
                <th style="width:150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($penulis as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/foto/' . $item->foto) }}"
                             onerror="this.src='{{ asset('storage/foto/default.png') }}'"
                             alt="Foto {{ $item->nama_depan }}" class="thumb" style="width:42px; height:42px;">
                    </td>
                    <td style="font-weight:600;">{{ $item->nama_depan }} {{ $item->nama_belakang }}</td>
                    <td style="color:var(--muted);">{{ $item->user_name }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('penulis.edit', $item->id) }}" class="btn act-edit">Edit</a>
                            <form action="{{ route('penulis.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus penulis ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn act-del">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="table-empty">Belum ada data penulis.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
