@extends('layouts.main')

@section('content')

    <div class="col-sm-9 blog-main">
        <div class="row">
            @foreach($posts as $post)

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="blog-post-title"><a href="/post/{{$post->id}}">{{$post->title}}</a></h2>
                            <p class="blog-post-meta">{{$post->created_at->format('Y-m-d')}}</p>
                            <p class="card-text">{{$post->preview}}</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>

                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="/post/{{$post->id}}">{{$post->title}}</a></h2>
                    <p class="blog-post-meta">{{$post->created_at->diffForHumans()}}<a href="#"></a></p>
                    <p>{{$post->preview}}</p>
                </div><!-- /.blog-post -->

            @endforeach
        </div>
        {{$posts->links()}}
        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="/">Older</a>
            <a class="btn btn-outline-primary" href="/?sort=desc">Newer</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection



