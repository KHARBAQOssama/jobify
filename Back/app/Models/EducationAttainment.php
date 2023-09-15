<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationAttainment extends Model
{
    use HasFactory;
    
    public function educations(){
        return $this->hasMany(Education::class);
    }
}
