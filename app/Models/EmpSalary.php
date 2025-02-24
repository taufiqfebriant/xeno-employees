<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpSalary extends Model
{
    /** @use HasFactory<\Database\Factories\EmpSalaryFactory> */
    use HasFactory;

    protected $table = 'emp_salary';
    protected $keyType = 'int';

    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'basic_salary',
        'bonus',
        'bpjs',
        'jp',
        'loan',
        'total_salary',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
