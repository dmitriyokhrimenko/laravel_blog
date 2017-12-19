@extends('layouts.admin')

@section('content')

    <div class="col-sm-8 blog-main">

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Preview</th>
                <th scope="col">User</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>

                    <th scope="row">{{$post->id}}</th>
                    <td><a href = "/post/{{$post->id}}">{{$post->title}}</a></td>
                    <td>{{$post->preview}}</td>
                    <td><a href = "/user/profile/{{$post->user->id}}">{{$post->user->name}}</a></td>
                    <td class="actions">
                        <form action = "{{route('delete-post', ['id' => $post->id])}}" method = "post" class = "actions-post">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger btn-xs btn-round">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </form>

                        <form action = "{{route('edit-post', ['id' => $post->id])}}" method = "post" class = "actions-post">
                            {{ csrf_field() }}
                            {{method_field('POST')}}

                            <button type="button" class="btn btn-primary btn-xs btn-round">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection



