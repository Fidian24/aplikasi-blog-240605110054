# Sistem Manajemen Blog (CMS) — aplikasi-blog

Aplikasi **Content Management System (CMS)** berbasis **Laravel** untuk mengelola
konten blog: artikel, penulis, dan kategori. Dilengkapi sistem login, panel admin,
serta **halaman pengunjung** publik untuk membaca artikel. Dibangun sebagai
pengembangan dari materi Bab 9 (autentikasi) dan Bab 10 (Model, Database, CRUD).

---

## ✨ Fitur

- **Autentikasi** — login & logout untuk penulis, seluruh area admin dilindungi middleware.
- **Dashboard** — halaman sambutan berisi nama dan waktu login.
- **Kelola Artikel** — CRUD artikel: judul, isi, kategori, gambar; penulis & tanggal terisi otomatis.
- **Kelola Penulis** — CRUD penulis beserta upload foto profil dan hashing password.
- **Kelola Kategori** — CRUD kategori artikel.
- **Data Pengunjung (blog publik)** — daftar artikel terbaru (5 awal + tombol "tampilkan 10 lagi"),
  kartu berisi avatar penulis, nama, hari/tanggal, kategori, separuh isi, dan "Baca selengkapnya";
  halaman baca artikel penuh; sidebar kanan berisi navigasi, daftar kategori, dan judul artikel terbaru.
- **Upload gambar** via Laravel Storage (folder terpisah: `foto` untuk penulis, `gambar` untuk artikel).
- **Validasi input** sisi server + notifikasi (flash message) mengikuti pola PRG.
- **Tampilan** bergaya editorial (font Fraunces + Archivo, sidebar admin gelap, kartu lembut).

---

## 🛠️ Teknologi

- **Framework:** Laravel 10 (PHP 8.1+)
- **Database:** MySQL (`db_blog`)
- **Frontend:** Blade, Bootstrap 5 (CDN), CSS kustom (`public/css/blog-theme.css`)
- **Server lokal:** Laragon
- **ORM:** Eloquent

---

## 🗄️ Struktur Database (`db_blog`)

### Tabel `penulis`
| Kolom | Tipe | Keterangan |
|------|------|-----------|
| id | INT (PK, AI) | ID penulis |
| nama_depan | VARCHAR(100) | Nama depan |
| nama_belakang | VARCHAR(100) | Nama belakang |
| user_name | VARCHAR(50), UNIQUE | Username login |
| password | VARCHAR(255) | Password (hash bcrypt) |
| foto | VARCHAR(255) | Nama file foto profil |

### Tabel `kategori_artikel`
| Kolom | Tipe | Keterangan |
|------|------|-----------|
| id | INT (PK, AI) | ID kategori |
| nama_kategori | VARCHAR(100), UNIQUE | Nama kategori |
| keterangan | TEXT (nullable) | Deskripsi |

### Tabel `artikel`
| Kolom | Tipe | Keterangan |
|------|------|-----------|
| id | INT (PK, AI) | ID artikel |
| id_penulis | INT (FK → penulis.id) | Penulis |
| id_kategori | INT (FK → kategori_artikel.id) | Kategori |
| judul | VARCHAR(255) | Judul |
| isi | TEXT | Isi artikel |
| gambar | VARCHAR(255) | Nama file gambar |
| hari_tanggal | VARCHAR(50) | Tanggal publikasi (teks) |

Relasi: `penulis (1) ── (N) artikel (N) ── (1) kategori_artikel`.
Foreign key memakai `ON DELETE RESTRICT` — penulis/kategori tidak bisa dihapus
selama masih memiliki artikel.

---

## 📁 Struktur Folder (bagian penting)

```
aplikasi-blog/
├── app/
│   ├── Models/                 Artikel.php, Penulis.php, KategoriArtikel.php
│   └── Http/Controllers/       Login, Dashboard, Artikel, Penulis, KategoriArtikel, Blog
├── config/auth.php             guard diarahkan ke tabel penulis
├── routes/web.php              rute publik (blog), login, admin (CRUD)
├── resources/views/
│   ├── layouts/                app.blade.php (admin), publik.blade.php (pengunjung)
│   ├── login.blade.php
│   ├── dashboard/
│   ├── artikel/  penulis/  kategori/     (index, create, edit)
│   └── blog/                   index.blade.php, show.blade.php
├── public/css/blog-theme.css   tema visual
└── storage/app/public/
    ├── foto/                   foto penulis (+ default.png)
    └── gambar/                 gambar artikel
```

---

## ✅ Prasyarat

- Laragon (sudah termasuk PHP 8.1+, MySQL, Composer)
- Browser modern
- Koneksi internet (Bootstrap & font dimuat dari CDN)

---

## 🚀 Instalasi dari Nol

> Jika proyek `aplikasi-blog` sudah ada, lewati langkah 2 dan langsung salin file.

### 1. Siapkan database
- Jalankan Laragon → **Start All**.
- Buka phpMyAdmin / HeidiSQL → impor `db_blog.sql`.
- (Opsional) impor `tambahan_artikel.sql` untuk menambah contoh artikel.

### 2. Buat proyek Laravel
```bash
cd C:\laragon\www
composer create-project laravel/laravel:^10 aplikasi-blog
```

### 3. Salin file aplikasi
Salin seluruh file proyek (Models, Controllers, views, routes/web.php,
config/auth.php, public/css/blog-theme.css, default.png) ke dalam
`C:\laragon\www\aplikasi-blog`, timpa bila diminta.

### 4. Konfigurasi `.env`
```dotenv
APP_TIMEZONE=Asia/Jakarta
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
SESSION_DRIVER=file
```

### 5. Storage & gambar
Jalankan di **Terminal Laragon** (di dalam folder proyek):
```bash
php artisan storage:link
mkdir storage\app\public\gambar
```
Pastikan `storage/app/public/foto/default.png` ada, dan file gambar artikel/penulis
sudah disalin ke `storage/app/public/gambar` dan `storage/app/public/foto`.

### 6. Bersihkan cache & jalankan
```bash
php artisan optimize:clear
php artisan serve
```
Buka **http://localhost:8000**

---

## 🔑 Akun & Login

Login di `http://localhost:8000/login`.
- **Username:** `ninakusuma_`
- **Password:** sesuai yang Anda set.

Reset / ganti password lewat Terminal Laravel:
```bash
php artisan tinker
```
```php
$p = App\Models\Penulis::where('user_name','ninakusuma_')->first();
$p->password = bcrypt('passwordbaru123');
$p->save();
exit
```

---

## 🌐 Halaman & Rute

| Halaman | URL |
|--------|-----|
| Blog pengunjung | `/blog` |
| Baca artikel | `/blog/{id}` |
| Filter kategori | `/blog/kategori/{id}` |
| Login | `/login` |
| Dashboard (admin) | `/dashboard` |
| Kelola Artikel | `/artikel` |
| Kelola Penulis | `/penulis` |
| Kelola Kategori | `/kategori` |

Menu **Data Pengunjung** tersedia di sidebar admin (di bawah Kelola Kategori).
Beranda `/` diarahkan ke halaman blog pengunjung.

---

## 🎨 Kustomisasi Tampilan

Semua warna terpusat di `public/css/blog-theme.css` pada blok `:root { ... }`
(mis. `--accent` untuk warna hijau, `--paper` untuk latar). Ubah nilainya untuk
mengganti tema secara menyeluruh.

Jumlah artikel di halaman pengunjung diatur di `app/Http/Controllers/BlogController.php`:
- `const AWAL = 5;` jumlah artikel awal
- `const TAMBAH = 10;` jumlah tambahan tiap klik

---

## 🧰 Troubleshooting

- **`php` not recognized** → gunakan **Terminal bawaan Laragon**, atau Laragon → Menu → Tools → Path → Add Laragon to Path (lalu buka terminal baru).
- **Tampilan/halaman tidak berubah** → `php artisan view:clear` lalu `php artisan optimize:clear`, dan tekan **Ctrl+F5** di browser.
- **Gambar rusak (broken image)** → file gambar belum ada di `storage/app/public/gambar` / `foto`, atau `php artisan storage:link` belum dijalankan.
- **Tidak bisa login** → pastikan `SESSION_DRIVER=file`, `config/auth.php` mengarah ke `App\Models\Penulis`, lalu `php artisan optimize:clear`. Reset password via tinker bila perlu.
- **419 Page Expired** → pastikan `APP_KEY` terisi (`php artisan key:generate`).
- **Port 8000 dipakai** → `php artisan serve --port=8080`.
- **Halaman pengunjung kosong** → cek `php artisan route:list | findstr blog` untuk memastikan rute blog terdaftar; pastikan ada data artikel di database.

---

## 📌 Catatan

- Aplikasi ini dibuat untuk keperluan tugas (UTS/UAS Pemrograman Web).
- Database `db_blog` dapat dipakai bersama dengan proyek lain karena koneksi
  diatur dari `.env`, bukan dari kode.
