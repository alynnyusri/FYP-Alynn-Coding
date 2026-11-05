<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'title',
        'recipient',
        'recipient_class',
        'category',
        'notification_date',
        'message',
        'status',
    ];
}
