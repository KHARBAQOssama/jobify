<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'country',
        'company_id',
    ];
    
    public function jobs(){
        return $this->hasMany(Job::class);
    }
    
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
