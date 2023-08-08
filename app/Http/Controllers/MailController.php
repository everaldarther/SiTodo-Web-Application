<?php

namespace App\Http\Controllers;

use App\Mail\helpContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function index(Request $request){
        $emailData = [
            'name' => $request->input('fullName'),
            'from' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::to('superheroesyoo@gmail.com')->send(new helpContact($emailData));

        Alert::toast('Message Sent','info');
        
        return redirect()->back();
    }
}
