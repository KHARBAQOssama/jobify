<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'course',
        'school',
        'graduated',
        'from',
        'to',
        'description',
        'media',
        'employee_id',    
        'education_attainment_id',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function education_attainment(){
        return $this->belongsTo(EducationAttainment::class);
    }

    
}
