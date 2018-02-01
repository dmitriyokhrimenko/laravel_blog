@extends('layouts.secondary')

@section('content')
    <div class="col-sm-12 blog-main">
        <form method="POST" action="/post" enctype="multipart/form-data">
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
                <label for="body">Body</label>
                <textarea id="body" class="form-control" name="body"></textarea>
            </div>
            <div class="form-group">
                    <div>
                        <span id="output"></span>
                    </div>
                <label for="thumbnail">Article thumbnails</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input id="thumbnail" name="thumbnail" type="file" />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection