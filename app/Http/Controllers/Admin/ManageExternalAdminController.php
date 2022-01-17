<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminExterne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
class ManageExternalAdminController extends Controller
{
    public function index()
    {
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme', '/themes/admin/views');
        $nb = 0;
        $externalAdmins = AdminExterne::all();
        return View::make('manage_external_admins', ['externalAdmins' => $externalAdmins], ['nb' => $nb]);
    }

    public function addExternalAdmin(Request $request)
    {
        $externalAdmin = new AdminExterne();
        $externalAdmin -> full_name = $request -> input('full_name');
        $externalAdmin -> email = $request -> input('email');
        $pass = $request->input('password');
        $externalAdmin -> password = Hash::make($pass);
        $externalAdmin -> save();
        return redirect()->back()->with('message', 'The success message!');
    }
}
