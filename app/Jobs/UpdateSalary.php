<?php

namespace App\Jobs;

use App\Models\EmpSalary;
use App\Models\EmpPresence;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateSalary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $employeeId;
    protected $lateIn;
    protected $earlyOut;
    protected $isDelete;

    /**
     * Create a new job instance.
     */
    public function __construct($employeeId, $lateIn, $earlyOut, $isDelete = false)
    {
        $this->employeeId = $employeeId;
        $this->lateIn = $lateIn;
        $this->earlyOut = $earlyOut;
        $this->isDelete = $isDelete;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $salary = EmpSalary::where('employee_id', $this->employeeId)
            ->where('month', now()->month)
            ->where('year', now()->year)
            ->first();

        if ($salary) {
            $basicSalary = $salary->basic_salary;

            $lateMinutes = abs($this->lateIn) / 60;
            $earlyMinutes = abs($this->earlyOut) / 60;

            $bonus = -($lateMinutes + $earlyMinutes) * 5000;

            if ($this->isDelete) {
                $salary->bonus -= $bonus;
            } else {
                $salary->bonus += $bonus;
            }

            $bpjs = 0.02 * $basicSalary;
            $jp = 0.01 * $basicSalary;
            $loan = $salary->loan;

            $salary->total_salary = ($basicSalary + $salary->bonus) - ($bpjs + $jp + $loan);
            $salary->save();
        }
    }
}
