<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index')
            ->with('page', 'index');
    }

    public function about()
    {
        $data = array(
            'info' => 'Welcome to about page!'
        );
        // checks if user has verified email
        return view('pages.about')
            ->with($data)
            ->with('page', 'about');
    }

    public function services()
    {
        $data = array(
            'info' => 'Welcome to our services page!',
            'desc' => 'These are the services we provide.',
            'services' => ['Web Programming', 'Web Design', 'Desktop Application']
        );
        return view('pages.services')
            ->with($data)
            ->with('page', 'services');
    }

    public function contact_us()
    {
        // checks if user has email or loggedin
        if (empty(auth()->user()->email)) {
            return view('pages.contact')
                ->with('email', old('email'))
                ->with('page', 'contact');
        } else {
            return view('pages.contact')
                ->with('email', auth()->user()->email)
                ->with('page', 'contact');
        }
    }

    public function settings()
    {
        // checks if user has verified email
        if (auth()->user()->email_verified_at) {
            return view('pages.settings')
                ->with('page', 'settings');
        } else {
            return redirect('/email/verify');
        }
    }
}
