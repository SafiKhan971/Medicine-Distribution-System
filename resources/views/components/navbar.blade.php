<header class="header">
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('img/dhc_logo.png')}}" alt="#"></a>
                            {{-- <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png')}}" alt="#"></a> --}}
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
                                    {{-- <li class="active"><a href="#">Home <i class="icofont-rounded-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home Page 1</a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a href="#">Features </a></li>
                                    <!-- <li><a href="#">Pricing </a></li> -->
                                    <!-- <li><a href="#">Security </a></li> -->
                                    <li><a href="#about">About </a></li>
                                    <li><a href="#">Blogs </a></li>
                                    <li class="mr-5"><a href="{{ url('/contact') }}">Contact </a></li>
                                    <li><a href="#appointment">Schedule a Demo</a></li>
                                    @if (auth()->check())
                                        <li><a href="#"> {{ auth()->user()->name }} <i
                                                    class="icofont-rounded-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{ url('profile') }}">Profile</a></li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <li><a href="#"
                                                            onclick="event.preventDefault();
                                        this.closest('form').submit();">Log
                                                            Out</a></li>
                                                </form>
                                            </ul>
                                        </li>
                                    @else
                                        {{-- <li><a href="{{ route('login') }}">Login </a></li> --}}
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
                                    {{-- <li><a href="#">Pages <i class="icofont-rounded-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="404.html">404 Error</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Blogs <i class="icofont-rounded-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="blog-single.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact Us</a></li> --}}
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    {{-- <div class="col-6">
                        <div class="get-quote">
                            <a href="appointment.html" class="btn">
                                Schedule a Demo
                                 </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <div class="get-quote">
                            <a href="appointment.html" class="btn">

                                Login </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
