@extends('layouts.profile')

@section('content')

    <div class="col-sm-12 blog-main">

        @if (Auth::check())
            @if ($posts->count() > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>--</td>
                            <td>{{$post->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div><!-- /.blog-main -->

@endsection



