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
    <link href="{{ asset('css/forblog.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/media.css') }}" rel="stylesheet">
    <link href="{{asset('/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/js/toggle-menu.js')}}"></script>
    <script src="{{asset('/js/scroll-top.js')}}"></script>
    <script src="{{asset('/js/ajax/delete-photo.js')}}"></script>
    <script src="{{asset('/js/successful-actions.js')}}"></script>
    <script src="{{asset('/js/delete_group.js')}}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    @if(Route::currentRouteName() == 'post.create' || Route::currentRouteName() == 'edit.post')
        <script src='{{asset('/js/tinymce/js/tinymce/tinymce.min.js')}}'></script>
        <script src='{{asset('/js/tinymce-config.js')}}'></script>
    @endif


</head>

<body>
    @include('layouts.parts.nav')

    @if(Request::route()->getPrefix() == '/profile' || Request::route()->getPrefix() == App::getLocale() . '/profile')
        <section class="main clear profile">
    @else
        <section class="main clear">
    @endif


            <div class="container">
                <div class="row">

                        <!--Pop up messages-->
                        @include('layouts.parts.successfulActions')

                        @yield('content')

            </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

    @include('layouts.parts.footer')
    <script src="{{ asset('js/app.js') }}"></script>
    @if(Route::currentRouteName() == 'post.create' || Route::currentRouteName() == 'edit.profile' || Route::currentRouteName() == 'edit.post')
        <script src='{{asset('/js/preload-img.js')}}'></script>
    @endif
    @if(Route::currentRouteName() == 'edit.post')
        <script src='{{asset('/js/load-post-content.js')}}'></script>
    @endif
</body>

</html>
