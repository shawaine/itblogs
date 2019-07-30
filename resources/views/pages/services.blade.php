@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{$info}}</h1>
    <h3>{{$desc}}</h3>
    @if (count($services)>0)
        <ul class="list-group">
            @foreach ($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
     @endif

@endsection