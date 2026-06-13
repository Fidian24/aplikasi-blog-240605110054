<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\BlogController;

// ============================================================
// HALAMAN PUBLIK (PENGUNJUNG) - tanpa login
// ============================================================
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/kategori/{id}', [BlogController::class, 'kategori'])->name('blog.kategori');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show')->whereNumber('id');

// ============================================================
// AUTENTIKASI
// ============================================================
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ============================================================
// AREA ADMIN (wajib login)
// ============================================================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('artikel', ArtikelController::class)->except(['show']);
    Route::resource('penulis', PenulisController::class)->except(['show']);
    Route::resource('kategori', KategoriArtikelController::class)->except(['show']);
});

// ============================================================
// BERANDA
// ============================================================
// Default: halaman utama diarahkan ke blog pengunjung.
// Jika ingin tetap ke login admin, ganti 'blog.index' menjadi 'login'.
Route::get('/', function () {
    return redirect()->route('blog.index');
});
