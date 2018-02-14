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
                                @if(!empty($user->photo) && file_exists(public_path('/images/profilePhoto/' . $user->photo)))
                                    <img src="{{asset('/images/profilePhoto/' . $user->photo)}}">
                                @else
                                    <img src="{{asset('/images/app/no-person.png')}}" alt="" class="">
                                @endif
                            </span>
                        <p class="delete-avatar-profile">
                            <button type="button" name="delete-avatar" class="btn btn-danger delete-photo" id="delete-photo">@lang('editProfile.Delete photo')</button>
                        </p>
                        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                        <div class="file-upload">
                            <label>
                                <input id="thumbnail" name="photo" type="file" class="uploade-file" />
                                <span>@lang('editProfile.Change photo')</span>
                            </label>
                        </div>

                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="name">@lang('editProfile.Name')</label>
                            <input name="name" type="text" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="surname">@lang('editProfile.Surname')</label>
                            <input name="surname" type="text" class="form-control" value="{{$user->surname}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('indexUser.City')</label>
                            <input name="city" type="text" class="form-control" value="{{$user->city}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('indexUser.Country')</label>
                            <input name="country" type="text" class="form-control" value="{{$user->country}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('indexUser.Age')</label>
                            <input name="age" type="text" class="form-control" value="{{$user->age}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">@lang('indexUser.E-mail')</label>
                            <input name="email" type="email" class="form-control" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">@lang('indexUser.Telephone')</label>
                            <input name="telephone" type="text" class="form-control" value="{{$user->telephone}}">
                        </div>
                        <button type="submit" class="btn btn-success">@lang('editProfile.Update profile')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
