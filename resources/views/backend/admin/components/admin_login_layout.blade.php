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
    <link rel="stylesheet"
        href="{{ asset('BackEndAssets/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('BackEndAssets/assets/css/argon.css?v=1.1.0') }}" type="text/css">
</head>

<body class="bg-default">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/dhc_dark_logo.png') }}">
            </a>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
    <!-- Core -->
    <script src="{{ asset('BackEndAssets/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- JS -->
    <script src="{{ asset('BackEndAssets/assets/js/argon.js?v=1.1.0') }}"></script>
    <script src="{{ asset('BackEndAssets/assets/js/demo.min.js') }}"></script>
</body>

</html>
