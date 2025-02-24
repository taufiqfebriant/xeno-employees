<?php

namespace Database\Factories;

use App\Models\EmpSalary;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpSalaryFactory extends Factory
{
    protected $model = EmpSalary::class;

    public function definition()
    {
        $basicSalary = $this->faker->numberBetween(3000000, 5000000);
        $bonus = 0;
        $bpjs = 0.02 * $basicSalary;
        $jp = 0.01 * $basicSalary;
        $loan = $this->faker->numberBetween(0, 500000);

        return [
            'employee_id' => null,
            'month' => $this->faker->month,
            'year' => $this->faker->year,
            'basic_salary' => $basicSalary,
            'bonus' => $bonus,
            'bpjs' => $bpjs,
            'jp' => $jp,
            'loan' => $loan,
            'total_salary' => $basicSalary + $bonus - $bpjs - $jp - $loan,
        ];
    }
}
