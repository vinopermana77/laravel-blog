<nav id="sidebar" class="text-white">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="adminpanel/img/user.png" alt="user" class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">{{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->usertype }}</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li><a href="{{ route('home') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{ route('homepage') }}"> <i class="fa fa-bar-chart"></i>Blog</a></li>
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i
                    class="icon-windows"></i>Posts</a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ route('index') }}"> <i class="fa fa-bar-chart"></i>All Posts</a></li>
                <li><a href="{{ route('create') }}"> <i class="fa fa-bar-chart"></i>Create Post </a></li>
            </ul>
        </li>
</nav>