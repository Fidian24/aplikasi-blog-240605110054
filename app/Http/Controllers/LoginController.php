<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Memproses percobaan login.
     * Auth::attempt() akan mencocokkan user_name dan memverifikasi
     * password dengan Hash::check (kompatibel dengan hash bcrypt $2y$
     * yang sudah tersimpan di tabel penulis).
     */
    public function proses(Request $request)
    {
        $kredensial = $request->validate([
            'user_name' => 'required|string',
            'password'  => 'required|string',
        ]);

        if (Auth::attempt($kredensial, $request->boolean('ingat'))) {
            $request->session()->regenerate();

            // Simpan waktu login untuk ditampilkan di dashboard
            session([
                'waktu_login' => now()->timezone('Asia/Jakarta')
                    ->locale('id')
                    ->isoFormat('dddd, D MMMM Y | HH:mm'),
            ]);

            return redirect()->intended(route('dashboard'));
        }

        return back()
            ->withErrors(['user_name' => 'Username atau password salah.'])
            ->onlyInput('user_name');
    }

    /**
     * Logout dan hapus session.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
