<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $currentUserId = Auth::user()->id;
        $reservations  = Reservation::where('user_id', $currentUserId)->get();
        $reservationsToArray  = collect(Reservation::where('user_id', $currentUserId)->get()->toArray());

        $vehicle = Vehicle::all();
        $counter = 0;
        $currentReservations = ($reservations)->where('state', true);
        $currentReservationsLength = count($currentReservations);
        // dd($currentReservationsLength);
        return view(
            'my_reservations',
            compact('counter', 'currentReservationsLength', 'reservations', 'vehicle')
        );
    }
}
