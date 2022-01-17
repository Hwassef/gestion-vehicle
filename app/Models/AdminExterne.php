<?php

namespace App\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class AdminExterne extends Authenticatable
{
    use  Notifiable;
    protected $collection = 'admins_externe';
     protected $fillable = [
        'full_name',
        'email',
        'password',
    ]; 
}
  