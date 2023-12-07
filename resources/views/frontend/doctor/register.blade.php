<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Digital Clinic | Doctor Registration </title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="{{ asset('FrontEndAssets/DoctorAssets/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('FrontEndAssets/DoctorAssets/css/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <form action="" id="wizard">
            <!-- Personal Information -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{ asset('FrontEndAssets/DoctorAssets/images/form-wizard-1.jpg') }}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Doctor Registration</h3>
                        </div>
                        <p>Provide Personal Information</p>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="text" placeholder="Full Name" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input title="Date Of Birth" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="text" placeholder="Your Email" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="text" placeholder="Phone Number" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="text" placeholder="Nationality" class="form-control">
                            </div>
                            <div class="form-holder" style="align-self: flex-end; transform: translateY(4px);">
                                <div class="checkbox-tick">
                                    <label class="male">
                                        <input type="radio" name="gender" value="male" checked> Male<br>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="female">
                                        <input type="radio" name="gender" value="female"> Female<br>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="file" accept="image/*" class="form-control" title="Professional Picture" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Professional Information -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{ asset('FrontEndAssets/DoctorAssets/images/form-wizard-2.jpg') }}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Doctor Registration</h3>
                        </div>
                        <p>Provide Professional Information</p>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="text" placeholder="Medical License #" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="text" placeholder="Specialization" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="number" min="0" placeholder="Experience" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder w-100">
                                <input type="text" placeholder="Medical School Attended" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-holder w-100">
                                <input type="text" placeholder="Board Certifications" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Clinic / Hospital Affiliation -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{ asset('FrontEndAssets/DoctorAssets/images/form-wizard-3.jpg') }}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Doctor Registration</h3>
                        </div>
                        <p>Provide Clinic / Hospital Affiliation</p>
                        <div class="form-row">
                            <div class="form-holder w-100">
                                <input type="text" placeholder="Name of Clinic / Hospital" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder w-100">
                                <textarea type="text" placeholder="Address" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Availability -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{ asset('FrontEndAssets/DoctorAssets/images/form-wizard-3.jpg') }}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Doctor Registration</h3>
                        </div>
                        <p>Provide Availability</p>
                        <div class="form-row">
                            <div class="form-holder w-100">
                                <input type="text" placeholder="Days Of week" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="time" placeholder="Start Time" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="time" placeholder="End Time" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Languages Spoken Social Links -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{ asset('FrontEndAssets/DoctorAssets/images/form-wizard-3.jpg') }}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Doctor Registration</h3>
                        </div>
                        <p>Provide Languages & Social Links</p>
                        <div class="form-row">
                            <div class="form-holder w-100">
                                <input type="text" placeholder="Languages Spoken" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="url" placeholder="Facebook Link" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="url" placeholder="Instagram Link" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="url" placeholder="LinkedIn Link" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Biography -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{ asset('FrontEndAssets/DoctorAssets/images/form-wizard-3.jpg') }}" alt="">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>Doctor Registration</h3>
                        </div>
                        <p>Provide Biography and Profile</p>
                        <div class="form-row">
                            <div class="form-holder">
                                <textarea type="text" placeholder="Professional Bio" class="form-control"></textarea>
                            </div>
                            <div class="form-holder">
                                <textarea type="text" placeholder="Educational Background" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <textarea type="text" placeholder="Areas of Expertise" class="form-control"></textarea>
                            </div>
                            <div class="form-holder">
                                <textarea type="text" placeholder="Publications(if applicable)" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-holder">
                                <input type="number" placeholder="Consultation Fee" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- JQUERY -->
    <script src="{{ asset('FrontEndAssets/DoctorAssets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- JQUERY STEP -->
    <script src="{{ asset('FrontEndAssets/DoctorAssets/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('FrontEndAssets/DoctorAssets/js/main.js') }}"></script>
</body>

</html>
