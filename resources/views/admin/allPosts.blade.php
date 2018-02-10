@extends('layouts.admin')

@section('content')
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">User</th>
            <th scope="col">Comments</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

          @foreach($posts as $post)
              <tr>
                  <th scope="row">{{$post->id}}</th>
                  <td>{{$post->title}}</td>
                  <td>{{$post->status}}</td>
                  <td>{{$post->user->name . ' ' . $post->user->surname}}</td>
                  <td>{{$post->comments->count()}}</td>
                  <td>--</td>
                  <td>
                      <form method="post" action="{{route('admin.delete.post', ['id' => $post->id])}}" class="admin-delete-post">
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
@endsection
