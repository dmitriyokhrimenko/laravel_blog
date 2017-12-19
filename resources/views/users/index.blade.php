@extends('layouts.main')

@section('content')

    <div class="col-sm-8 blog-main">

        @if (Auth::check())

            <div class="blog-post">
                {{$user}}
            </div><!-- /.blog-post -->


        @endif

    </div><!-- /.blog-main -->

@endsection



