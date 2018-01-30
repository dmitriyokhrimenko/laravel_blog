<div class="blog-masthead">
    <div class="container-fluid">

        <ul class="nav top-nav">
            <li><a class="nav-link active" href="/">Home</a></li>
            @if (Auth::check())
                @if(Auth::user()->role == "admin")
                    <li><a class="nav-link" href="/admin/users">Users</a></li>
                    <li><a class="nav-link" href="/admin/posts">Posts</a></li>
                    <li><a class="nav-link" href="/admin/comments">Comments</a></li>
                @else
                    <li><a class="nav-link" href="/post/create">Create Post</a></li>
                    <li><a class="nav-link" href="/user/profile/{{Auth::user()->id}}">Профиль</a></li>
                @endif
            @else
                <li><a class="nav-link" href="/register">Register</a></li>
                <li><a class="nav-link" href="/login">Login</a></li>
            @endif
        </ul>

            <ul class="nav justify-content-end account-info">
                @if (Auth::check())
                    <div class="account-info">
                        <img src="{{asset('images/no-person.png')}}" />
                        <p class="user-name">{{Auth::user()->name}}</p>
                    </div>
                    <li class="logout">
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