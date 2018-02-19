<div class="blog-masthead">
    <div class="container-fluid">

      <button id="toggle" class="navbar-toggle">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
        <ul class="nav top-nav primary-menu" id="primary-menu">
            <li><a class="nav-link" href="{{route('home')}}">@lang('nav.Home')</a></li>
            @if (Auth::check())
                    <li><a class="nav-link" href="{{route('post.create')}}">@lang('nav.Create Post')</a></li>
                    <li>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('nav.Profile')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{route('profile')}}">@lang('additionalNav.Main')</a>
                              <a class="dropdown-item" href="{{route('user.posts')}}">@lang('additionalNav.Your posts')</a>
                              <a class="dropdown-item" href="{{route('user.comments')}}">@lang('additionalNav.Your comments')</a>
                            </div>
                        </div>
                    </li>
            @else
                <li><a class="nav-link" href="{{route('register')}}">@lang('nav.Register')</a></li>
                <li><a class="nav-link" href="{{route('login')}}">@lang('nav.Login')</a></li>
            @endif
                <li class="archive-dropdown">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('sidebar.Archive')
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          @if($archive->count() > 0)
                              @foreach($archive as $one)
                                <a href="{{route('archive', ['month' => $one->month, 'year' => $one->year])}}" class="dropdown-item">@lang("sidebar.$one->month") {{$one->year}} ({{$one->posts}})</a>
                              @endforeach
                          @endif
                        </div>
                    </div>
                </li>
        </ul>

        <!--Mobile menu-->
        <ul class="nav top-nav mobile-menu" id="mobile-menu">
            <li><a class="nav-link" href="{{route('home')}}">@lang('nav.Home')</a></li>
            @if (Auth::check())
                    <li><a class="nav-link" href="{{route('post.create')}}">@lang('nav.Create Post')</a></li>
                    <li>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('nav.Profile')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="{{route('profile')}}">@lang('additionalNav.Main')</a>
                              <a class="dropdown-item" href="{{route('user.posts')}}">@lang('additionalNav.Your posts')</a>
                              <a class="dropdown-item" href="{{route('user.comments')}}">@lang('additionalNav.Your comments')</a>
                            </div>
                        </div>
                    </li>
            @else
                <li><a class="nav-link" href="{{route('register')}}">@lang('nav.Register')</a></li>
                <li><a class="nav-link" href="{{route('login')}}">@lang('nav.Login')</a></li>
            @endif
            <li>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('sidebar.Archive')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      @if($archive->count() > 0)
                          @foreach($archive as $one)
                            <a href="{{route('archive', ['month' => $one->month, 'year' => $one->year])}}" class="dropdown-item">@lang("sidebar.$one->month") {{$one->year}} ({{$one->posts}})</a>
                          @endforeach
                      @endif
                    </div>
                </div>
            </li>
        </ul>


        <div class="locale">
                <a href="{{route('locale', ['lang' => 'en'])}}">
                    <img class="language" src="{{asset('images/app/icons/en.png')}}">
                </a>
                <a href="{{route('locale', ['lang' => 'ru'])}}">
                    <img class="language" src="{{asset('images/app/icons/ru.png')}}">
                </a>

        </div>
            <ul class="nav justify-content-end account-info">
                @if (Auth::check())
                    <div class="account-avatar">
                        @if(isset(Auth::user()->photo) && file_exists(public_path('/images/profilePhoto/' . Auth::user()->photo)))
                            <a class="nav-link" href="{{route('profile')}}"><img src="{{asset('images/profilePhoto/' . Auth::user()->photo)}}" /></a>
                        @else
                            <a class="nav-link" href="{{route('profile')}}"><img src="{{asset('images/app/no-person.png')}}" /></a>
                        @endif
                    </div>
                    <div class="logout-section">
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
                    </div>
                @endif
            </ul>
    </div>
</div>
