@extends('layouts.main')

@section('content')

    <div class="col-sm-9 blog-main">

        <div class="blog-post single">
            <h1 class="blog-post-title">{{$post->title}}</h1>
            
                <div class="row">
                    <div class="col-md-4">
                      Author: <a href="{{route('user', ['id' => $post->user_id])}}"><i>{{$post->user->name}} {{$post->user->surname}}</i></a>
                    </div>
                    <div class="col-md-4 ml-auto">
                      <p class="text-right"><i>{{$post->created_at->format('Y-m-d')}}</i></p>
                    </div>
                </div>
            <hr/>
            <p>{!!$post->body!!}</p>

        </div><!-- /.blog-post -->

        <div class="detailBox">
            <div class="titleBox">
                <label>Comments ({{$comments->count()}})</label>
            </div>
            
            <div class="actionBox">
                @if($comments->count() < 1)
                    <h4>No comments yet! Be first!</h4>
                @endif
                <ul class="commentList">
                    @foreach($comments as $comment)
                        <li>
                            <div class="commenterImage">
                                @if(isset($comment->user->photo) && file_exists(public_path('/images/profilePhoto/' . $comment->user->photo)))
                                    <img src="{{asset('images/profilePhoto/' . $comment->user->photo)}}" />
                                @else
                                    <img src="{{asset('images/app/no-person.png')}}" />
                                @endif
                            </div>
                            <div class="commentText">
                                <p id="comment-{{$comment->id}}">{{$comment->body}}</p> <span class="date sub-text">on {{$comment->created_at->diffForHumans()}}
                                     by <a href="{{route('user', ['id' => $comment->user->id])}}">{{$comment->user->name}} {{$comment->user->surname}}</a></span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if(Auth::check())
                    <form role="form" method = "POST" action="{{route('create.comment', ['post_id' => $post->id])}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea class="form-control" type="text" placeholder="Your comments" name="body" /></textarea>
                        </div>
                        <button class="btn btn-primary">Add comment</button>
                    </form>
                @endif
            </div>
        </div>

    </div><!-- /.blog-main -->

@endsection
