@extends('layouts.main')

@section('content')

    <div class="col-sm-8 blog-main">

        <div class="blog-post single">
            <h1 class="blog-post-title">{{$post->title}}</h1>
            <p class="blog-post-meta text-left">Author: <a href="/user/profile/{{$post->user_id}}">{{$post->user->name}}</a></p>
            <p class="blog-post-meta text-right">{{$post->created_at->diffForHumans()}}</p>
            <p>{{$post->body}}</p>

        </div><!-- /.blog-post -->

        <div class="detailBox">
            <div class="titleBox">
                <label>Comments ({{$comments->count()}})</label>
            </div>
            <div class="commentBox">

                <p class="taskDescription">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </div>
            <div class="actionBox">
                <ul class="commentList">
                    @foreach($comments as $comment)
                        <li>
                            <div class="commenterImage">
                                <img src="{{asset('images/no-person.png')}}" />
                            </div>
                            <div class="commentText">
                                <p class="">{{$comment->body}}</p> <span class="date sub-text">on {{$comment->created_at->diffForHumans()}}
                                     by <a href="/user/profile/{{$comment->user->id}}">{{$comment->user->name}}</a></span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <form class="form-inline" role="form" method = "POST" action="/post/{{$post->id}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input class="form-control" type="hidden" name = "user_id"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name = "post_id"/>
                    </div>
                    @if(Auth::check())
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Your comments" name="body" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default">Add comment</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>

    </div><!-- /.blog-main -->

@endsection
