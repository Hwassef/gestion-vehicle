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
        View::addNamespace('theme','/themes/admin/views');
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
        return Redirect::back()->with('status', 'Data Inserted ! :)');
    }

    public function getData(Request $request)
    {
        
        $VehicleTypeId =  $request -> vehicleId;
        $VehicleType = new VehicleType();
        $VehicleType::destroy($VehicleTypeId);
        return Redirect::back()->with('status', 'Data Inserted ! :)');

    }

    public function update(Request $request){
        $VehicleType = VehicleType::find($request->id);
        $VehicleType->type_name = $request->input('type_name');
        $VehicleType->tarif = $request->input('tarif');
        $VehicleType->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }
}
