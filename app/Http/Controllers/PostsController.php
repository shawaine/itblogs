<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts =  Post::all();
        //$posts =  Post::where('created_at', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts =  Post::orderBy('created_at', 'desc')->get();
        //$posts =  Post::orderBy('created_at', 'desc')->take(1)->get();
        $posts =  Post::orderBy('created_at', 'desc')->paginate(10);

        return view('posts.index')
            ->with('posts', $posts)
            ->with('page', 'blog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')
            ->with('page', 'blog');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover-image' => 'image|nullable|max:1999'
        ]);


        // handle file upload
        // for preventing same filename to be uploaded
        if ($request->hasFile('cover-image')) {
            // // getting filename with extension
            // $fileNameWithExt = $request->file('cover-image')->getClientOriginalImage();
            // get just file name
            $filename = $request->file('cover-image')->getClientOriginalName();
            //get just file ext
            $fileextension = $request->file('cover-image')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $fileextension;
            // upload image
            $path = $request->file('cover-image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create post
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->cover_image =  $fileNameToStore;
        $post->save();

        return redirect('/posts')
            ->with('success', 'Post Created')
            ->with('page', 'blog');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')
            ->with('post', $post)
            ->with('page', 'blog');;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // checks if user is not authorized
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')
                ->with('error', 'Unauthorized Page')
                ->with('page', 'blog');;
        } else {
            return view('posts.edit')
                ->with('post', $post)
                ->with('page', 'blog');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover-image' => 'image|nullable|max:1999'
        ]);


        // handle file upload
        // for preventing same filename to be uploaded
        if ($request->hasFile('cover-image')) {
            // // getting filename with extension
            // $fileNameWithExt = $request->file('cover-image')->getClientOriginalImage();
            // get just file name
            $filename = $request->file('cover-image')->getClientOriginalName();
            //get just file ext
            $fileextension = $request->file('cover-image')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $fileextension;
            // upload image
            $path = $request->file('cover-image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $post =  Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->hasFile('cover-image')) {
            $post->cover_image =  $fileNameToStore;
        }
        $post->save();

        return view('posts.show')
            ->with('success', 'Post Updated')
            ->with('post', $post)
            ->with('page', 'blog');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::find($id);

        // checks if user is not authorized
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')
                ->with('error', 'Unauthorized Page')
                ->with('page', 'blog');;
        }
        // delete saved images by user
        if ($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/' . $post->cover_image);
        }
        $post->delete();
        return redirect('/posts')
            ->with('success', 'Post Removed')
            ->with('page', 'blog');;
    }
}
