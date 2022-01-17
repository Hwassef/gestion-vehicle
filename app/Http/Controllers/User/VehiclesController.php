<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class VehiclesController extends Controller
{
    public function index()
    {
        $Vehicles = Vehicle::simplePaginate(3);
        return View('vehicles_list', ['Vehicles' => $Vehicles]);
    }
    public function displayReserveVehicle($id)
    {
        $request = new Request;
        $details = Vehicle::find($id);
        $this->reserveVehicle($request, $id);
        // $this->passVehicleIdToWizard($details);
        return View('reserve_vehicle', ['details' => $details]);
    }
    // public function passVehicleIdToWizard($details)
    // {
    //     return View('livewire.wizard', ['details' => $details]);
    // }

    public function reserveVehicle(Request $request, $id)
    {
        $timePeriod = $request->input('period');
        $reservationPeriod = $request->input('reservation_period');
        $reservation = new Reservation();
        $reservation->vehicle_id = $id;
        $reservation->user_id = Auth::id();
        $reservation->state = false;
        $reservation->destination = $request->input('destination');
        $reservation->number_of_travels = $request->input('number_of_travels');
        if ($timePeriod == "day") {
            $reservation->reservation_period = $reservationPeriod;
        } else if ($timePeriod == "week") {
            $weeks_to_days = $reservationPeriod * 7;
            $reservation->reservation_period = $weeks_to_days;
        } else {
            $months_to_days = $reservationPeriod * 30;
            $reservation->reservation_period = $months_to_days;
        }
        $dt = Carbon::now()->addDays($reservation->reservation_period);
        $reservation->arrival_date = $dt->toFormattedDateString();
        $reservation->arrival_hour = $dt->toTimeString();
        // dd($request->get('period'));
        // $reservation->save();
        notify()->success('Laravel Notify is awesome!');
    }
}
