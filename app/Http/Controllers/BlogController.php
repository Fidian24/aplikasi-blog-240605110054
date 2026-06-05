<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;

class BlogController extends Controller
{
    // Jumlah artikel yang tampil pertama kali
    private const AWAL = 5;
    // Jumlah tambahan setiap klik "Tampilkan lebih banyak"
    private const TAMBAH = 10;

    /**
     * Halaman utama pengunjung: daftar artikel terbaru.
     */
    public function index(Request $request)
    {
        $tampil = (int) $request->query('tampil', self::AWAL);
        if ($tampil < self::AWAL) {
            $tampil = self::AWAL;
        }

        $artikel = Artikel::with('penulis', 'kategori')
            ->orderBy('id', 'desc')
            ->take($tampil)
            ->get();

        $total = Artikel::count();

        return view('blog.index', [
            'artikel'       => $artikel,
            'total'         => $total,
            'tampil'        => $tampil,
            'tambah'        => self::TAMBAH,
            'judulHalaman'  => 'Artikel Terbaru',
            'modeKategori'  => false,
        ]);
    }

    /**
     * Daftar artikel berdasarkan kategori.
     */
    public function kategori(string $id)
    {
        $kategori = KategoriArtikel::findOrFail($id);

        $artikel = Artikel::with('penulis', 'kategori')
            ->where('id_kategori', $id)
            ->orderBy('id', 'desc')
            ->get();

        return view('blog.index', [
            'artikel'       => $artikel,
            'total'         => $artikel->count(),
            'tampil'        => $artikel->count(),
            'tambah'        => self::TAMBAH,
            'judulHalaman'  => 'Kategori: ' . $kategori->nama_kategori,
            'modeKategori'  => true,
        ]);
    }

    /**
     * Halaman baca artikel penuh.
     */
    public function show(string $id)
    {
        $artikel = Artikel::with('penulis', 'kategori')->findOrFail($id);

        return view('blog.show', compact('artikel'));
    }
}
