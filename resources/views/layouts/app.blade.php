
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Kepegawaian')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar: #172554;
            --sidebar-hover: #263b70;
            --primary: #2563eb;
            --page-bg: #f5f7fb;
        }

        body {
            margin: 0;
            background: var(--page-bg);
            color: #1e293b;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            background: var(--sidebar);
            color: white;
            padding: 24px 16px;
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 10px 28px;
            font-size: 17px;
            font-weight: 700;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #3b82f6;
            font-size: 22px;
        }

        .nav-label {
            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.4px;
            padding: 12px 12px 8px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #cbd5e1;
            padding: 12px 14px;
            margin-bottom: 5px;
            border-radius: 9px;
            transition: .2s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: var(--sidebar-hover);
        }

        .sidebar .nav-link.active {
            box-shadow: inset 3px 0 #60a5fa;
        }

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        .topbar {
            background: white;
            min-height: 76px;
            padding: 16px 32px;
            border-bottom: 1px solid #e8edf4;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .content {
            padding: 32px;
            max-width: 1500px;
            margin: auto;
        }

        .page-title {
            font-weight: 750;
            letter-spacing: -.5px;
            font-size: 27px;
        }

        .muted {
            color: #64748b;
        }

        .panel {
            background: white;
            border: 1px solid #e8edf4;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, .035);
        }

        .btn {
            border-radius: 9px;
            padding: 10px 16px;
            font-weight: 600;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .form-control {
            border-color: #dbe2ea;
            padding: 11px 13px;
            border-radius: 9px;
        }

        .form-control:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .12);
        }

        .table > :not(caption) > * > * {
            padding: 16px 20px;
            vertical-align: middle;
        }

        .table thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .7px;
            font-weight: 700;
            border-bottom: 1px solid #e8edf4;
        }

        .table tbody tr:last-child td {
            border-bottom: 0;
        }

        .avatar {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            color: #1d4ed8;
            background: #dbeafe;
            font-weight: 700;
        }

        .user-pill {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #dbeafe;
            color: #1d4ed8;
            font-weight: 700;
        }

        .footer {
            color: #94a3b8;
            font-size: 12px;
            padding: 24px 0 8px;
        }

        @media (max-width: 800px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 12px;
            }

            .brand {
                padding-bottom: 12px;
            }

            .sidebar nav {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }

            .nav-label {
                width: 100%;
            }

            .sidebar .nav-link {
                margin: 0;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 16px 20px;
            }

            .content {
                padding: 20px 14px;
            }

            .page-title {
                font-size: 23px;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon"><i class="bi bi-buildings"></i></div>
            <div>
                <div>SI KEPEGAWAIAN</div>
                <small class="fw-normal text-white-50">Administration</small>
            </div>
        </div>

        <nav>
            <div class="nav-label">MENU UTAMA</div>

            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               href="{{ route('dashboard') }}">
                <i class="bi bi-grid-1x2"></i> Dashboard
            </a>

            <a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}"
               href="{{ route('departments.index') }}">
                <i class="bi bi-diagram-3"></i> Departemen
            </a>

            
            <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}"
               href="{{ route('employees.index') }}">
               <i class="bi bi-people"></i> Data Pegawai
            </a>

        </nav>

        <div class="mt-4 pt-3 border-top border-secondary">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link border-0 bg-transparent w-100 text-start" type="submit">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <div class="main">
        <header class="topbar">
            <div>
                <div class="fw-semibold">Sistem Informasi Kepegawaian</div>
                <small class="muted">Panel administrasi</small>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="text-end d-none d-sm-block">
                    <div class="fw-semibold">{{ auth()->user()->name }}</div>
                    <small class="muted">Administrator</small>
                </div>
                <div class="user-pill">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        <main class="content">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')

            <div class="footer">
                &copy; {{ date('Y') }} Sistem Informasi Kepegawaian
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
