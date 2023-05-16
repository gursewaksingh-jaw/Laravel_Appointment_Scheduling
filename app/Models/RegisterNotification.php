<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RegisterNotification extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'notifications';
    protected $fillable = [
        'user_id_from',
        'user_id_to',
        'title',
        'message',
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
        'read_at',

    ];
}
