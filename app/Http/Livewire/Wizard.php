<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Vehicle;
use App\Notifications\AdminApprovedReservation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class Wizard extends Component
{
    public $currentStep = 1;
    public $user_id, $state = false, $vehicle_id, $number_of_travels, $reservation_period, $arrival_date, $arrival_hour, $timePeriod, $period, $dt, $currentDate;
    public $successMessage = '';
    public $id;
    public $selectedDestinations = [];
    public $destinations = ["Ariana", "Béja", "Ben Arous", "Bizerte", "Gabès", "Gafsa", "Jendouba", "Kairouan", "Kasserine", "Kébili", "Kef", "Mahdia", "Manouba", "Médenine", "Monastir", "Nabeul", "Sfax", "Sidi Bouzid", "Siliana", "Sousse", "Tataouine", "Tozeur", "Tunis", "Zaghouan"];
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct()
    {
        $this->id = Route::current()->parameter('id');
    }
    public function render()
    {
        $details = Vehicle::find($this->id);
        $picturesInArray = array();
        $picturesInArray = explode("|", $details->vehicle_pictures);
        return view('livewire.wizard', ['details' => $details, 'picturesInArray' => $picturesInArray]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'reservation_period' => 'required',
            'selectedDestinations' => 'required',
            'number_of_travels' => 'required',
            'period' => 'required',
        ]);
        if (Auth::user()) {

            $this->currentStep = 3;
        } else {

            return redirect('/login');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        $currentDate = Carbon::now();
        $timePeriod = $this->period;
        if ($timePeriod == "Day") {
            $this->reservation_period = $this->reservation_period;
            $dt = Carbon::now()->addDays($this->reservation_period);
        } else if ($timePeriod == "Week") {
            $dt = Carbon::now()->addWeek($this->reservation_period);
        } else {
            $dt = Carbon::now()->addMonth($this->reservation_period);
        }
        $numberOfDays = Carbon::now()->diffInDays($dt);
        Reservation::create([
            'state' => false,
            'user_id' => Auth::user()->id,
            'vehicle_id' => $this->id,
            'destination' => $this->selectedDestinations,
            'number_of_travels' => $this->number_of_travels,
            'arrival_date' => $dt->toFormattedDateString(),
            'reservation_period' => $numberOfDays,
            'arrival_hour' => $dt->toTimeString(),
        ]);

        $this->successMessage = 'Reservation Completed. Waiting For Admin Approaval';
        $this->clearForm();

        $this->currentStep = 1;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->reservation_period = '';
        $this->selectedDestinations = '';
        $this->number_of_travels = '';
    }
}
