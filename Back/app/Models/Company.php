<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description',
        'phone_number',
        'foundation_date',
        'image',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'size',
        'industry',
    ];
}
