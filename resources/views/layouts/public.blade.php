<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f1f5f9; font-size: 14px; color: #1e293b; }
        .navbar-blog { background-color: #1f2d3d; color: #fff; padding: 18px 0; }
        .brand-title { font-size: 20px; font-weight: 700; margin: 0; color: #fff; }
        .brand-sub { font-size: 12px; color: #94a3b8; margin: 0; }
        .nav-public a { color: #cbd5e1; text-decoration: none; font-size: 14px; margin-left: 22px; }
        .nav-public a:hover { color: #fff; }

        .post-card { background: #fff; border-radius: 12px; overflow: hidden; border: 1px solid #e2e8f0; margin-bottom: 24px; }
        .post-img { width: 100%; height: 230px; object-fit: cover; display: block; }
        .badge-kategori { background-color: #eef2ff; color: #4f46e5; font-weight: 600; font-size: 11px; padding: 5px 10px; border-radius: 6px; }
        .post-title { font-size: 19px; font-weight: 700; color: #0f172a; margin: 12px 0 10px; }
        .post-title a { color: inherit; text-decoration: none; }
        .post-title a:hover { color: #2c3947; }
        .author-avatar { width: 28px; height: 28px; border-radius: 50%; color: #fff; display: inline-flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; }
        .meta { font-size: 12px; color: #64748b; }
        .post-excerpt { font-size: 13.5px; color: #475569; line-height: 1.7; }
        .btn-baca { background-color: #2c3947; color: #fff; border: none; font-size: 13px; font-weight: 600; padding: 8px 16px; border-radius: 8px; text-decoration: none; display: inline-block; }
        .btn-baca:hover { background-color: #1f2833; color: #fff; }

        .widget { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 18px; position: sticky; top: 20px; }
        .widget-title { font-size: 16px; font-weight: 700; color: #0f172a; margin-bottom: 14px; }
        .widget-item { display: flex; justify-content: space-between; align-items: center; padding: 9px 12px; border-radius: 8px; color: #475569; text-decoration: none; font-size: 14px; margin-bottom: 4px; }
        .widget-item:hover { background-color: #f1f5f9; color: #0f172a; }
        .widget-item.active { background-color: #2c3947; color: #fff; font-weight: 600; }
        .widget-count { background-color: #e2e8f0; color: #475569; border-radius: 20px; font-size: 11px; padding: 2px 9px; font-weight: 600; }
        .widget-item.active .widget-count { background-color: rgba(255,255,255,0.25); color: #fff; }

        .footer-blog { background-color: #1f2d3d; color: #94a3b8; text-align: center; padding: 18px 0; font-size: 13px; margin-top: 30px; }

        .breadcrumb-blog { font-size: 13px; color: #64748b; }
        .breadcrumb-blog a { color: #2c3947; text-decoration: none; }
        .article-body { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden; }
        .article-body .detail-img { width: 100%; max-height: 360px; object-fit: cover; }
        .article-content p { color: #334155; line-height: 1.85; font-size: 14.5px; }
        .related-item { display: flex; gap: 10px; padding: 10px 0; border-bottom: 1px solid #f1f5f9; text-decoration: none; }
        .related-item:last-child { border-bottom: none; }
        .related-thumb { width: 56px; height: 48px; object-fit: cover; border-radius: 6px; flex-shrink: 0; }
        .related-title { font-size: 13px; font-weight: 600; color: #0f172a; line-height: 1.35; margin: 0; }
        .related-date { font-size: 11px; color: #94a3b8; }
    </style>
</head>
<body>
    <nav class="navbar-blog">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <p class="brand-title">Blog Kami</p>
                <p class="brand-sub">Artikel terbaru seputar teknologi dan pemrograman</p>
            </div>
            <div class="nav-public d-none d-md-block">
                <a href="{{ route('blog.index') }}">Beranda</a>
                <a href="{{ route('blog.index') }}">Artikel</a>
                <a href="{{ route('blog.index') }}#kategori">Kategori</a>
                <a href="{{ route('login') }}">Tentang</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        @yield('content')
    </div>

    <footer class="footer-blog">
        &copy; {{ date('Y') }} Blog Kami. Seluruh hak cipta dilindungi.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
