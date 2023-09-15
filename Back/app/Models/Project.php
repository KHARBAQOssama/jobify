<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'current',
        'from',
        'to',
        'description',
        'url',
        'work_experience_id',
        'education_id',
        'employee_id',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function education(){
        return $this->belongsTo(Education::class);
    }
    public function work_experience(){
        return $this->belongsTo(WorkExperience::class);
    }
}
