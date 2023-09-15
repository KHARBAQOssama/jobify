<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function companies(){
        return $this->hasMany(Company::class);
    }
}
