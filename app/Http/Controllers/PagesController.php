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
        // checks if user is not authorized
        // if (auth()->user()->id !== $post->user_id) {
        //     return redirect('/posts')
        //         ->with('error', 'Unauthorized Page')
        //         ->with('page', 'blog');;
        // } else {
        //     return view('posts.edit')
        //         ->with('post', $post)
        //         ->with('page', 'blog');
        // }
        return view('pages.contact')
            ->with('page', 'contact');
    }
}
