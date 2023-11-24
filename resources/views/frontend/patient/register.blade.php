<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Mediplus | Patient Registration </title>

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
                <header>Patient Registration</header>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="field input-field">
                        <input type="text" placeholder="Name" class="input" name="name"
                            value="{{ old('name') }}" required autofocus autocomplete="name">
                    </div>
                    @error('name')
                        <div style="color: red; margin-top: 5px; margin-bottom: 3px; font-size: 15px">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email"
                            value="{{ old('email') }}" required autocomplete="username">
                    </div>
                    @error('email')
                        <div style="color: red; margin-top: 5px; margin-bottom: 3px; font-size: 15px">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="field input-field">
                        <input type="password" placeholder="Create password" class="password" name="password" required
                            autocomplete="new-password">
                    </div>
                    @error('password')
                        <div style="color: red; margin-top: 5px; margin-bottom: 3px; font-size: 15px">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="field input-field">
                        <input type="password" placeholder="Confirm password" class="password"
                            name="password_confirmation" required autocomplete="new-password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    @error('password_confirmation')
                        <div style="color: red; margin-top: 5px; margin-bottom: 3px; font-size: 15px">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="field button-field">
                        <button>Signup</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="{{ url('login') }}">Login</a></span>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="{{ asset('FrontEndAssets/js/script.js') }}"></script>
</body>

</html>
