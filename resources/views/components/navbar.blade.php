<header class="header">
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('img/dhc_logo.png') }}" alt="#"></a>
                        </div>
                        <!-- End Logo -->
                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div class="col-lg-9 col-md-9 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    {{-- <li><a href="#">Features </a></li> --}}
                                    <li class="mr-5"><a href="{{ url('about') }}">About </a></li>
                                    <li class="mr-5"><a href="#">Blogs </a></li>
                                    <li class="mr-5"><a href="{{ url('/contact') }}">Contact </a></li>
                                    @if (auth()->guard('web')->check() || session('admin_id') || session('doctor_id'))
                                        <li class="ml-5">
                                            <a href="#">
                                                {{ auth()->guard('web')->check() ? auth()->guard('web')->user()->name : '' }}
                                                {{ session('doctor_id') ? session()->get('doctor_name') : '' }}
                                                {{ session('admin_id') ? session()->get('admin_name') : '' }}
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            @if (auth()->guard('web')->check())
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('profile') }}">Dashboard</a></li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <li>
                                                            <a href="#"
                                                                onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                                Log Out
                                                            </a>
                                                        </li>
                                                    </form>
                                                </ul>
                                            @elseif(session('admin_id'))
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                                    <form method="POST" action="{{ url('admin/logout') }}">
                                                        @csrf
                                                        <li>
                                                            <a href="#"
                                                                onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                                Log Out
                                                            </a>
                                                        </li>
                                                    </form>
                                                </ul>
                                            @elseif(session('doctor_id'))
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('doctor/dashboard') }}">Dashboard</a></li>
                                                    <form method="POST" action="{{ url('doctor/logout') }}">
                                                        @csrf
                                                        <li>
                                                            <a href="#"
                                                                onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                                Log Out
                                                            </a>
                                                        </li>
                                                    </form>
                                                </ul>
                                            @endif
                                        </li>
                                    @else
                                        <li><a href="#"> Login <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('login') }}">Login As Patient</a></li>
                                                <li><a href="{{ route('doctor.login') }}">Login As Doctor</a></li>
                                                <li><a href="{{ route('admin.login') }}">Login As Admin</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"> Register <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('register') }}">Register As Patient</a></li>
                                                <li><a href="{{ route('doctor.register') }}">Register As Doctor</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
