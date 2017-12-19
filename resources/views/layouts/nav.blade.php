<div class="blog-masthead">
    <div class="container">
        <nav class="navbar">
            <ul class="nav">
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
            <ul class="nav navbar-right">
                @if (Auth::check())
                    <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{Auth::user()->name}}</br>
                            Logout
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
            </ul>
        </nav>
    </div>
</div>