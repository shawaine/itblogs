@extends ('layouts.app')

@section ('content')
    <h1>Create Post</h1> 
    <form action="{{ action('PostsController@store') }}"  method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title here"/>
            </div>
            <div class="form-group">
            <label>Body</label>
            <textarea rows="5"  type="textarea" name="body" id="article-ckeditor" class="form-control" placeholder="Body here"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="cover-image">
        </div>
        <input type="submit" class="btn btn-primary">
    </form>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    {{-- <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script> --}}
@endsection