@extends('layouts.clear')

@section('content')
    <div class="col-sm-12 blog-main">
        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="preview">Preview</label>
                <textarea class="form-control" id="preview" name="preview"></textarea>
            </div>
            <div class="form-group">
                <textarea id="body" class="form-control" name="body"></textarea>
            </div>
            <div class="form-group">
                <div class="col-sm-3 post-thumbnail">
                    <span id="output"></span>
                </div>
                <div class="clr"></div>
                <label for="thumbnail">Post thumbnails</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input id="thumbnail" name="thumbnail" type="file" />
            </div>

            <input type="submit" class="btn btn-primary" value="Save and publish" name="savepublish">
            <input type="submit" class="btn btn-primary" value="Save" name='save'>
        </form>
    </div>
@endsection