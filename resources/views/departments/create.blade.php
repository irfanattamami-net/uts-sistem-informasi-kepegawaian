
@extends('layouts.app')

@section('title', 'Tambah Departemen')

@section('content')
    <div class="mb-4">
        <a href="{{ route('departments.index') }}" class="text-decoration-none muted">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Departemen
        </a>
        <h1 class="page-title mt-3 mb-1">Tambah Departemen</h1>
        <p class="muted mb-0">Tambahkan departemen baru ke dalam sistem.</p>
    </div>

    <div class="panel p-4 p-md-5" style="max-width: 760px">
        <div class="d-flex align-items-center gap-3 mb-4">
            <div class="rounded-3 bg-primary-subtle text-primary p-3">
                <i class="bi bi-building-add fs-3"></i>
            </div>
            <div>
                <h5 class="fw-bold mb-1">Informasi Departemen</h5>
                <small class="muted">Isi informasi pada kolom berikut.</small>
            </div>
        </div>

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label fw-semibold">
                    Nama Departemen <span class="text-danger">*</span>
                </label>
                <input id="name" type="text" name="name"
                       value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror"
                       placeholder="Contoh: Keuangan"
                       maxlength="255" required autofocus>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="form-text">Gunakan nama yang jelas dan tidak duplikat.</div>
            </div>

            <hr class="my-4">

            <div class="d-flex flex-wrap gap-2 justify-content-end">
                <a href="{{ route('departments.index') }}" class="btn btn-light border">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-2"></i>Simpan Departemen
                </button>
            </div>
        </form>
    </div>
@endsection
