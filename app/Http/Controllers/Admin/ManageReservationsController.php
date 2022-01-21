<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminApprovedReservation;
class ManageReservationsController extends Controller
{
    public function index()
    {
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme','/themes/admin/views');
        $counter=0;
        $reservations = Reservation::where('state', false)->get();
        $userWithReservation =  User::all();
        $vehicles = Vehicle::all();
        return View::make('manage_reservations', compact('reservations', 'counter', 'userWithReservation', 'userWithReservation', 'vehicles'));
    }

    public function approveReservation(Request $request)
    {
        $reservationId = $request -> confirmReservationId;
        $reservation = Reservation::find($reservationId);
        $reservation -> state = true;
        $reservation -> update();
        $reservationUserId = $request -> reservationUserId;
        $user = User::where('id', $reservationUserId)->get();
        Notification::send($user, new AdminApprovedReservation());
    }

    public function diapproveReservation(Request $request)
    {
        $reservationId = $request -> disapproveReservationId;
        $reservation = Reservation::find($reservationId);
        $reservation -> delete();

    }
}
