<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <h4 class="back-to-site text-center"><a href="{{route('home')}}">Go to main site</a></h4>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <ul class="nav justify-content-end">
                      <li class="lang"><a href="{{route('locale', ['lang' => 'en'])}}">
                          <img class="language" src="{{asset('images/app/icons/en.png')}}">
                      </a></li>
                      <li class="lang"><a href="{{route('locale', ['lang' => 'ru'])}}">
                          <img class="language" src="{{asset('images/app/icons/ru.png')}}">
                      </a></li>
                            <div class="account-info">
                                @if(isset(Auth::user()->photo) && file_exists(public_path('/images/profilePhoto/' . Auth::user()->photo)))
                                    <a class="nav-link" href="{{route('profile')}}"><img src="{{asset('images/profilePhoto/' . Auth::user()->photo)}}" /></a>
                                @else
                                    <a class="nav-link" href="{{route('profile')}}"><img src="{{asset('/images/app/admin/admin.jpg')}}" alt="Admin Avatar"></a>
                                @endif
                            </div>
                            <li class="logout">
                                <p class="user-name">{{Auth::user()->name}}</p>
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                    @lang('nav.Logout')
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                    </ul>
                </div>
            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Icons</a></li>
                        <li class="active">FontAwesome</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
          @yield('content')
        </div><!-- .animated -->
    </div><!-- .content -->


</div><!-- /#right-panel -->

<!-- Right Panel -->
