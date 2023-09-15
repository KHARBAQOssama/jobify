<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'company_size_id',
        'industry_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function team_members(){
        return $this->hasMany(TeamMember::class);
    }

    public function locations(){
        return $this->hasMany(Location::class);
    }

    public function benefits(){
        return $this->hasMany(Benefit::class);
    }

    public function industry(){
        return $this->belongsTo(Industry::class);
    }

    public function jobs(){
        return $this->hasMany(Job::class);
    }

    public function company_size(){
        return $this->belongsTo(CompanySize::class);
    }
}
