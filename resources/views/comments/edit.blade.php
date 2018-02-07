@extends('layouts.clear')

@section('content')
    <div class="col-sm-12 blog-main">
        <form role="form" method = "POST" action="{{route('update.comment', ['id' => $comment->id])}}">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group">
                <textarea class="form-control" type="text" value="" name="body" />{{$comment->body}}</textarea>
            </div>
            <button class="btn btn-success">Update comment</button>
        </form>
    </div>
@endsection
