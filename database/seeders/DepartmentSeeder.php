<?php
namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::insert([
            [
                'name' => 'Keuangan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sumber Daya Manusia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Administrasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
