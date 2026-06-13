<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #2C3E50; font-size: 14px; min-height: 100vh; display: flex; align-items: center; }
        .login-card { max-width: 380px; width: 100%; border-radius: 12px; }
        .brand-dot { width: 44px; height: 44px; border-radius: 12px; background:#4CAF50; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700; }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card border-0 shadow login-card">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="brand-dot mx-auto mb-3">B</div>
                        <h5 class="fw-semibold mb-1">Sistem Manajemen Blog</h5>
                        <p class="text-muted small mb-0">Masuk untuk mengelola konten</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2" style="font-size:13px;">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_name" class="form-label fw-semibold" style="font-size:13px;">Username</label>
                            <input type="text" class="form-control" id="user_name" name="user_name"
                                   value="{{ old('user_name') }}" placeholder="Masukkan username" autofocus>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold" style="font-size:13px;">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Masukkan password">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Masuk</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="{{ route('blog.index') }}" class="small text-muted text-decoration-none">&larr; Kembali ke halaman publik</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
