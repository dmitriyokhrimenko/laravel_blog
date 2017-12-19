@extends('layouts.main')

@section('content')

    <div class="col-sm-8 blog-main">


        @if (Auth::check())

            @foreach($posts as $post)

                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="/post/{{$post->id}}">{{$post->title}}</a></h2>
                    <p class="blog-post-meta">{{$post->created_at->diffForHumans()}}<a href="#"></a></p>
                    <p>{{$post->body}}</p>
                </div><!-- /.blog-post -->

            @endforeach

        @else
            <h1>Opps... Please <a href="/register">register</a> or <a href="/login">login</a> and try again</h1>

        @endif


        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection



