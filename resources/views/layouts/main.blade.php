<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>
            Learning Laravel Blog
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/forblog.css') }}" rel="stylesheet">
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/blog.css') }}" rel="stylesheet">
    <link href="{{asset('/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link href="{{ asset('/summernote/summernote.css') }}" rel="stylesheet">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    @include('layouts.nav')

    @include('layouts.header')

    <div class="container">

        <div class="row">

            @yield('content')

            @include('layouts.sidebar')

        </div><!-- /.row -->

    </div><!-- /.container -->

    @include('layouts.footer')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('/summernote/summernote.js') }}"></script>

    <script>

        $(document).ready(function() {

            $('#summernote').summernote();

        });

    </script>

</body>

</html>
