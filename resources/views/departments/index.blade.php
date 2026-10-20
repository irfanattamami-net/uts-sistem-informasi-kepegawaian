@extends('layouts.app')

@section('title', 'Data Departemen')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="page-title">Data Departemen</div>
            <p class="muted mb-0">Kelola departemen dan pembagian pegawai perusahaan.</p>
        </div>

        <a href="{{ route('departments.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Tambah Departemen
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="panel p-4 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="muted small mb-2">Total Departemen</div>
                        <div class="display-6 fw-bold">{{ $departments->count() }}</div>
                        <small class="muted">Departemen terdaftar</small>
                    </div>
                    <div class="rounded-3 bg-primary-subtle text-primary p-3">
                        <i class="bi bi-diagram-3 fs-4"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-4">
            <div class="panel p-4 h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="muted small mb-2">Total Pegawai</div>
                        <div class="display-6 fw-bold">{{ $departments->sum('employees_count') }}</div>
                        <small class="muted">Pegawai di semua departemen</small>
                    </div>
                    <div class="rounded-3 bg-success-subtle text-success p-3">
                        <i class="bi bi-people fs-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel overflow-hidden">
        <div class="p-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <h5 class="fw-bold mb-1">Daftar Departemen</h5>
                <small class="muted">Informasi departemen yang terdaftar dalam sistem.</small>
            </div>

            <div class="input-group" style="max-width: 280px">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search muted"></i>
                </span>
                <input id="departmentSearch" type="search"
                       class="form-control border-start-0"
                       placeholder="Cari departemen...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0" id="departmentTable">
                <thead>
                    <tr>
                        <th class="ps-4">DEPARTEMEN</th>
                        <th>JUMLAH PEGAWAI</th>
                        <th class="text-end pe-4">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $department->name }}</div>
                                        <small class="muted">ID: {{ $department->id }}</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="badge rounded-pill bg-primary-subtle text-primary px-3 py-2">
                                    {{ $department->employees_count }} pegawai
                                </span>
                            </td>

                            <td class="text-end pe-4">
                                <a href="{{ route('departments.edit', $department) }}"
                                   class="btn btn-sm btn-outline-primary me-1"
                                   title="Edit departemen">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('departments.destroy', $department) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus departemen ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            title="Hapus departemen">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-5">
                                <i class="bi bi-inbox fs-1 d-block muted mb-3"></i>
                                <div class="fw-semibold">Belum ada departemen</div>
                                <small class="muted">Klik Tambah Departemen untuk memulai.</small>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-3 border-top">
            <small class="muted">Menampilkan {{ $departments->count() }} departemen.</small>
        </div>
    </div>

    <script>
        document.getElementById('departmentSearch').addEventListener('input', function () {
            const keyword = this.value.toLowerCase();

            document.querySelectorAll('#departmentTable tbody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(keyword) ? '' : 'none';
            });
        });
    </script>
@endsection
