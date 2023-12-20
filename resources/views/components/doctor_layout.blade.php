<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('BackEndAssets/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('BackEndAssets/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('BackEndAssets/assets/css/argon.css?v=1.1.0') }}" type="text/css">
    <!-- Tiny MCE  -->
    <script src="https://cdn.tiny.cloud/1/yikbazui90uh2y8pdilmb6g58m0h17mdn7wpp7opiescxn58/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('BackEndAssets/assets/vendor/quill/dist/quill.core.css') }}">
    <link rel="stylesheet" href="{{ asset('BackEndAssets/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BackEndAssets/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BackEndAssets/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

    <style>
        .notification-counter {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 7px;
            font-size: 12px;
        }
    </style>
</head>

<body>

    @php
    $doctor_id = session('doctor_id');
    if($doctor_id)
    {
    $doctor_notifications = App\Models\Notification::where('doctor_id', $doctor_id)->get();
    $total = $doctor_notifications->count();
    }
    @endphp
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/dhc_logo.png') }}" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('doctor/dashboard')}}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('doctor/basic-information')}}">
                                <i class="ni ni-circle-08 text-primary"></i>
                                <span class="nav-link-text">Basic Information</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('health-record.index')}}">
                                <i class="ni ni-single-copy-04 text-pink"></i>
                                <span class="nav-link-text">Patient Health Records</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('doctor.appointments') }}">
                                <i class="fa fa-clock text-red" aria-hidden="true"></i>
                                <span class="nav-link-text">Future Appointments</span>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('doctor/feedbacks') }}">
                        <i class="fa fa-comments text-black" aria-hidden="true"></i>
                        <span class="nav-link-text">Feedbacks</span>
                        </a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('doctor.consultations') }}">
                                <i class="fa fa-paper-plane text-info" aria-hidden="true"></i>
                                <span class="nav-link-text">Video Consultation Requests</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-dark form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                                <span class="notification-counter">{{ $total ?? '' }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">
                                        You have <strong class="text-primary">{{ $total ?? '' }}</strong> Notifications.</h6>
                                </div>
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    @foreach($doctor_notifications as $notification)
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col ml--2">
                                                @if($notification->type == 'appointment' )
                                                <p class="text-sm mb-0"> New Appointment has been created.</p>
                                                @else
                                                <p class="text-sm mb-0"> New Video Consultaion request has been recieved.</p>
                                                {{-- <form action="#" method="post">
                                                    <button type="button" class="btn btn-success btn-sm">Start video call</button>
                                                </form> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <!-- View all -->
                                <a href="{{ route('doctor.appointments') }}"
                                    class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="{{ session()->get('doctor_picture') ? asset('storage/profile_pictures/' . session()->get('doctor_picture')) : asset('BackEndAssets/assets/img/theme/team-1.jpg') }}">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ session()->get('doctor_name') ?? '' }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="{{ url('doctor/basic-information') }}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('doctor.destroy') }}">
                                        @csrf
                                            <a href="#!" class="dropdown-item"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </form>
            </div>
        </li>
    </ul>
    </div>
    </div>
    </nav>
    <!-- Header -->
    @yield('header')
    <!-- Main Contenct -->
    @yield('content')
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('BackEndAssets/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

    <!-- Tiny MCE -->
    <script>
        tinymce.init({
            selector: '#comments',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

    <!-- Optional JS -->
    <script src="{{ asset('BackEndAssets/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('BackEndAssets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/quill/dist/quill.min.js') }}"></script>


    <!-- Argon JS -->
    <script src="{{ asset('BackEndAssets/assets/js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('BackEndAssets/assets/js/demo.min.js') }}"></script>
</body>

</html>
