@extends('layouts.clear')

@section('content')

    <div class="col-sm-12 blog-main">
        <div class="row user-data">
            
            <form class="edit-user-data" action="{{route('update.profile')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="row">
                    <div class="col-4 profile-photo">
                            <span id="output">
                                @if(!empty($user->photo))
                                    <img src="{{asset('/images/profilePhoto/' . $user->photo)}}">
                                @else
                                    <img src="{{asset('/images/no-person.png')}}" alt="" class="">
                                @endif
                            </span>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                        <input id="thumbnail" name="photo" type="file" />
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input name="surname" type="text" class="form-control" value="{{$user->surname}}" ="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">City</label>
                            <input name="city" type="text" class="form-control" value="{{$user->city}}" ="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Country</label>
                            <input name="country" type="text" class="form-control" value="{{$user->country}}" ="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Age</label>
                            <input name="age" type="text" class="form-control" value="{{$user->age}}" ="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input name="email" type="email" class="form-control" value="{{$user->email}}" email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Telephone</label>
                            <input name="telephone" type="text" class="form-control" value="{{$user->telephone}}" ="Password">
                        </div>
                        <button type="submit" class="btn btn-success">Update profile</button>
                    </div>
                </div>    
            </form> 
        </div>
    </div>

@endsection