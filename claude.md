
tampilan loginnya hilang tolong perbaiki, tadi awalnya ada, tetapi setelah login dan berhasil masuk ke system tampilan loginnya tidak ditemukan lagi, meskipun sudah memanggil ulang alamat, jadi tolong perbaiki supaya tampilan login tidak hilang-hilangan.
kemudian revisi bagian : 
1. buat data pengunjung pisah dengan dashboard, kelola artikel, kelola penulis, kelola kategori 
2. untuk membuka data pengunjung tidak perlu login tapi untuk membuka ashboard, kelola artikel, kelola penulis, kelola kategori diperlukan login. 
pisahkan alamat untuk memanggil data pengunjung dan untuk membuka ashboard, kelola artikel, kelola penulis, kelola kategori


saat saya membuka bagian login yaitu bagian dashboard, kelola artikel, kelola penulis, kelola kategori, kenapa munculnya masih pada data pengunjung
dan saat saya membuka http://127.0.0.1:8000/blog#login bagian login pun tidak muncul sehingga tidak bisa memunculkan agian dashboard, kelola artikel, kelola penulis, kelola kategori melainkan langsung mengarah ke data pengunjung

# Fix Login Page - WebFidian1

## Problem
`http://127.0.0.1:8000/login` shows blank white page.
File `resources/views/login.blade.php` is empty.

## Task
Replace the contents of `resources/views/login.blade.php` 
with a complete login page.

## Requirements
- Clean, simple, elegant design
- Consistent with blog theme (green color #2d6a4f)
- Form fields: `user_name` and `password`
- POST to route `login.proses`
- Show validation errors if any
- Link back to blog `route('blog.index')`
- No framework needed, pure CSS only

## Login Page Must Have
1. Title: "Login Admin"
2. Subtitle: "Masukkan username dan password untuk melanjutkan."
3. Input field: Username (name="user_name")
4. Input field: Password (name="password")
5. Submit button: "Masuk"
6. Error message display: `@if ($errors->any())`
7. Back link to blog: "← Kembali ke Blog"
8. CSRF token: `@csrf`

## Design Reference
- Background: #f0f2f5
- Card: white, border-radius 12px, shadow
- Primary color: #2d6a4f (dark green)
- Hover color: #1b4332
- Font: Segoe UI

## File to Edit
`resources/views/login.blade.php`

## After Fixing
Run in terminal:
```bash
php artisan config:clear
php artisan serve
```

Then test:
- Open `http://127.0.0.1:8000/login`
- Login with username: Fidian, password: Fidian24
- Should redirect to dashboard after login