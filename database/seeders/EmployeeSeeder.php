<?php
namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $keuangan = Department::where('name', 'Keuangan')->firstOrFail();
        $sdm = Department::where('name', 'Sumber Daya Manusia')->firstOrFail();
        $administrasi = Department::where('name', 'Administrasi')->firstOrFail();

        Employee::insert([
            [
                'department_id' => $keuangan->id,
                'name' => 'Ahmad',
                'position' => 'Staf Keuangan',
                'salary' => 4500000,
                'joined_at' => '2024-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => $keuangan->id,
                'name' => 'Siti',
                'position' => 'Akuntan',
                'salary' => 5000000,
                'joined_at' => '2023-06-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => $sdm->id,
                'name' => 'Budi',
                'position' => 'Staf HRD',
                'salary' => 4500000,
                'joined_at' => '2024-03-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => $sdm->id,
                'name' => 'Dewi',
                'position' => 'Rekruter',
                'salary' => 4800000,
                'joined_at' => '2022-09-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => $administrasi->id,
                'name' => 'Rizky',
                'position' => 'Staf Administrasi',
                'salary' => 4000000,
                'joined_at' => '2025-02-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
