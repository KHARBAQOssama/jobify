<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',    
        'description',
        'qualifications',
        'benefits',
        'minimum_salary',
        'maximum_salary',
        'frequency',
        'currency',
        'applying_capacity',
        'company_id',
        'location_id',
        'job_level_id',
        'category_id',
        'employment_type_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function job_level(){
        return $this->belongsTo(JobLevel::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function employment_type(){
        return $this->belongsTo(EmploymentType::class);
    }
    public function applications(){
        return $this->hasMany(Application::class);
    }
}
