<?php

namespace Database\Factories;

use App\Models\EmpPresence;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpPresenceFactory extends Factory
{
    protected $model = EmpPresence::class;

    public function definition()
    {
        $checkIn = $this->faker->dateTimeBetween('08:00:00', '09:00:00');
        $checkOut = $this->faker->dateTimeBetween('16:00:00', '18:00:00');

        $workStart = new \DateTime($checkIn->format('Y-m-d') . ' 08:00:00');
        $workEnd = new \DateTime($checkOut->format('Y-m-d') . ' 17:00:00');

        $lateIn = $checkIn->getTimestamp() - $workStart->getTimestamp();
        $earlyOut = $checkOut->getTimestamp() - $workEnd->getTimestamp();

        return [
            'employee_id' => null,
            'check_in' => $checkIn->format('Y-m-d H:i:s'),
            'check_out' => $checkOut->format('Y-m-d H:i:s'),
            'late_in' => $lateIn,
            'early_out' => $earlyOut,
        ];
    }
}