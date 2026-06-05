@echo off
REM ============================================================
REM  migrasi_gambar.bat
REM  Menyalin gambar lama (proyek prosedural) ke storage Laravel.
REM  Cara pakai:
REM    1. Ubah dua baris PATH di bawah ini sesuai komputer Anda.
REM    2. Simpan file ini, lalu klik dua kali / jalankan di CMD.
REM ============================================================

REM ---- UBAH SESUAI PATH ANDA ----
set PROYEK_LAMA=C:\laragon\www\uts web programing
set PROYEK_LARAVEL=C:\laragon\www\aplikasi-blog
REM --------------------------------

echo.
echo Menyalin foto penulis...
xcopy "%PROYEK_LAMA%\uploads_penulis\*" "%PROYEK_LARAVEL%\storage\app\public\foto\" /Y /I

echo.
echo Menyalin gambar artikel...
xcopy "%PROYEK_LAMA%\uploads_artikel\*" "%PROYEK_LARAVEL%\storage\app\public\gambar\" /Y /I

echo.
echo Selesai. Pastikan file default.png juga ada di:
echo   %PROYEK_LARAVEL%\storage\app\public\foto\default.png
echo.
pause
