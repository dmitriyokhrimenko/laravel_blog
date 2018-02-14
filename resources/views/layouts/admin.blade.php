<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('/images/app/icons/favicon.ico')}}" rel="shortcut icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>
            @lang('main.appName')
    </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('/css//bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('/css/forblog.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">
    <link href="{{asset('/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/js/scroll-top.js')}}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <link rel="stylesheet" href="{{asset('/adminpart/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/adminpart/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminpart/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminpart/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/adminpart/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminpart/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('/adminpart/assets/scss/style.css')}}">
    @if(Route::currentRouteName() === 'admin.login')
      <link rel="stylesheet" href="{{asset('/adminpart/assets/scss/login.css')}}">
    @endif

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>
<body class="admin">

    @if(Auth::check() && Auth::user()->role === 'admin')
    <!-- Left Panel -->

    @include('admin.left-panel')

    <!-- Left Panel -->

    <!-- Right Panel -->

    @include('admin.right-panel')

    <!-- Right Panel -->
    @elseif(!Auth::check())

      @yield('login')

      @include('layouts.parts.footer')

    @endif



    <script src="{{asset('/adminpart/assets/js/plugins.js')}}"></script>
    <script src="{{asset('/adminpart/assets/js/main.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
