@extends('layouts.main')

@section('content')

    <div class="col-sm-8 blog-main">

        @if (Auth::check())

            <div class="blog-post">
                {{$user->name}}
            </div><!-- /.blog-post -->

            @if ($post)

                <p>Ваши <a href="/posts/user/{{$user->id}}">записи</a></p>
            @endif
        @endif

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>
    </div><!-- /.blog-main -->

@endsection



