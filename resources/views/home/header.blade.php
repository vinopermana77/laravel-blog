@include('sweetalert::alert')
<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg sticky-top navbar-light px-0">
            <a class="navbar-brand order-1 py-0" href="{{ url('/') }}">
                <h2>Vino<span class="text-success">Blog</span> </h2>
            </a>
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button" data-toggle="collapse"
                    data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <form action="" class="d-flex search order-lg-3 order-md-2 order-3 ml-auto" method="GET">
                <input id="katakunci" name="katakunci" type="search" placeholder="Search..." autocomplete="off">
            </form>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('aboutMe') }}">About Me</a>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="blog/#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Articles
                        </a>
                        <div class="dropdown-menu"> <a class="dropdown-item" href="{{ route('errorPage') }}">Travel</a>
                            <a class="dropdown-item" href="{{ route('errorPage') }}">Lifestyle</a>
                            <a class="dropdown-item" href="{{ route('errorPage') }}">Cruises</a>
                        </div>
                    </li>

                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="blog/#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                            @if (Auth::user()->usertype=='admin')
                            <a class="dropdown-item" href="{{ route('home') }}">Admin Panel</a>
                            @else
                            <a class="dropdown-item" href="{{ route('myPost') }}">My Post</a>
                            <a class="dropdown-item" href="{{ route('createPost') }}">Create Post</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>