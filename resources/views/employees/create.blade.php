
@extends('layouts.app')

@section('title', 'Tambah Pegawai')

@section('content')
    <div class="mb-4">
        <a href="{{ route('employees.index') }}" class="text-decoration-none muted">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Pegawai
        </a>

        <h1 class="page-title mt-3 mb-1">Tambah Pegawai</h1>
        <p class="muted mb-0">Masukkan informasi pegawai baru.</p>
    </div>

    <div class="panel p-4 p-md-5" style="max-width: 850px">
        <h5 class="fw-bold mb-4">Informasi Pegawai</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="row g-4">
                <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold">Nama Lengkap *</label>
                    <input id="name" name="name" type="text"
                           value="{{ old('name') }}"
                           class="form-control" maxlength="255" required>
                </div>

                <div class="col-md-6">
                    <label for="department_id" class="form-label fw-semibold">Departemen *</label>
                    <select id="department_id" name="department_id"
                            class="form-control" required>
                        <option value="">Pilih departemen</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                @selected(old('department_id') == $department->id)>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="position" class="form-label fw-semibold">Jabatan *</label>
                    <input id="position" name="position" type="text"
                           value="{{ old('position') }}"
                           class="form-control" maxlength="255" required>
                </div>

                <div class="col-md-6">
                    <label for="salary" class="form-label fw-semibold">Gaji (Rp) *</label>
                    <input id="salary" name="salary" type="number"
                           value="{{ old('salary') }}"
                           class="form-control" min="0.01" step="0.01" required>
                </div>

                <div class="col-md-6">
                    <label for="joined_at" class="form-label fw-semibold">Tanggal Masuk *</label>
                    <input id="joined_at" name="joined_at" type="date"
                           value="{{ old('joined_at') }}"
                           class="form-control" required>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('employees.index') }}" class="btn btn-light border">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg me-2"></i>Simpan Pegawai
                </button>
            </div>
        </form>
    </div>
@endsection
