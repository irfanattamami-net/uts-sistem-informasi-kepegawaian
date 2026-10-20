
@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('content')
    <div class="mb-4">
        <a href="{{ route('employees.index') }}" class="text-decoration-none muted">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Pegawai
        </a>
        <h1 class="page-title mt-3 mb-1">Edit Pegawai</h1>
        <p class="muted mb-0">Perbarui informasi pegawai.</p>
    </div>

    <div class="panel p-4 p-md-5" style="max-width: 850px">
        <div class="d-flex align-items-center gap-3 mb-4">
            <div class="rounded-3 bg-warning-subtle text-warning p-3">
                <i class="bi bi-person-gear fs-3"></i>
            </div>
            <div>
                <h5 class="fw-bold mb-1">{{ $employee->name }}</h5>
                <small class="muted">ID Pegawai: {{ $employee->id }}</small>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data kamu.</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold">
                        Nama Lengkap *
                    </label>
                    <input id="name" name="name" type="text"
                           value="{{ old('name', $employee->name) }}"
                           class="form-control @error('name') is-invalid @enderror"
                           maxlength="255" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="department_id" class="form-label fw-semibold">
                        Departemen *
                    </label>
                    <select id="department_id" name="department_id"
                            class="form-select form-control @error('department_id') is-invalid @enderror"
                            required>
                        <option value="">Pilih departemen</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                @selected(old('department_id', $employee->department_id) == $department->id)>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="position" class="form-label fw-semibold">
                        Jabatan *
                    </label>
                    <input id="position" name="position" type="text"
                           value="{{ old('position', $employee->position) }}"
                           class="form-control @error('position') is-invalid @enderror"
                           maxlength="255" required>
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="salary" class="form-label fw-semibold">
                        Gaji (Rp) *
                    </label>
                    <input id="salary" name="salary" type="number"
                           value="{{ old('salary', $employee->salary) }}"
                           class="form-control @error('salary') is-invalid @enderror"
                           min="0.01" step="0.01" required>
                    @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="joined_at" class="form-label fw-semibold">
                        Tanggal Masuk *
                    </label>
                    <input id="joined_at" name="joined_at" type="date"
                           value="{{ old('joined_at', $employee->joined_at->format('Y-m-d')) }}"
                           class="form-control @error('joined_at') is-invalid @enderror"
                           required>
                    @error('joined_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('employees.index') }}" class="btn btn-light border">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
