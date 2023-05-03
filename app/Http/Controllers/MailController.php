<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\AdminEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create()
    {
        return view('mails.create-mail',['users'=>User::all()]);
    }
    public function send(Request $request)
    {
        foreach ($request->members as $recipient) {
            Mail::to($recipient)->send(new AdminEmail($request->email));
        }
        return back();
    }
}
