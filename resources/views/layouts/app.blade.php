<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Aplikasi Arsip Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 220px;
            background: #f0f2f5;
            padding: 20px;
            border-right: 1px solid #ccc;
        }

        .sidebar h5 {
            font-size: 14px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .sidebar .nav-link {
            font-size: 15px;
            margin: 5px 0;
        }

        .konten {
            flex: 1;
            padding: 25px;
            background: #fff;
        }

        .sidebar .nav-link {
            font-size: 15px;
            margin: 5px 0;
            color: #000 !important;
            /* teks hitam */
        }

        .sidebar .nav-link i {
            margin-right: 8px;
            color: #000;
            /* ikon hitam */
        }
    </style>
</head>

<body>
    {{-- Sidebar --}}
    <div class="sidebar">
        <h5>Menu<br>-------</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('arsip.index') }}">
                    <i class="bi bi-folder-fill"></i> Arsip
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kategori.index') }}">
                    <i class="bi bi-tags-fill"></i> Kategori Surat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">
                    <i class="bi bi-person-circle"></i> About
                </a>
            </li>
        </ul>
    </div>

    {{-- Konten --}}
    <div class="konten">
        @if (session('sukses'))
            <div class="alert alert-success">{{ session('sukses') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('konten')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
