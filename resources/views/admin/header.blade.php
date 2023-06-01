@include('sweetalert::alert')
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header-->
                <a href="#" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong
                            class="text-primary">Dark</strong><strong>Admin</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                </a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
            </div>
            <div class="right-menu list-inline no-margin-bottom">
                <!-- Log out -->
                <div class="list-inline-item logout">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <span class="text-white">(Admin)</span> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-white" href="{{ route('profile.edit') }}">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-white">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Log out -->
            </div>
        </div>
    </nav>
</header>