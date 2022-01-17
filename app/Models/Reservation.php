<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $collection = 'reservations';
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'state',
        'user_id',
        'vehicle_id',
        'destination',
        'number_of_travels',
        'reservation_period',
        'arrival_date',
        'arrival_hour',
    ];
}
 