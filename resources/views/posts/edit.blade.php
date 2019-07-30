@extends ('layouts.app')

@section ('content')
    <a class="btn btn-dark mb-3" href="/posts/{{$post->id}}">Go Back</a>
    <h1>Edit Post</h1>
    <form action="{{ action('PostsController@update',$post->id) }}" method="POST" enctype="multipart/form-data">
         @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title here" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea rows="5"  type="textarea" name="body" id="article-ckeditor" class="form-control" placeholder="Body here" >{{$post->body}}</textarea>
        </div>
        <div class="form-group">
            <input type="file" name="cover-image">
        </div>
        <input type="submit" class="btn btn-primary"></input>
    </form>
@endsection