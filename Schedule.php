<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Schedule extends Model
{
    protected $fillable = [
        'lecturer_id',
        'subject',
        'assessment_type',
        'class',
        'date',
        'start_time',
        'duration',
        'venue',
        'description',
        'status',
    ];

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }
}
