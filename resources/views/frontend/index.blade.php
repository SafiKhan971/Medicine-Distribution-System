@include('components/header')
@include('components/navbar')
@include('notify::components.notify')

<!-- Slider Area -->
<section class="slider" id="about">
    <div class="hero-slider">
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('img/slider2.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
                            <p>Experience comprehensive primary care that focuses on preventive measures, routine check-ups, and personalized healthcare plans tailored to your needs.</p>
                            <div class="button">
                                <a href="{{ route('profile.appointment') }}" class="btn">Get
                                    Appointment</a>
                                <a href="#" class="btn primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slider -->
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('img/slider.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
                            <p>Discover cutting-edge medical treatments and therapies delivered by our expert team, ensuring the highest standards of care and innovation.</p>
                            <div class="button">
                                <a href="{{ route('profile.appointment') }}" class="btn">Get
                                    Appointment</a>
                                <a href="#about" class="btn primary">About Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start End Slider -->
        <!-- Start Single Slider -->
        <div class="single-slider" style="background-image:url('img/slider3.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="text">
                            <h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
                            <p>Our dedicated team is ready 24/7 to provide prompt emergency and urgent care services, offering peace of mind during critical moments.</p>
                            <div class="button">
                                <a href="{{ route('profile.appointment') }}" class="btn">Get
                                    Appointment</a>
                                <a href="{{ url('contact') }}" class="btn primary">Conatct Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slider -->
    </div>
</section>
<!--/ End Slider Area -->

<!-- Start Schedule Area -->
<section class="schedule">
    <div class="container">
        <div class="schedule-inner">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 ">
                    <!-- single-schedule -->
                    <div class="single-schedule first">
                        <div class="inner">
                            <div class="icon">
                                <i class="fa fa-ambulance"></i>
                            </div>
                            <div class="single-content">
                                {{-- <span>Lorem Amet</span> --}}
                                <h4>Rapid Emergency Response</h4>
                                <p>Our dedicated team is committed to providing immediate and effective emergency assistance.</p>
                                <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- single-schedule -->
                    <div class="single-schedule middle">
                        <div class="inner">
                            <div class="icon">
                                <i class="icofont-prescription"></i>
                            </div>
                            <div class="single-content">
                                {{-- <span>Fusce Porttitor</span> --}}
                                <h4>Explore Doctors' Timetable</h4>
                                <p>Discover the schedule of our dedicated medical professionals. Professionals has a carefully curated schedule.</p>
                                <a href="{{ url('/timetable') }}">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- single-schedule -->
                    <div class="single-schedule last">
                        <div class="inner">
                            <div class="icon">
                                <i class="icofont-ui-clock"></i>
                            </div>
                            <div class="single-content">
                                {{-- <span>Donec luctus</span> --}}
                                <h4>Opening Hours</h4>
                                <ul class="time-sidual">
                                    <li class="day">Monday - Friday <span>8.00-20.00</span></li>
                                    <li class="day">Saturday <span>9.00-18.30</span></li>
                                    <li class="day">Monday - Thusday <span>9.00-15.00</span></li>
                                </ul>
                                <a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/End Start schedule Area -->

<!-- Start Feautes -->
<section class="Feautes section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Are Always Ready to Help You & Your Family</h2>
                    {{-- <img src="{{ asset('img/section-img.png') }}" alt="#"> --}}
                    <p>Experience compassionate and reliable care tailored for you and your family.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-12">
                <!-- Start Single features -->
                <div class="single-features">
                    <div class="signle-icon">
                        <i class="icofont icofont-ambulance-cross"></i>
                    </div>
                    <h3>Emergency Help</h3>
                    <p>Count on our dedicated team for immediate and expert emergency help.</p>
                </div>
                <!-- End Single features -->
            </div>
            <div class="col-lg-4 col-12">
                <!-- Start Single features -->
                <div class="single-features">
                    <div class="signle-icon">
                        <i class="icofont icofont-medical-sign-alt"></i>
                    </div>
                    <h3>Enriched Pharmecy</h3>
                    <p>Explore our enriched pharmacy services designed to meet all your healthcare needs.</p>
                </div>
                <!-- End Single features -->
            </div>
            <div class="col-lg-4 col-12">
                <!-- Start Single features -->
                <div class="single-features last">
                    <div class="signle-icon">
                        <i class="icofont icofont-stethoscope"></i>
                    </div>
                    <h3>Medical Treatment</h3>
                    <p>Experience personalized and compassionate treatment at our facility.</p>
                </div>
                <!-- End Single features -->
            </div>
        </div>
    </div>
</section>
<!--/ End Feautes -->

<!-- Start Fun-facts -->
<div id="fun-facts" class="fun-facts section overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-home"></i>
                    <div class="content">
                        <span class="counter">3468</span>
                        <p>Hospital Rooms</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-user-alt-3"></i>
                    <div class="content">
                        <span class="counter">557</span>
                        <p>Specialist Doctors</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont-simple-smile"></i>
                    <div class="content">
                        <span class="counter">4379</span>
                        <p>Happy Patients</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-table"></i>
                    <div class="content">
                        <span class="counter">32</span>
                        <p>Years of Experience</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
        </div>
    </div>
</div>
<!--/ End Fun-facts -->

<!-- Start Why choose -->
<section class="why-choose section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Offer Different Services To Improve Your Health</h2>
                    {{-- <img src="{{ asset('img/section-img.png') }}" alt="#"> --}}
                    <p>Explore a range of services crafted to enhance your health and well-being.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <!-- Start Choose Left -->
                <div class="choose-left">
                    <h3>Who We Are</h3>
                    <p>At Digital Clinic, we are dedicated to providing exceptional healthcare services with a focus on compassion and excellence. Our commitment to your well-being extends beyond conventional practices, ensuring that you receive personalized care tailored to your unique needs.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list">
                                <li><i class="fa fa-caret-right"></i>Committed to your well-being.</li>
                                <li><i class="fa fa-caret-right"></i>Striving for excellence.</li>
                                <li><i class="fa fa-caret-right"></i>Personalized care plans.</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list">
                                <li><i class="fa fa-caret-right"></i>Emphasizing compassion.</li>
                                <li><i class="fa fa-caret-right"></i>Continuous pursuit.</li>
                                <li><i class="fa fa-caret-right"></i>Building a healthier community.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Choose Left -->
            </div>
            <div class="col-lg-6 col-12">
                <!-- Start Choose Rights -->
                <div class="choose-right">
                    <div class="video-image">
                        <!-- Video Animation -->
                        <div class="promo-video">
                            <div class="waves-block">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                        </div>
                        <!--/ End Video Animation -->
                        <a href="https://www.youtube.com/watch?v=RFVXy6CRVR4" class="video video-popup mfp-iframe"><i
                                class="fa fa-play"></i></a>
                    </div>
                </div>
                <!-- End Choose Rights -->
            </div>
        </div>
    </div>
</section>
<!--/ End Why choose -->

<!-- Start Call to action -->
<section id="contact" class="call-action overlay" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content">
                    <h2>For Immediate Emergency Medical Care, Call Us at 1234 56789</h2>
                    <p>At Digital Clinic, we understand that emergencies require an expert attention.</p>
                    <div class="button">
                        <a href="{{ url('/contact') }}" class="btn">Contact Now</a>
                        <a href="#" class="btn second">Learn More<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Call to action -->

<!-- Start portfolio -->
<section class="portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Our Commitment to a Clean and Safe Environment</h2>
                    {{-- <img src="{{ asset('img/section-img.png') }}" alt="#"> --}}
                    <p>At Digital Clinic, we prioritize the health and safety of our patients and staff.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel portfolio-slider">
                    <div class="single-pf">
                        <img src="{{ asset('img/pf1.jpg') }}" alt="#">
                        <a href="#" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="{{ asset('img/pf2.jpg') }}" alt="#">
                        <a href="#" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="{{ asset('img/pf3.jpg') }}" alt="#">
                        <a href="#" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="{{ asset('img/pf4.jpg') }}" alt="#">
                        <a href="#" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="{{ asset('img/pf1.jpg') }}" alt="#">
                        <a href="#" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="{{ asset('img/pf2.jpg') }}" alt="#">
                        <a href="#" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="{{ asset('img/pf3.jpg') }}" alt="#">
                        <a href="#" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="{{ asset('img/pf4.jpg') }}" alt="#">
                        <a href="#" class="btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End portfolio -->

<!-- Start service -->
<section class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Comprehensive Healthcare Services for your well-being</h2>
                    {{-- <img src="{{ asset('img/section-img.png') }}" alt="#"> --}}
                    <p>Experience a range of tailored healthcare services designed to enhance your well-being at Digitial Clinic.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-prescription"></i>
                    <h4><a href="#">General Treatment</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-tooth"></i>
                    <h4><a href="#">Teeth Whitening</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-heart-alt"></i>
                    <h4><a href="#">Heart Surgery</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-listening"></i>
                    <h4><a href="#">Ear Treatment</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-eye-alt"></i>
                    <h4><a href="#">Vision Problems</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-blood"></i>
                    <h4><a href="#">Blood Transfusion</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!--/ End service -->

<!-- Start Departments Area -->
<section class="departments section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Offer Different Departments To Diagnose Your Diseases</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="department-tab">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#t-tab1"
                                role="tab" aria-selected="true"><i class="icofont-heart-beat"></i><span
                                    class="first">Cardiac Clinic</span><span class="second">Lorem
                                    Sit</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab2" role="tab"
                                aria-selected="false"><i class="icofont-brain-alt"></i><span
                                    class="first">Neurology</span><span class="second">Quis Est</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab3" role="tab"
                                aria-selected="false"><i class="icofont-tooth"></i><span
                                    class="first">Dentistry</span><span class="second">Sit Dolor</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab4" role="tab"
                                aria-selected="false"><i class="icofont-heart-beat"></i><span
                                    class="first">Gastroenterology</span><span class="second">Lorem
                                    Sit</span></a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#t-tab5" role="tab"
                                aria-selected="false"><i class="icofont-bone"></i><span
                                    class="first">Orthopedagogy</span><span class="second">Lorem
                                    Sit</span></a></li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade active show" id="t-tab1" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Cardiac Clinic</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            pharetra ante vel est lobortis, a commodo magna rhoncus. In quis
                                            nisi non quam pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh.
                                                Curabitur pharetra luctus est, sit amet aliquam ex posuere id.
                                            </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est
                                                lobortis</li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet,
                                                consectetur.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="{{ asset('img/department.jpg') }}" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="t-tab2" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Neurology</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            pharetra ante vel est lobortis, a commodo magna rhoncus. In quis
                                            nisi non quam pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh.
                                                Curabitur pharetra luctus est, sit amet aliquam ex posuere id.
                                            </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est
                                                lobortis</li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet,
                                                consectetur.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="img/department.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="t-tab3" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Dentistry</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            pharetra ante vel est lobortis, a commodo magna rhoncus. In quis
                                            nisi non quam pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh.
                                                Curabitur pharetra luctus est, sit amet aliquam ex posuere id.
                                            </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est
                                                lobortis</li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet,
                                                consectetur.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="img/department.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="t-tab4" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Gastroenterology</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            pharetra ante vel est lobortis, a commodo magna rhoncus. In quis
                                            nisi non quam pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh.
                                                Curabitur pharetra luctus est, sit amet aliquam ex posuere id.
                                            </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est
                                                lobortis</li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet,
                                                consectetur.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="img/department.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="t-tab5" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="department-left">
                                        <h3>Orthopedagogy</h3>
                                        <p class="p1">“Vivamus ut tellus sed tellus finibus egestas. Mauris
                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                            pharetra ante vel est lobortis, a commodo magna rhoncus. In quis
                                            nisi non quam pharetra commodo. </p>
                                        <ul class="list">
                                            <li><i class="fa fa-check"></i>Maecenas vitae luctus nibh.
                                                Curabitur pharetra luctus est, sit amet aliquam ex posuere id.
                                            </li>
                                            <li><i class="fa fa-check"></i> Maecenas pharetra ante vel est
                                                lobortis</li>
                                            <li><i class="fa fa-check"></i>Lorem ipsum dolor sit amet,
                                                consectetur.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="department-right">
                                        <img src="img/department.jpg" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End -->

<!-- Pricing Table -->
<section class="pricing-table section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Provide You The Best Treatment In Resonable Price</h2>
                    {{-- <img src="{{ asset('img/section-img.png') }}" alt="#"> --}}
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="single-table">
                    <!-- Table Head -->
                    <div class="table-head">
                        <div class="icon">
                            <i class="icofont icofont-ui-cut"></i>
                        </div>
                        <h4 class="title">Plastic Suggery</h4>
                        <div class="price">
                            <p class="amount">$199<span>/ Per Visit</span></p>
                        </div>
                    </div>
                    <!-- Table List -->
                    <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i>Lorem ipsum dolor sit</li>
                        <li><i class="icofont icofont-ui-check"></i>Cubitur sollicitudin fentum</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Nullam interdum enim</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Donec ultricies metus</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Pellentesque eget nibh</li>
                    </ul>
                    <div class="table-bottom">
                        <a class="btn" href="{{ url('profile/appointment') }}">Book Now</a>
                    </div>
                    <!-- Table Bottom -->
                </div>
            </div>
            <!-- End Single Table-->
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="single-table">
                    <!-- Table Head -->
                    <div class="table-head">
                        <div class="icon">
                            <i class="icofont icofont-tooth"></i>
                        </div>
                        <h4 class="title">Teeth Whitening</h4>
                        <div class="price">
                            <p class="amount">$299<span>/ Per Visit</span></p>
                        </div>
                    </div>
                    <!-- Table List -->
                    <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i>Lorem ipsum dolor sit</li>
                        <li><i class="icofont icofont-ui-check"></i>Cubitur sollicitudin fentum</li>
                        <li><i class="icofont icofont-ui-check"></i>Nullam interdum enim</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Donec ultricies metus</li>
                        <li class="cross"><i class="icofont icofont-ui-close"></i>Pellentesque eget nibh</li>
                    </ul>
                    <div class="table-bottom">
                        <a class="btn" href="{{ url('profile/appointment') }}">Book Now</a>
                    </div>
                    <!-- Table Bottom -->
                </div>
            </div>
            <!-- End Single Table-->
            <!-- Single Table -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="single-table">
                    <!-- Table Head -->
                    <div class="table-head">
                        <div class="icon">
                            <i class="icofont-heart-beat"></i>
                        </div>
                        <h4 class="title">Heart Suggery</h4>
                        <div class="price">
                            <p class="amount">$399<span>/ Per Visit</span></p>
                        </div>
                    </div>
                    <!-- Table List -->
                    <ul class="table-list">
                        <li><i class="icofont icofont-ui-check"></i>Lorem ipsum dolor sit</li>
                        <li><i class="icofont icofont-ui-check"></i>Cubitur sollicitudin fentum</li>
                        <li><i class="icofont icofont-ui-check"></i>Nullam interdum enim</li>
                        <li><i class="icofont icofont-ui-check"></i>Donec ultricies metus</li>
                        <li><i class="icofont icofont-ui-check"></i>Pellentesque eget nibh</li>
                    </ul>
                    <div class="table-bottom">
                        <a class="btn" href="{{ url('profile/appointment') }}">Book Now</a>
                    </div>
                    <!-- Table Bottom -->
                </div>
            </div>
            <!-- End Single Table-->
        </div>
    </div>
</section>
<!--/ End Pricing Table -->

@if ($feedbacks)
<!-- Start Testimonial Area -->
<section class="blog section" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>What Our Patients Say About Our Medical Treatments</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($feedbacks as $feedback)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Blog -->
                <div class="single-news">
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date">
                                {{ Carbon\Carbon::parse($feedback->created_at)->format('d M, Y'); }}
                            </div>
                            <h2> {{ $feedback->patient->name }} </h2>
                            <p class="text">{{ $feedback->comments }}</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Testimonial Area -->
@endif
<!-- Start clients -->
<div class="clients overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="owl-carousel clients-slider">
                    <div class="single-clients">
                        <img src="{{ asset('img/client1.png') }}" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="{{ asset('img/client2.png') }}" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="{{ asset('img/client3.png') }}" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="{{ asset('img/client4.png') }}" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="{{ asset('img/client5.png') }}" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="{{ asset('img/client1.png') }}" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="{{ asset('img/client2.png') }}" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="{{ asset('img/client3.png') }}" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="{{ asset('img/client4.png') }}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Ens clients -->

<!-- Start Newsletter Area -->
<section class="newsletter section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6  col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-text ">
                    <h6>Sign up for newsletter</h6>
                    <p class="">Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu,<br> homero
                        alterum.</p>
                </div>
                <!-- End Newsletter Form -->
            </div>
            <div class="col-lg-6  col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-form ">
                    <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                        <input name="EMAIL" placeholder="Your email address" class="common-input"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'"
                            required="" type="email">
                        <button class="btn">Subscribe</button>
                    </form>
                </div>
                <!-- End Newsletter Form -->
            </div>
        </div>
    </div>
</section>
<!-- /End Newsletter Area -->
@include('components/footer')
