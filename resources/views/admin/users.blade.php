@extends('layouts.admin')

@section('content')

    <div class="col-sm-8 blog-main">

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date of register</th>
                <th scope="col">Number of post</th>
                <th scope="col">Number of comments</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>

                    <th scope="row">{{$user->id}}</th>
                    <td><a href = "/user/profile/{{$user->id}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td class="number-of-posts">{{$user->posts->count()}}</td>
                    <td></td>
                    <td class="actions">
                        <form action = "{{route('delete-user', ['id' => $user->id])}}" method = "post" class = "actions-post">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn btn-danger btn-xs btn-round">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </form>

                        <form action = "{{route('edit-post', ['id' => $user->id])}}" method = "post" class = "actions-post">
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



