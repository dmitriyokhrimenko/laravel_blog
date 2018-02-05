@extends('layouts.clear')

@section('content')

    <div class="col-sm-12 blog-main">
                <div class="row user-data">
                    <div class="col-sm-3 profile-photo">
                        @if(!empty($user->photo))
                            <img src="{{asset('/images/profilePhoto/' . $user->photo)}}" alt="" class="">
                        @else
                            <img src="{{asset('/images/no-person.png')}}" alt="" class="">
                        @endif
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <p>
                            @if(!empty($user->name) || isset($user->surname))
                                <h2 class="full-user-name">
                                    <b>
                                        {{$user->name}} {{$user->surname}}
                                    </b>
                                </h2>
                            @endif
                            
                            @if(!empty($user->city))
                            <b>City</b>
                                <br/>
                                    <i>{{$user->city}}</i>
                                        <br/>
                            @endif
                            
                            @if(!empty($user->country))
                            <b>Country</b>
                                <br/>
                                    <i>{{$user->country}}</i>
                                        <br/>
                            @endif
                            
                            @if(!empty($user->age))
                            <b>Age</b>
                                <br/>
                                    <i>{{$user->age}}</i>
                                        <br/>
                            @endif
                   
                            @if(!empty($user->email))
                            <b>E-mail</b>
                                <br/>
                                    <i>{{$user->email}}</i>
                                        <br/>
                            @endif
                                        
                            @if(!empty($user->telephone))
                            <b>Telephone</b>
                                <br/>
                                    <i>{{$user->telephone}}</i>
                                        <br/>
                            @endif
                        </p>
                    </div>
                </div>
        
        <!--Delete profile-->
        <button type="button" class="delete btn btn-danger" data-toggle="modal" data-target="#deleteAccount">
                <i class="fas fa-times"></i><span> Delete account</span>
        </button>
        
        <!--Edit profile-->
        <a class="btn btn-primary edit-profile" href="{{route('edit.profile')}}" role="button">
            <span> Edit personal data</span>
        </a>
        
        <!--Modal window delete profile-->
        <div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="deleteAccountLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">x</span>
               </button>
             </div>
             <div class="modal-footer">
               <form method="post" action="{{route('delete.profile')}}">
                    {{ csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="delete btn btn-danger">
                        <span> Delete account</span>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
             </div>
            </div>
          </div>
        </div>
        
        
    </div><!-- /.blog-main -->

@endsection



