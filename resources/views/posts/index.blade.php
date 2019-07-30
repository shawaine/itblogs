@extends ('layouts.app')

@section ('content')
    <h1>Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-4 col-sm-4">
                        <img style="height:25vh;" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                        <h4>{!!$post->body!!}</h4>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
            
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection