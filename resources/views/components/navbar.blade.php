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
                                    <li><a href="#">Features </a></li>
                                    <li><a href="#about">About </a></li>
                                    <li><a href="#">Blogs </a></li>
                                    <li><a href="{{ url('/contact') }}">Contact </a></li>
                                    <li><a href="#appointment">Schedule a Demo</a></li>
                                    @if (auth()->check())
                                        <li class="ml-5">
                                            <a href="#">{{ auth()->user()->name }}
                                                <i class="icofont-rounded-down"></i>
                                            </a>
                                            <ul class="dropdown">
                                                <li><a href="{{ url('profile') }}">Profile</a></li>
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
                                        </li>
                                    @else
                                        <li><a href="#"> Login <i class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{ route('login') }}">Login As Patient</a></li>
                                                <li><a href="{{ route('doctor.login') }}">Login As Doctor</a></li>
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
