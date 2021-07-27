<header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Logo -->
    <a href="{{ route('index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{ url('storage/logo_easy.png') }}" style="width: 30%"/></span>
        <!-- logo for regular state and mobile devices -->

        <span class="logo-lg"><img src="{{ url('storage/logo_easy.png') }}" style="width: 20%"/></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Basculer la navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu" style="margin-right: 50px">
                    <a href="{{ route('index') }}" style="margin-top: 10px"><i style="color: #fff" class="fa fa-external-link"></i> Accéder au site</a>
                </li>
                <li class="dropdown notifications-menu" style="margin-right: 50px">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @php
                            $user = \Illuminate\Support\Facades\Auth::user();
                        @endphp
                        <img src="{{ asset($user->photo) }}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50em">&nbsp; {{ $user->name }}
                        &nbsp; <i class="fa fa-sort-down" style="font-size: 18px"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><a href="{{ route('intranet.editUser', $user->id) }}"><i class="fa fa-user-circle"></i>Mon profil</a></li>
                        <li class="header">
                            <a href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i>
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</header>