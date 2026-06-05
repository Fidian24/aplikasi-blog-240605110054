<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login · Sistem Manajemen Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/blog-theme.css') }}" rel="stylesheet">
</head>
<body>
<div class="auth-wrap">
    <div class="auth-card fade-up">
        <div class="auth-head">
            <div class="auth-emblem">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#15784a" stroke-width="1.6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
            <h1>Masuk</h1>
            <p>Sistem Manajemen Blog — kelola kontenmu.</p>
        </div>

        <div class="auth-body">
            @if($errors->any())
                <div class="alert alert-danger" style="font-size:13px;">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('login.proses') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="user_name" name="user_name"
                           value="{{ old('user_name') }}" placeholder="Masukkan username" autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Masukkan password">
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="ingat" name="ingat" value="1">
                    <label class="form-check-label" for="ingat" style="font-size:13px;">Ingat saya</label>
                </div>

                <button type="submit" class="btn btn-emerald w-100 py-2">Masuk</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
