<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
class Vehicle extends Model
{
    use HasFactory;
    protected $collection = 'vehicles';
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vehicle_registration_number',
        'vehicle_brand',
        'vehicle_power',
        'vehicle_number_of_places',
        'vehicle_pictures',
    ];
}
