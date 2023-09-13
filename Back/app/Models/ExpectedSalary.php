<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpectedSalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'minimum',
        'maximum',
        'currency',
        'frequency',
        'employee_id',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
