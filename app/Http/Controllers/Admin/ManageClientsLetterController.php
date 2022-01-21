<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AnsweredLetter;
use App\Models\Letter;
use App\Models\User;
use App\Notifications\AdminAnsweredLetter;
use App\Notifications\AdminApprovedReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Notification;
class ManageClientsLetterController extends Controller
{
    public function index()
    {
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme','/themes/admin/views');
        $letters = Letter::all();
        $clients = User::all();
        return view::make('clients_letter', compact('letters', 'clients'));
    }
    public function fullLetter($id)
    {
        $fullLetter = Letter::find($id);
        $clients = User::all();
        $admin = Admin::get()->first();
        // $this->answerLetter($id);
        View::addLocation('/themes/admin/views');
        View::addNamespace('theme','/themes/admin/views');
        return view::make('full_client_letter', compact('fullLetter', 'clients', 'admin'));
    }

    public function answerLetter(Request $request)
    {
        $letterId = $request->route('id');
        $answeredLetter = new AnsweredLetter();
        $answeredLetter -> letter_id = $letterId;
        $answeredLetter -> letter_body = $request -> letter_body;
        $letter = Letter::find($letterId);
        $letter -> answered = true;
        $letter -> update();
        $answeredLetter -> save();
        $user = User::find($letter -> client_id);
        Notification::send($user, new AdminAnsweredLetter());
    }
}
