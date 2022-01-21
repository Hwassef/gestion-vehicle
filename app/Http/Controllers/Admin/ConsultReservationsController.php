<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Vehicle;
class ConsultReservationsController extends Controller
{
    public function index ()
    {
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme','/themes/admin/views');
        $counter=0;
        $reservations = Reservation::where('state', false)->get();
        $userWithReservation =  User::all();
        $vehicles = Vehicle::all();
        return View::make('consult_reservations', compact('reservations', 'counter', 'userWithReservation', 'userWithReservation', 'vehicles'));
    }
}
