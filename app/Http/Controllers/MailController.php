<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewUserWelcome;
use Auth;

class MailController extends Controller
{
    public function build()
    {
        return $this->subject('Blog IT')->view('view.name');
    }

    public function greetNewUser()
    {
        Mail::to(Auth::user()->email)
            ->send(new NewUserWelcome);
        return redirect('/dashboard');
    }
}
