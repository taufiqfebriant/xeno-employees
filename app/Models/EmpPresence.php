<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpPresence extends Model
{
    /** @use HasFactory<\Database\Factories\EmpPresenceFactory> */
    use HasFactory;

    protected $table = 'emp_presence';
    protected $keyType = 'int';

    protected $fillable = [
        'employee_id',
        'check_in',
        'check_out',
        'late_in',
        'early_out',
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
