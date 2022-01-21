<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminApprovedReservation;

class ManageVehicleController extends Controller
{
    public function index()
    {
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme', '/themes/admin/views');
        $nb = 0;
        $Vehicles = Vehicle::simplePaginate(3);
        return View::make('manage_vehicles', ["Vehicles" => $Vehicles], ["nb" => $nb]);
    }

    public function insertData(Request $request)
    {
        $picture = array();
        if ($files = $request->file('vehicle_pictures')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extention = $file->getClientOriginalExtension();
                $FileNameToStore = $filename . '_' . time() . '.' . $extention;
                $file->storeAs('public/vehicles', $FileNameToStore);
                $picture[] = $FileNameToStore;
            }

            $Vehicle = new Vehicle();
            $Vehicle->vehicle_registration_number = $request->input('vehicle_registration_number');
            $Vehicle->vehicle_brand = $request->input('vehicle_brand');
            $Vehicle->vehicle_power = $request->input('vehicle_power');
            $Vehicle->vehicle_number_of_places = $request->input('places_number');
            $Vehicle->vehicle_pictures = implode("|", $picture);
            $Vehicle->save();

            notify()->success('You Have Added A Vehicle !');
            return Redirect::back();
            $user = User::where('id', Auth()->user()->id)
                ->firstOrFail();
            Notification::send($user, new AdminApprovedReservation());
        }
    }


    public function destroy(Request $request)
    {
        $VehicleTypeId =  $request->deleteVehicleId;
        $Vehicle = new Vehicle();
        $Vehicle::destroy($VehicleTypeId);
        notify()->success('You Have Deleted A Vehicle !');
        return Redirect::back();
    }

    public function updateVehicle(Request $request)
    {
        $picture = array();
        if ($files = $request->file('vehicle_pictures')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $extention = $file->getClientOriginalExtension();
                $FileNameToStore = $filename . '_' . time() . '.' . $extention;
                $file->storeAs('public/vehicles', $FileNameToStore);
                $picture[] = $FileNameToStore;
            }
            $vehicleId = $request->updateVehicleId;
            $vehicle = Vehicle::find($vehicleId);
            $vehicle->vehicle_registration_number = $request->vehicle_registration_number;
            $vehicle->vehicle_brand = $request->vehicle_brand;
            $vehicle->vehicle_power = $request->vehicle_power;
            $vehicle->vehicle_number_of_places = $request->places_number;
            $vehicle->vehicle_pictures = implode("|", $picture);
            $vehicle->save();
            notify()->success('You Have Updated A Vehicle !');
            return Redirect::back();
        }
        else
        {
            $vehicleId = $request->updateVehicleId;
            $vehicle = Vehicle::find($vehicleId);
            $vehicle->vehicle_registration_number = $request->vehicle_registration_number;
            $vehicle->vehicle_brand = $request->vehicle_brand;
            $vehicle->vehicle_power = $request->vehicle_power;
            $vehicle->vehicle_number_of_places = $request->places_number;
            $vehicle->save();
            notify()->success('You Have Updated A Vehicle !');
            return Redirect::back();
        }
    }
}
