@extends('layouts.main')

@section('content')
    <div class="col-sm-8 blog-main">
        <form method="POST" action="/post">
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
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>
            <input type="hidden" class="form-control" id="user_id" name="user_id">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection