@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
 @if (Auth::guest())
    <h1 class="mb-5">Welcome to Blog IT!</h1>
    <h2>A blog site for IT accross the globe</h2>
    <h3>Please register or login to fully experience the site</h3>
    <p class="mt-5">
    <a class="btn btn-primary btn-lg" href="/login" role="button">Login </a>
    <a class="btn btn-success btn-lg" href="/register" role="button">Register </a>
    </p>
@else
    <h1 class="mb-5">This website is made with Laravel a PHP framework and MySQL for database.</h1>
    <h2>A blog site for IT accross the globe</h2>
    <h3>Feel free to explore the website, have fun.</h3>
@endif
   
</div>
@endsection