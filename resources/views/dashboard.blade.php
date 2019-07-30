@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="/posts/create" class="btn btn-success mb-3">Create Post</a>
                    <h3>Your Blog Post</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                     <th></th>
                                     <th></th>
                                    {{-- <th>Body</th>
                                    <th>Written on</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                    <form  action="{{ action('PostsController@destroy',$post->id) }}" method="POST" class="float-right">
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                    </td>
                                    {{-- <td>{{$post->body}}</td>
                                    <td>{{$post->created_at}}</td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                           <h5>You have no posts</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
