<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Digital Clinic | Doctor Login </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('FrontEndAssets/css/style.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <a href="{{ url('/') }}" id="logo"><img src="{{ asset('img/dhc_logo.png')}}" alt="logo" /></a>
                <header>Doctor Login</header>
                @error('error')
                    <div style="color: red; margin-top: 10px">{{ $message }}</div>
                @enderror
                <form method="POST" action="{{ url('doctor/login') }}">
                    @csrf
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email"
                            value="{{ old('email') }}" required autofocus>
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" type="password" name="password"
                            required autocomplete="current-password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>


                    @if (Route::has('password.request'))
                        <div class="form-link">
                            <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password?</a>
                        </div>
                    @endif

                    <div class="field button-field">
                        <button>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="{{ asset('FrontEndAssets/js/script.js') }}"></script>
</body>

</html>
