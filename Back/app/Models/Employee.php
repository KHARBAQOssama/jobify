<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birthday',
        'summary',
        'image',
        'portfolio',
        'linkedin',
        'resume',
        'contact_information_id'
    ];

    public function contact_information(){
        return $this->belongsTo(ContactInformation::class);
    }

    public function expected_salary(){
        return $this->hasOne(ExpectedSalary::class);
    }

    public function work_experiences(){
        return $this->hasMany(WorkExperience::class);
    }
}