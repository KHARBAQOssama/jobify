<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'image',
        'post',
        'company_id',
        'instagram',
        'linkedin',
        'facebook',
        'twitter',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
