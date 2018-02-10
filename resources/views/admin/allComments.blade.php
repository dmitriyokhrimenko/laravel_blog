@extends('layouts.admin')

@section('content')
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Comment</th>
            <th scope="col">Post</th>
            <th scope="col">User</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
          
          @foreach($comments as $comment)
              <tr>
                  <th scope="row">{{$comment->id}}</th>
                  <td>{{$comment->body}}</td>
                  <td>{{$comment->post->title}}</td>
                  <td>{{$comment->user->name . '' . $comment->user->surname}}</td>
                  <td>
                      <form method="post" action="{{route('admin.delete.comment', ['id' => $comment->id])}}" class="admin-delete-post">
                          {{ csrf_field() }}
                          {{method_field('DELETE')}}
                          <button type="submit" class="admin-delete btn btn-round">
                              <span></span>
                          </button>
                      </form>
                  </td>
              </tr>
          @endforeach
        </tbody>
    </table>
    {{$comments->links()}}
@endsection
