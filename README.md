# Sistem Manajemen Blog (CMS) + Halaman Pengunjung — aplikasi-blog

## Identitas
- **Nama Lengkap:** Adinda Nilam Cahya Putri Sina
- **NIM:** 240605110137

## Deskripsi Singkat
Aplikasi **Sistem Manajemen Blog (CMS)** berbasis **Laravel** dengan database `db_blog`.
Terdiri dari dua bagian:
1. **Halaman Administrator (CMS)** — login penulis, lalu mengelola (CRUD) artikel, penulis,
   dan kategori artikel. Dilindungi middleware `auth`.
2. **Halaman Pengunjung (publik, tanpa login):**
   - **Halaman utama** menampilkan lima artikel terbaru beserta widget kategori di samping.
     Pengunjung dapat menyaring artikel dengan mengklik kategori pada widget.
   - **Halaman detail artikel** menampilkan isi lengkap artikel beserta widget
     "Artikel Terkait" (lima artikel dari kategori yang sama).

Arsitektur MVC: Controller pengunjung (`BlogController`) terpisah dari Controller CMS,
seluruh route di `routes/web.php`, dan layout pengunjung (`layouts/publik`) terpisah
dari layout CMS (`layouts/app`).

## Teknologi
Laravel 10 · PHP 8.1+ · MySQL (`db_blog`) · Blade · Bootstrap 5 · CSS kustom.

## Cara Menjalankan Aplikasi Secara Lokal
1. **Siapkan server lokal** (Laragon/XAMPP), jalankan Apache & MySQL.
2. **Buat database** `db_blog`, lalu impor `db_blog.sql` (struktur + data) melalui
   phpMyAdmin/HeidiSQL. (Opsional: impor data contoh artikel tambahan.)
3. **Clone repositori** ini ke folder web server, mis. `C:\laragon\www\aplikasi-blog`.
4. **Install dependensi:**
   ```bash
   composer install
   ```
5. **Siapkan file environment:**
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```
   Lalu sesuaikan `.env`:
   ```
   APP_TIMEZONE=Asia/Jakarta
   DB_DATABASE=db_blog
   DB_USERNAME=root
   DB_PASSWORD=
   SESSION_DRIVER=file
   ```
6. **Buat symbolic link storage** (agar gambar tampil):
   ```bash
   php artisan storage:link
   ```
   Pastikan folder `storage/app/public/foto` dan `storage/app/public/gambar` berisi
   file gambar, serta ada `storage/app/public/foto/default.png`.
7. **Bersihkan cache & jalankan:**
   ```bash
   php artisan optimize:clear
   php artisan serve
   ```
8. Buka di browser:
   - Halaman pengunjung: `http://localhost:8000/blog`
   - Halaman admin: `http://localhost:8000/login`

## Akun Login (contoh)
- Username: `ninakusuma_`
- Password: [ISI PASSWORD / reset via `php artisan tinker`]

## Video Demonstrasi
- **YouTube:** [ISI TAUTAN VIDEO YOUTUBE]

