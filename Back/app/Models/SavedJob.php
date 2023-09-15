<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavedJob extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'job_id'
    ];

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
