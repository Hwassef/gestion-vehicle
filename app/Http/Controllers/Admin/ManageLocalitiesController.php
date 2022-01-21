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

    public function addLocality(Request $request)
    {
        $Locality = new Locality();
        $Locality -> locality_name = $request -> input('locality_name');
        $Locality -> save();
        notify()->success('You Have Added A Locality !');
        return redirect()->back();
    }



    public function destroy(Request $request)
    {
        $LocalityId =  $request -> deleteModalLocalityId;
        $Locality = new Locality();
        $Locality::destroy($LocalityId);
        notify()->success('You Have Deleted A Locality !');
        return Redirect::back();

    }

    public function updateLocality(Request $request){
        $Locality = Locality::find($request->updateModalLocalityId);
        $Locality->locality_name = $request->input('locality_name');
        $Locality->update();
        notify()->success('You Have Updated A Locality !');
        return redirect()->back();
    }
}
