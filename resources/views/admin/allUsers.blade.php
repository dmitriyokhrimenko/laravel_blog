@extends('layouts.admin')

@section('content')
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">City</th>
            <th scope="col">Telephone</th>
            <th scope="col">Posts</th>
            <th scope="col">Comments</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

          @foreach($users as $user)
              <tr>
                  <th scope="row">{{$user->id}}</th>
                  <td>{{$user->surname . ' ' . $user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->country}}</td>
                  <td>{{$user->city}}</td>
                  <td>{{$user->telephone}}</td>
                  <td>{{$user->posts->count()}}</td>
                  <td>{{$user->comments->count()}}</td>
                  <td>
                      <form method="post" action="{{route('admin.delete.user', ['id' => $user->id])}}" class="admin-delete-user">
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
