<div class="blog-masthead">
    <div class="container-fluid">

        <ul class="nav top-nav">
            <li><a class="nav-link active" href="/">Home</a></li>
            @if (Auth::check())
                    <li><a class="nav-link" href="/post/create">Create Post</a></li>
                    <li><a class="nav-link" href="{{route('profile')}}">Profile</a></li>
            @else
                <li><a class="nav-link" href="{{route('register')}}">Register</a></li>
                <li><a class="nav-link" href="{{route('login')}}">Login</a></li>
            @endif
        </ul>

            <ul class="nav justify-content-end account-info">
                @if (Auth::check())
                    <div class="account-info">
                        <img src="{{asset('images/no-person.png')}}" />
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