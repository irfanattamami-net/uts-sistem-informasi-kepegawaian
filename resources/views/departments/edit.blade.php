
@extends('layouts.app')

@section('title', 'Edit Departemen')

@section('content')
    <div class="mb-4">
        <a href="{{ route('departments.index') }}" class="text-decoration-none muted">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Departemen
        </a>
        <h1 class="page-title mt-3 mb-1">Edit Departemen</h1>
        <p class="muted mb-0">Perbarui informasi departemen yang dipilih.</p>
    </div>

    <div class="panel p-4 p-md-5" style="max-width: 760px">
        <div class="d-flex align-items-center gap-3 mb-4">
            <div class="rounded-3 bg-warning-subtle text-warning p-3">
                <i class="bi bi-pencil-square fs-3"></i>
            </div>
            <div>
                <h5 class="fw-bold mb-1">Informasi Departemen</h5>
                <small class="muted">ID Departemen: {{ $department->id }}</small>
            </div>
        </div>

        <form action="{{ route('departments.update', $department) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="form-label fw-semibold">
                    Nama Departemen <span class="text-danger">*</span>
                </label>
                <input id="name" type="text" name="name"
                       value="{{ old('name', $department->name) }}"
                       class="form-control @error('name') is-invalid @enderror"
                       maxlength="255" required autofocus>

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <div class="d-flex flex-wrap gap-2 justify-content-end">
                <a href="{{ route('departments.index') }}" class="btn btn-light border">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
