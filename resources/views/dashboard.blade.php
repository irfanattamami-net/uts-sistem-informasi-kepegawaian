
@extends('layouts.app')

@section('title', 'Dashboard Kepegawaian')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title mb-1">Dashboard</h1>
            <p class="muted mb-0">
                Selamat datang kembali, {{ auth()->user()->name }}!
                Berikut ringkasan data kepegawaian.
            </p>
        </div>

        <div class="text-muted small">
            <i class="bi bi-calendar3 me-2"></i>
            {{ now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    {{-- Kartu statistik --}}
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="panel p-4 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="muted mb-2">Total Departemen</div>
                        <h2 class="fw-bold mb-2">
                            {{ \App\Models\Department::count() }}
                        </h2>
                        <small class="text-success">
                            <i class="bi bi-check-circle me-1"></i>
                            Data departemen terdaftar
                        </small>
                    </div>
                    <div class="rounded-3 p-3 bg-primary-subtle text-primary">
                        <i class="bi bi-diagram-3 fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="panel p-4 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="muted mb-2">Total Pegawai</div>
                        <h2 class="fw-bold mb-2">
                            {{ \App\Models\Employee::count() }}
                        </h2>
                        <small class="text-success">
                            <i class="bi bi-people me-1"></i>
                            Pegawai terdaftar
                        </small>
                    </div>
                    <div class="rounded-3 p-3 bg-success-subtle text-success">
                        <i class="bi bi-people fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="panel p-4 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="muted mb-2">Status Sistem</div>
                        <h2 class="fw-bold mb-2">Aktif</h2>
                        <small class="text-success">
                            <i class="bi bi-shield-check me-1"></i>
                            Kamu sudah login
                        </small>
                    </div>
                    <div class="rounded-3 p-3 bg-warning-subtle text-warning">
                        <i class="bi bi-activity fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Banner sambutan --}}
    <div class="panel p-4 p-md-5 mb-4"
         style="background: linear-gradient(120deg, #172554, #2563eb); color: white;">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge rounded-pill bg-white text-primary mb-3 px-3 py-2">
                    PANEL ADMINISTRATOR
                </span>

                <h2 class="fw-bold mb-3">Kelola Data Kepegawaian dengan Mudah</h2>

                <p class="mb-4" style="color: #dbeafe; max-width: 600px;">
                    Kelola informasi departemen dan pegawai secara terstruktur,
                    mudah dicari, dan tersimpan dalam satu sistem.
                </p>

                <a href="{{ route('departments.index') }}"
                   class="btn btn-light text-primary">
                    <i class="bi bi-arrow-right-circle me-2"></i>
                    Kelola Departemen
                </a>
            </div>

            <div class="col-lg-4 text-center d-none d-lg-block">
                <i class="bi bi-buildings"
                   style="font-size: 115px; color: #bfdbfe;"></i>
            </div>
        </div>
    </div>

    {{-- Menu cepat --}}
    <div class="mb-3">
        <h5 class="fw-bold mb-1">Menu Utama</h5>
        <p class="muted mb-0">Pilih menu untuk melanjutkan pekerjaan.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <a href="{{ route('departments.index') }}"
               class="text-decoration-none text-reset">
                <div class="panel p-4 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 p-3 bg-primary-subtle text-primary">
                            <i class="bi bi-diagram-3 fs-3"></i>
                        </div>

                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-1">Data Departemen</h6>
                            <p class="muted small mb-0">
                                Tambah, lihat, edit, dan hapus departemen.
                            </p>
                        </div>

                        <i class="bi bi-arrow-up-right fs-5 text-primary"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <div class="panel p-4 h-100">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 p-3 bg-success-subtle text-success">
                        <i class="bi bi-people fs-3"></i>
                    </div>

                    <div class="flex-grow-1">
                        <h6 class="fw-bold mb-1">Data Pegawai</h6>
                        <p class="muted small mb-0">
                            Fitur pengelolaan pegawai akan tersedia pada tahap berikutnya.
                        </p>
                    </div>

                    <span class="badge bg-secondary-subtle text-secondary">
                        Segera
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection
