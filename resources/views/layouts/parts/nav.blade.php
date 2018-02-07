<div class="blog-masthead">
    <div class="container-fluid">

        <ul class="nav top-nav">
            <li><a class="nav-link active" href="/">Home</a></li>
            @if (Auth::check())
                    <li><a class="nav-link" href="{{route('post.create')}}">Create Post</a></li>
                    <li><a class="nav-link" href="{{route('profile')}}">Profile</a></li>
            @else
                <li><a class="nav-link" href="{{route('register')}}">Register</a></li>
                <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
            @endif
            <li class="lang"><a href="">
                <img class="language" src="{{asset('images/app/icons/en.png')}}">
            </a></li>
            <li class="lang"><a href="">
                <img class="language" src="{{asset('images/app/icons/ru.png')}}">
            </a></li>
        </ul>

            <ul class="nav justify-content-end account-info">
                @if (Auth::check())
                    <div class="account-info">
                        @if(isset(Auth::user()->photo) && file_exists(public_path('/images/profilePhoto/' . Auth::user()->photo)))
                            <a class="nav-link" href="{{route('profile')}}"><img src="{{asset('images/profilePhoto/' . Auth::user()->photo)}}" /></a>
                        @else
                            <a class="nav-link" href="{{route('profile')}}"><img src="{{asset('images/app/no-person.png')}}" /></a>
                        @endif
                    </div>
                    <li class="logout">
                        <p class="user-name">{{Auth::user()->name}}</p>
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
    </div>
</div>
