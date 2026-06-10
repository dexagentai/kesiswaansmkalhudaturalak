<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data & Absensi Siswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font & Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f9faf9;
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar hijau elegan */
        .navbar {
            background-color: #2e7d32 !important;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 700;
            color: #ffffff !important;
            letter-spacing: 0.5px;
        }

        .navbar-brand img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ffffff;
            padding: 3px;
            margin-right: 10px;
        }

        .nav-link {
            color: #ffffff !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #c8e6c9 !important;
        }

        /* Konten utama */
        .container {
            max-width: 1200px;
        }

        /* Footer */
        footer {
            color: #4e4e4e;
            font-size: 0.9rem;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark no-print">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo_alhuda.png') }}" alt="Logo SMK AL HUDA TURALAK">
                SMK AL HUDA TURALAK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/siswa"><i class="bi bi-people-fill me-1"></i>Data Siswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/absensi"><i class="bi bi-calendar-check me-1"></i>Absensi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/administrasi"><i class="bi bi-folder-check me-1"></i>Administrasi</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center text-muted no-print">
        &copy; {{ date('Y') }} SMK AL HUDA TURALAK — Sistem Kesiswaan Terintegrasi
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
