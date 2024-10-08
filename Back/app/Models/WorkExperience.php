<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'company_name',
        'current',
        'from',
        'to',  
        'description',
        'employee_id',
        'company_id',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
