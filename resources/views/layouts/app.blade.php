<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('icon/favicon.png') }}"  sizes="16x16">
    <title>{{ config('app.name', 'IT Blogs') }}</title>
    
</head>
<body>
    {{-- <div id="app"> --}} 
    @include ('components.navbar')
    <div class="container">
        <main class="py-4">
            @include ('components.messages')
            @yield('content')
        </main>
    </div>
    {{-- </div> --}}

    <!-- Scripts -->
    <script href="{{ asset('css/app.css') }}" ></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
