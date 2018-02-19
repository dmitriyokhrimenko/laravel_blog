<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('/images/app/icons/favicon.ico')}}" rel="shortcut icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>
            @lang('main.appName')
    </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('/css//bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('/css/forblog.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/media.css') }}" rel="stylesheet">
    <link href="{{asset('/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/js/toggle-menu.js')}}"></script>
    <script src="{{asset('/js/scroll-top.js')}}"></script>
    <script src="{{asset('/js/successful-actions.js')}}"></script>
    @if(Route::currentRouteName() == 'post.create')
        <script src='{{asset('/js/tinymce/js/tinymce/tinymce.min.js')}}'></script>
        <script src='{{asset('/js/tinymce-config.js')}}'></script>
    @endif


</head>

<body>
    @include('layouts.parts.nav')

    <!--Pop up messages-->
    @include('layouts.parts.successfulActions')

    @include('layouts.parts.header')
    <section class="main">
        <div class="container content">

         <div class="row">

                @yield('content')

                @include('layouts.parts.sidebar')

            </div><!-- /.row -->

        </div><!-- /.container -->
    </section>

    @include('layouts.parts.footer')
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
