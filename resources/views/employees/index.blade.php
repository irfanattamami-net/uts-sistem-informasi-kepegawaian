
@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="page-title mb-1">Data Pegawai</h1>
            <p class="muted mb-0">Kelola informasi pegawai dan departemennya.</p>
        </div>

        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus me-2"></i>Tambah Pegawai
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-4">
            <div class="panel p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="muted mb-2">Total Pegawai</div>
                        <h2 class="fw-bold mb-0">{{ $employees->count() }}</h2>
                    </div>
                    <div class="rounded-3 p-3 bg-primary-subtle text-primary">
                        <i class="bi bi-people fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel overflow-hidden">
        <div class="p-4 d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <h5 class="fw-bold mb-1">Daftar Pegawai</h5>
                <small class="muted">Informasi pegawai yang tersimpan dalam sistem.</small>
            </div>

            <div class="input-group" style="max-width: 280px">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search muted"></i>
                </span>
                <input id="employeeSearch" type="search"
                       class="form-control border-start-0"
                       placeholder="Cari pegawai...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0" id="employeeTable">
                <thead>
                    <tr>
                        <th class="ps-4">PEGAWAI</th>
                        <th>DEPARTEMEN</th>
                        <th>JABATAN</th>
                        <th>GAJI</th>
                        <th>TANGGAL MASUK</th>
                        <th class="text-end pe-4">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">
                                        {{ strtoupper(substr($employee->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold">{{ $employee->name }}</div>
                                        <small class="muted">ID: {{ $employee->id }}</small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                                    {{ $employee->department->name ?? 'Tidak ada departemen' }}
                                </span>
                            </td>

                            <td>{{ $employee->position }}</td>

                            <td class="fw-semibold">
                                Rp {{ number_format((float) $employee->salary, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ $employee->joined_at->format('d-m-Y') }}
                            </td>

                            <td class="text-end pe-4">
                                <a href="{{ route('employees.edit', $employee) }}"
                                   class="btn btn-sm btn-outline-primary me-1"
                                   title="Edit pegawai">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('employees.destroy', $employee) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data pegawai ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                            title="Hapus pegawai">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-people fs-1 d-block muted mb-3"></i>
                                <div class="fw-semibold">Belum ada data pegawai</div>
                                <small class="muted">Klik Tambah Pegawai untuk menambahkan data.</small>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-3 border-top">
            <small class="muted">Menampilkan {{ $employees->count() }} pegawai.</small>
        </div>
    </div>

    <script>
        document.getElementById('employeeSearch').addEventListener('input', function () {
            const keyword = this.value.toLowerCase();

            document.querySelectorAll('#employeeTable tbody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(keyword) ? '' : 'none';
            });
        });
    </script>
@endsection
