<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locality;
use App\Notifications\AdminApprovedReservation;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ManageLocalitiesController extends Controller
{
    public function index()
    {
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme','/themes/admin/views');
        $nb=0;
        $localities = Locality::all();
        return View::make('manage_localities', ["localities" => $localities], ["nb" => $nb]);
    }

    public function insertData(Request $request)
    {
        $Locality = new Locality();
        $Locality -> locality_name = $request -> input('locality_name');
        $Locality -> save();
        return redirect()->back()->with('status','Vehicle Added Successfully');
    }



    public function Destroy(Request $request)
    {

        $LocalityId =  $request -> localityId;
        $Locality = new Locality();
        $Locality::destroy($LocalityId);
        return Redirect::back()->with('status', 'Data Inserted ! :)');

    }

    public function update(Request $request){
        $Locality = Locality::find($request->id);
        $Locality->locality_name = $request->input('locality_name');
        $Locality->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }
}
