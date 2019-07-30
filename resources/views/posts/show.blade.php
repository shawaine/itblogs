@extends ('layouts.app')

@section ('content')
    <a class="btn btn-dark mb-3" href="/posts">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="height:40vh;" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}  by {{$post->user->name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a class="btn btn-primary mr-auto" href="/posts/{{$post->id}}/edit">Edit</a>
            <form  action="{{ action('PostsController@destroy',$post->id) }}" method="POST" class="float-right">
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        @endif
    @endif
@endsection