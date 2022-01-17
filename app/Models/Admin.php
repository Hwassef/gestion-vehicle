<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use  Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];
}
