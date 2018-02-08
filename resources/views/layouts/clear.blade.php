<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>
            @lang('main.appName')
    </title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('/css//bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('css/forblog.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">
    <link href="{{asset('/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="{{asset('/js/jquery-3.3.1.min.js')}}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    @if(Route::currentRouteName() == 'post.create' || Route::currentRouteName() == 'edit.post')
        <script src='{{asset('/js/tinymce/js/tinymce/tinymce.min.js')}}'></script>
        <script src='{{asset('/js/tinymce-config.js')}}'></script>
    @endif


</head>

<body>
    @include('layouts.parts.nav')

    @if(Request::route()->getPrefix() == '/profile' || Request::route()->getPrefix() == App::getLocale() . '/profile')
        @include('layouts.parts.additionalNav')
        <section class="main clear profile">
    @else
        <section class="main clear">
    @endif


            <div class="container">
                <div class="row">

                        @yield('content')

            </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

    @include('layouts.parts.footer')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @if(Route::currentRouteName() == 'post.create' || Route::currentRouteName() == 'edit.profile' || Route::currentRouteName() == 'edit.post')
        <script src='{{asset('/js/preload-img.js')}}'></script>
    @endif
    @if(Route::currentRouteName() == 'edit.post')
        <script src='{{asset('/js/load-post-content.js')}}'></script>
    @endif
</body>

</html>
