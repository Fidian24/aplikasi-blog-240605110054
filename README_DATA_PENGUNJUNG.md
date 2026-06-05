# Data Pengunjung — Paket Gabungan (lengkap + desain baru)

Memastikan halaman pengunjung ADA, BERFUNGSI, dan MUNCUL sebagai menu
"Data Pengunjung" di sidebar admin (tepat di bawah "Kelola Kategori").

Paket ini sudah memuat semua yang dibutuhkan, jadi pasang ini saja sudah cukup
untuk fitur Data Pengunjung — tidak peduli paket sebelumnya sudah/belum terpasang.

## Isi paket (timpa file dengan nama sama)
```
app/Http/Controllers/BlogController.php          (logika halaman pengunjung)
routes/web.php                                    (memuat rute /blog + semua rute lama)
resources/views/layouts/app.blade.php            (sidebar admin + menu "Data Pengunjung")
resources/views/layouts/publik.blade.php         (layout halaman pengunjung)
resources/views/blog/index.blade.php             (daftar artikel)
resources/views/blog/show.blade.php              (baca artikel penuh)
```

## Cara pasang
1. Salin semua file ke proyek `aplikasi-blog` (timpa bila diminta:
   `routes/web.php` dan `layouts/app.blade.php` memang diganti).
2. Jalankan:
   ```
   php artisan optimize:clear
   php artisan serve
   ```
3. Login ke admin. Di sidebar kiri, di bawah "Kelola Kategori", sekarang ada
   menu **Data Pengunjung**. Klik untuk membuka halaman pengunjung
   (terbuka di tab baru).
   Atau buka langsung: http://localhost:8000/blog

## Halaman pengunjung sudah sesuai aturan
- Menampilkan 5 artikel terbaru, tombol "Tampilkan 10 lagi" di bawahnya.
- Tiap artikel: avatar penulis, nama, hari/tanggal, kategori, judul,
  SETENGAH isi, dan "Baca selengkapnya".
- Halaman baca artikel penuh (klik judul / baca selengkapnya).
- Sidebar kanan: Navigasi, daftar Kategori (bisa diklik untuk filter),
  dan judul Artikel Terbaru.

## Catatan
- Tidak ada perubahan database. Tidak perlu migrasi.
- Menu "Data Pengunjung" membuka tab baru supaya panel admin tetap terbuka.
  Jika ingin terbuka di tab yang sama, buka `layouts/app.blade.php` dan hapus
  bagian `target="_blank" rel="noopener"` pada link Data Pengunjung.
- Agar gambar artikel & avatar tampil, file gambar harus sudah ada di
  storage/app/public/gambar dan storage/app/public/foto (avatar yang tidak
  ditemukan otomatis diganti default.png).
- Pastikan file desain `public/css/blog-theme.css` sudah ada (dari paket desain),
  karena tampilan memakai CSS itu.
