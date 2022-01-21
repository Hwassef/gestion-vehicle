<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\VehicleType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ManageVehicleTypeController extends Controller
{
    public function index()
    {
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme', '/themes/admin/views');
        $nb = 0;
        $VehicleTypes = VehicleType::all();
        return View('manage_vehicle_type', ["VehicleTypes" => $VehicleTypes], ["nb" => $nb]);
    }

    public function addData(Request $request)
    {
        $VehicleType = new VehicleType();
        $VehicleType->type_name = $request->input('vehicle_type');
        $VehicleType->tarif = $request->input('tarif');
        $VehicleType->save();
        notify()->success('New Vehicle Type Has Been Added !');
        return Redirect::back();
    }

    public function destroy(Request $request)
    {
        $VehicleType = new VehicleType();
        $VehicleType::destroy($request->toDeleteVehicleTypeId);
        notify()->success('You Have Deleted A Vehicle Type !');
        return Redirect::back();
    }

    public function updateVehicleType(Request $request)
    {
        $VehicleType = VehicleType::find($request->VehicleTypeId);
        $VehicleType->type_name = $request->vehicle_type_name;
        $VehicleType->tarif = $request->tarif;
        $VehicleType->update();
        notify()->success('A Vehicle Type Has Been Updated !');
        return redirect()->back();
    }
}
