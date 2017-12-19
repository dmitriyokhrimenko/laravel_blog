<div class="blog-masthead">
    <div class="container">
        <nav class="navbar">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-left">

                        @if(Auth::user()->role == "admin")
                            <li><a class="nav-link" href="/admin/users">Users</a></li>
                            <li><a class="nav-link" href="/admin/posts">Posts</a></li>
                            <li><a class="nav-link" href="/admin/comments">Comments</a></li>
                        @endif
                </ul>
                <ul class="nav navbar-right">
                    <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            Logout
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</div>