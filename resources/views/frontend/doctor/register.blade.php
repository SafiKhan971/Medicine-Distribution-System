<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Clinic | Doctor Registration</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('RegistrationAssets/fonts/themify-icons/themify-icons.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('RegistrationAssets/css/style.css') }}">
</head>

<body>

    <div class="main">

        <div class="container">
            <a href="{{ url('/') }}">
                <h2>Digital Clinic | Doctor Registration</h2>
            </a>
            <form method="POST" action="{{ url('doctor/register') }}" enctype="multipart/form-data" id="signup-form"
                class="signup-form">
                @csrf
                <!-- Personal -->
                <h3>
                    <span class="icon"><i class="ti-user"></i></span>
                    <span class="title_text">Personal</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Personal Informaltion: </span>
                        <span class="step-number">Step 1 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="full_name" class="form-label required">Full name</label>
                        <input type="text" name="full_name" id="full_name" placeholder="Full name"/>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label required">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email"/>
                    </div>

                    <div class="form-group">
                        <label for="phone_no" class="form-label">Phone No</label>
                        <input type="number" name="phone_no" id="phone_no" placeholder="Phone No"/>
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

                        <div class="form-select">
                            <label for="gender" class="form-label">Gender</label>
                            <div class="select-list">
                                <select name="gender" id="gender">
                                    <option value="" selected>Please Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" name="nationality" id="nationality" placeholder="Nationality"/>
                    </div>
                </fieldset>
                <!-- Professional -->
                <h3>
                    <span class="icon"><i class="ti-email"></i></span>
                    <span class="title_text">Professional</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Professional Informaltion: </span>
                        <span class="step-number">Step 2 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="medical_license" class="form-label">Medical License #</label>
                        <input type="text" name="medical_license" id="medical_license" placeholder="Medical License #"/>
                    </div>

                    <div class="form-group">
                        <label for="specialization" class="form-label">Specialization</label>
                        <input type="number" name="specialization" id="specialization" placeholder="Specialization"/>
                    </div>

                    <div class="form-group">
                        <label for="experience" class="form-label required">Experience <small>(in Years)</small></label>
                        <input type="number" name="experience" id="experience" placeholder="Experience" />
                    </div>

                    <div class="form-select">
                        <label for="country" class="form-label">Country</label>
                        <div class="select-list">
                            <select name="country" id="country">
                                <option value="">Australia</option>
                                <option value="Australia">Australia</option>
                                <option value="USA">America</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <h3>
                    <span class="icon"><i class="ti-star"></i></span>
                    <span class="title_text">Offical</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Offical Informaltion: </span>
                        <span class="step-number">Step 3 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="employee_id" class="form-label required">Employee ID</label>
                        <input type="text" name="employee_id" id="employee_id" />
                    </div>

                    <div class="form-group">
                        <label for="designation" class="form-label required">Designation</label>
                        <input type="text" name="designation" id="designation" />
                    </div>

                    <div class="form-group">
                        <label for="department" class="form-label required">Department</label>
                        <input type="text" name="department" id="department" />
                    </div>

                    <div class="form-group">
                        <label for="work_hours" class="form-label required">Working hours</label>
                        <input type="text" name="work_hours" id="work_hours" />
                    </div>
                </fieldset>

                <h3>
                    <span class="icon"><i class="ti-credit-card"></i></span>
                    <span class="title_text">Payment</span>
                </h3>
                <fieldset>
                    <legend>
                        <span class="step-heading">Payment Informaltion: </span>
                        <span class="step-number">Step 4 / 4</span>
                    </legend>
                    <div class="form-group">
                        <label for="bank_name" class="form-label required">Bank Name</label>
                        <input type="text" name="bank_name" id="bank_name" />
                    </div>

                    <div class="form-group">
                        <label for="holder_name" class="form-label required">Holder Name</label>
                        <input type="text" name="holder_name" id="holder_name" />
                    </div>

                    <div class="form-row">
                        <div class="form-date">
                            <label for="expiry_date" class="form-label">Expiry Date</label>
                            <div class="form-date-group">
                                <div class="form-date-item">
                                    <select id="expiry_date" name="expiry_date"></select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="expiry_month" name="expiry_month"></select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="expiry_year" name="expiry_year"></select>
                                    <span class="select-icon"><i class="ti-angle-down"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-select">
                            <label for="payment_type" class="form-label">Payment type</label>
                            <div class="select-list">
                                <select name="payment_type" id="payment_type">
                                    <option value="">Master Card</option>
                                    <option value="Master Card">Master Card</option>
                                    <option value="Visa Card">Visa Card</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="card_number" class="form-label required">Card Number</label>
                            <input type="number" name="card_number" id="card_number" />
                        </div>

                        <div class="form-group">
                            <label for="cvc" class="form-label required">CVC</label>
                            <input type="text" name="cvc" id="cvc" />
                        </div>
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
