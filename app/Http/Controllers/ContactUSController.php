<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUS;
use Mail;

class ContactUSController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]
        );

        // save to table
        ContactUS::create($request->all());

        // send to gmail
        Mail::send(
            'email_format',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ),
            function ($message) {
                $message->from('blogit_feedback@noreply.com');
                $message->to(env('MAIL_USERNAME'), 'Blog IT')->subject('Blog IT Feedback');
            }
        );
        return back()
            ->with('success', 'Thanks for contacting us!')
            ->with('page', 'contact');
    }
}
