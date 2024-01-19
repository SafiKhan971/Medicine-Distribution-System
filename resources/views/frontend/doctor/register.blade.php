<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Clinic | Doctor Registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('RegistrationAssets/fonts/themify-icons/themify-icons.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('RegistrationAssets/css/style.css') }}">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include toastr.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        .radio-buttons label {
            display: inline-block;
        }

        .radio-buttons input[type="radio"] {
            display: inline-block;
        }

    </style>
</head>

<body>

    <div class="main">

        <div class="container">
            <a href="{{ url('/') }}">
                <h2>Digital Clinic | Doctor Registration</h2>
            </a>
            <form method="POST" action="{{ url('doctor/register') }}" enctype="multipart/form-data" id="signup-form" class="signup-form">
                @csrf
                <!-- Personal -->
                <h3>
                    <span class="icon"><i class="ti-user"></i></span>
                    <span class="title_text">Personal</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Personal Information: </span>
                        <span class="step-number">Step 1 / 4</span>
                    </legend>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="full_name" class="form-label required">Full name</label>
                            <input type="text" name="full_name" id="full_name" placeholder="Full name" />
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone_no" class="form-label">Phone No</label>
                            <input type="number" name="phone_no" id="phone_no" placeholder="Phone No" />
                        </div>

                        <div class="form-group">
                            <label for="nationality" class="form-label">Nationality</label>
                            <input type="text" name="nationality" id="nationality" placeholder="Nationality" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-date">
                            <label for="birth_date" class="form-label">Date of birth</label>
                            <div class="form-date-group">
                                <div class="form-date-item">
                                    <select id="birth_date" name="birth_date"></select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="birth_month" name="birth_month"></select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="birth_year" name="birth_year"></select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Gender</label>
                            <select name="gender" id="Gender">
                                <option value="" selected>Please select one…</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="non-binary">Non-Binary</option>
                                <option value="other">Other</option>
                                <option value="Prefer not to answer">Perfer not to Answer</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="margin-right: 10px;">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" name="profile_picture" id="profile_picture" accept="image/*" />
                        </div>
                        <div class="form-group">
                            <label for="medical_license_picture" class="form-label">Medical License Picture</label>
                            <input type="file" name="medical_license_picture" id="medical_license_picture" accept="image/*" />
                        </div>
                    </div>
                </fieldset>
                <!-- Professional -->
                <h3>
                    <span class="icon"><i class="ti-bookmark-alt"></i></span>
                    <span class="title_text">Professional</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Professional Information: </span>
                        <span class="step-number">Step 2 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="medical_license_no" class="form-label required">Medical License #</label>
                        <input type="text" name="medical_license_no" id="medical_license_no" placeholder="Medical License #" />
                    </div>

                    <div class="form-group">
                        <label for="specialization" class="form-label">Specialization</label>
                        <input type="text" name="specialization" id="specialization" placeholder="Specialization" />
                    </div>

                    <div class="form-group">
                        <label for="experience" class="form-label">Experience <small>(in Years)</small></label>
                        <input type="number" name="experience" id="experience" placeholder="Experience" />
                    </div>

                    <div class="form-select">
                        <label for="board_certifications" class="form-label">Board of Certifications</label>
                        <input type="text" name="board_certifications" id="board_certifications" placeholder="Board of Certifications" />
                    </div>
                </fieldset>
                <!-- Affiliation -->
                <h3>
                    <span class="icon"><i class="ti-home"></i></span>
                    <span class="title_text">Affiliation</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Clinic / Hospital Affiliation Information: </span>
                        <span class="step-number">Step 3 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="clinic_name" class="form-label required">Name of Clinic / Hospital</label>
                        <input type="text" name="clinic_name" id="clinic_name" placeholder="Name of Clinic / Hospital" />
                    </div>

                    <div class="form-group">
                        <label for="clinic_email" class="form-label">Clinic / Hospital Email</label>
                        <input type="text" name="clinic_email" id="clinic_email" placeholder="Clinic / Hospital Email" />
                    </div>

                    <div class="form-group">
                        <label for="clinic_phone" class="form-label">Clinic / Hospital Phone #</label>
                        <input type="text" name="clinic_phone" id="clinic_phone" placeholder="Clinic / Hospital Phone #" />
                    </div>

                    <div class="form-group">
                        <label for="clinic_address" class="form-label">Clinic / Hospital Address</label>
                        <input type="text" name="clinic_address" id="clinic_address" placeholder="Clinic / Hospital Address" />
                    </div>
                </fieldset>
                <!-- Availability -->
                <h3>
                    <span class="icon"><i class="ti-alarm-clock"></i></span>
                    <span class="title_text">Availability</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Availability Information: </span>
                        <span class="step-number">Step 4 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="days_week" class="form-label required">Days Of week</label>
                        <input type="text" min="0" max="7" name="days_week" id="days_week" placeholder="Days Of week" />
                    </div>

                    <div class="form-group">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="time" name="start_time" id="start_time" />
                    </div>

                    <div class="form-group">
                        <label for="end_time" class="form-label">End Time</label>
                        <input type="time" name="end_time" id="end_time" />
                    </div>
                </fieldset>
            </form>
        </div>

    </div>
    <div class="footer">

    </div>

    <!-- JS -->
    <script src="{{ asset('RegistrationAssets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('RegistrationAssets/vendor/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('RegistrationAssets/vendor/jquery-validation/dist/additional-methods.min.js') }}"></script>
    <script src="{{ asset('RegistrationAssets/vendor/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('RegistrationAssets/vendor/minimalist-picker/dobpicker.js') }}"></script>
    <script src="{{ asset('RegistrationAssets/js/main.js') }}"></script>
</body>

</html>
