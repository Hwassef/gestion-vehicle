<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class ManageUsersController extends Controller
{

    public function index()
    {
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme','/themes/admin/views');
        $nb = 0;
        $Users = User::all();
        return View::make('manage_users', ["Users" => $Users], ["nb" => $nb]);
    }

    public function Destroy(Request $request)
    {

        $UserId =  $request->userId;
        $User = new User();
        $User::destroy($UserId);
        return Redirect::back()->with('status', 'Data Inserted ! :)');
    }
}
