@extends('layouts.clear')

@section('content')
    <div class="col-sm-12 blog-main">
        <form method="POST" action="{{route('update.post', ['id' => $post->id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="preview">Preview</label>
                <textarea class="form-control" id="preview" name="preview">{{$post->preview}}</textarea>
            </div>
            <div class="form-group">
                <textarea id="body" class="form-control" name="body">{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <div class="col-sm-3 post-thumbnail">
                    <span id="output">
                        <img class="thumb" src="{{asset('/images/thumbnails/' . $post->thumbnail)}}" />
                    </span>
                </div>
                <div class="clr"></div>
                <label for="thumbnail">Post thumbnails</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input id="thumbnail" name="thumbnail" type="file" />
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection