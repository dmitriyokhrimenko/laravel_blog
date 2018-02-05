@extends('layouts.clear')

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
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td><a href="{{route('single.post', ['id' => $post->id])}}">{{$post->title}}</a></td>
                            <td>--</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                <form method="post" action="{{route('change.status', ['id' => $post->id])}}">
                                    {{ csrf_field() }}
                                    {{method_field('PUT')}}
                                    <button type="submit" class="{{$post->status}} btn btn-round">
                                        <span></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="{{route('delete.post', ['id' => $post->id])}}" class="action-delete-post">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="delete-post btn btn-round">
                                        <span></span>
                                    </button>
                                </form>
                                <!--Edit profile-->
                                <a class="btn btn-round edit-post" href="{{route('edit.post', 
                                ['id' => $post->id])}}" role="button"><span></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
            <h2 class="text-center">You have not created any posts yet.</h2>
            @endif
        @endif
    </div><!-- /.blog-main -->

@endsection
