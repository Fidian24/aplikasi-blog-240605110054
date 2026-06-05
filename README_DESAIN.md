# Paket Desain Baru (hanya tampilan)

Mempercantik SELURUH tampilan tanpa mengubah alur, route, controller, nama field,
atau logika apa pun. Yang berubah hanya file CSS + markup view.

## Tema
- Gaya editorial: latar kertas hangat, aksen hijau zamrud + sentuhan emas.
- Font: Fraunces (judul) + Archivo (teks) — dimuat dari Google Fonts.
- Sidebar admin gelap elegan, kartu lembut, animasi masuk halus.

## Isi paket (timpa file lama dengan nama sama)
```
public/css/blog-theme.css                       (BARU - sumber gaya)
resources/views/layouts/app.blade.php           (timpa)
resources/views/layouts/publik.blade.php        (timpa)
resources/views/login.blade.php                 (timpa)
resources/views/dashboard/index.blade.php       (timpa)
resources/views/kategori/{index,create,edit}    (timpa)
resources/views/penulis/{index,create,edit}     (timpa)
resources/views/artikel/{index,create,edit}     (timpa)
resources/views/blog/{index,show}.blade.php     (timpa)
```

## Cara pasang
1. Salin folder `public` dan `resources` ke proyek `aplikasi-blog`, timpa bila diminta.
   (File CSS masuk ke `public/css/blog-theme.css`.)
2. Tidak ada perubahan database, route, atau controller. Tidak perlu migrasi.
3. Jalankan:
   ```
   php artisan optimize:clear
   php artisan serve
   ```
4. Buka browser. Kalau tampilan lama masih muncul, tekan Ctrl+F5 (hard refresh)
   untuk memuat ulang CSS.

## Catatan
- Semua nama input, action form, @csrf, @method, route, dan variabel TIDAK diubah,
  jadi semua fungsi (login, CRUD, upload, validasi, hapus, load more) tetap sama.
- File CSS dimuat lewat `asset('css/blog-theme.css')`. Pastikan ada di folder
  `public/css/`. Karena `public` web-accessible, tidak perlu storage:link untuk ini.
- Butuh koneksi internet saat membuka halaman (font Google & Bootstrap dari CDN),
  sama seperti sebelumnya.
