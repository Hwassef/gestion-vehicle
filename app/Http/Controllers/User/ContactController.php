<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function postLetter(Request $request)
    {
        $currentUserId = Auth::user()->id;
        $letter = new Letter();
        $letter -> letter_title = $request -> letter_title;
        $letter -> letter_body  = $request -> letter_body;
        $letter -> answered = false;
        $letter -> client_id = $currentUserId;
        $letter -> save();

    }
}
