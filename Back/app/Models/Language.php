<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'proficiency_id',
        'employee_id',
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function proficiency(){
        return $this->belongsTo(Proficiency::class);
    }
}
