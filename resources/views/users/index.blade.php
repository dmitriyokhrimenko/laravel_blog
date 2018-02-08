@extends('layouts.main')

@section('content')

    <div class="col-sm-9 blog-main">
                <div class="row user-data">
                    <div class="col-sm-4 profile-photo">
                        @if(!empty($user->photo) && file_exists(public_path('/images/profilePhoto/' . $user->photo)))
                            <img src="{{asset('/images/profilePhoto/' . $user->photo)}}">
                        @else
                            <img src="{{asset('/images/app/no-person.png')}}" alt="" class="">
                        @endif
                    </div>
                    <div class="col-sm-8">
                        <p>
                            @if(!empty($user->name) || isset($user->surname))
                                <h2 class="full-user-name">
                                    <b>
                                        {{$user->name}} {{$user->surname}}
                                    </b>
                                </h2>
                            @endif

                            @if(!empty($user->city))
                            <b>@lang('indexUser.City')</b>
                                <br/>
                                    <i>{{$user->city}}</i>
                                        <br/>
                            @endif

                            @if(!empty($user->country))
                            <b>@lang('indexUser.Country')</b>
                                <br/>
                                    <i>{{$user->country}}</i>
                                        <br/>
                            @endif

                            @if(!empty($user->age))
                            <b>@lang('indexUser.Age')</b>
                                <br/>
                                    <i>{{$user->age}}</i>
                                        <br/>
                            @endif

                            @if(!empty($user->email))
                            <b>@lang('indexUser.E-mail')</b>
                                <br/>
                                    <i>{{$user->email}}</i>
                                        <br/>
                            @endif

                            @if(!empty($user->telephone))
                            <b>@lang('indexUser.Telephone')</b>
                                <br/>
                                    <i>{{$user->telephone}}</i>
                                        <br/>
                            @endif
                        </p>
                    </div>
                </div>
    </div><!-- /.blog-main -->

@endsection
