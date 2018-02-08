@extends('layouts.clear')

@section('content')

    <div class="col-sm-12 blog-main">
        @if (Auth::check())
            @if ($comments->count() > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">@lang('userComments.Id')</th>
                        <th scope="col">@lang('userComments.Comment')</th>
                        <th scope="col">@lang('userComments.Post')</th>
                        <th scope="col">@lang('userComments.Date of creation')</th>
                        <th scope="col">@lang('userComments.Actions')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($comments as $comment)
                        <tr>
                            <th scope="row">{{$comment->id}}</th>
                            <td><a href="{{route('single.post', ['id' => $comment->post_id])}}#comment-{{$comment->id}}">{{$comment->body}}</a></td>
                            <td><a href="{{route('single.post', ['id' => $comment->post_id])}}">{{$comment->post->title}}</a></td>
                            <td>{{$comment->created_at}}</td>
                            <td>
                                <form method="post" action="{{route('delete.comment', ['id' => $comment->id])}}" class="action-delete-comment">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="delete-comment btn btn-round">
                                        <span></span>
                                    </button>
                                </form>

                                <!--Edit comment-->
                                <a class="btn btn-round edit-comment" href="{{route('edit.comment',
                                ['id' => $comment->id])}}" role="button"><span></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h2 class="text-center">@lang('userComments.You have not yet posted any comments.')</h2>
            @endif
        @endif
    </div><!-- /.blog-main -->

@endsection
