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

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function contact_information(){
        return $this->belongsTo(ContactInformation::class);
    }

    public function expected_salary(){
        return $this->hasOne(ExpectedSalary::class);
    }

    public function work_experiences(){
        return $this->hasMany(WorkExperience::class);
    }

    public function educations(){
        return $this->hasMany(Education::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function languages(){
        return $this->hasMany(Language::class);
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    public function saved_jobs(){
        return $this->hasMany(SavedJob::class);
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }
}