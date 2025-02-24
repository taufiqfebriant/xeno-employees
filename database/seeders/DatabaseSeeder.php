<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmpSalary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'address' => '123 Main St',
            'phone' => '123-456-7890',
            'user_picture' => null,
            'password' => Hash::make('password'),
        ]);

        Employee::factory(10)->create()->each(function ($employee) {
            EmpSalary::factory()->create([
                'employee_id' => $employee->id,
            ]);
        });
    }
}
