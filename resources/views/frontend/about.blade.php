@include('components/header')
@include('components/navbar')
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>About Us</h2>
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start About Area -->
<section class="about-area section">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-lg-6 col-md-12 p-0">
                <div class="about-image">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0">
                <div class="about-content">
                    <span>About Us</span>
                    <h2>Digital Clinic</h2>
                    <p>DigitalClinic stands as a groundbreaking healthcare solution, seamlessly blending cutting-edge technology with compassion. Patients experience a paradigm shift in healthcare access through an intuitive platform where appointments are effortlessly booked, and video consultations connect them to medical experts. Doctors benefit from streamlined processes, managing appointments and health records with unprecedented ease. Administrators ensure platform integrity, completing a trifecta that transforms traditional healthcare into a digitally-driven, user-centric experience. In this narrative of innovation, DigitalClinic emerges as a beacon, reshaping the landscape of healthcare and fostering a healthier, more connected community.</p>
                    <ul>
                        <li><i class="icofont-tick-mark"></i> Scientific Skills For getting a better result</li>
                        <li><i class="icofont-tick-mark"></i> Communication Skills to getting in touch</li>
                        <li><i class="icofont-tick-mark"></i> A Career Overview opportunity Available</li>
                        <li><i class="icofont-tick-mark"></i> A good Work Environment For work</li>
                        <li><i class="icofont-tick-mark"></i> Scientific Skills For getting a better result</li>
                        <li><i class="icofont-tick-mark"></i> Communication Skills to getting in touch</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Vision Area -->
<section class="our-vision-area ptb-100 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-vision-box">
                    <div class="icon">
                        <i class="icofont-tick-mark"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>Our mission is to revolutionize healthcare accessibility through technology and empathy. We are committed to providing a user-centric platform that simplifies the healthcare journey, breaking down barriers for individuals seeking quality care. Through innovation and compassion, we aim to create a healthier, more connected world.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-vision-box">
                    <div class="icon">
                        <i class="icofont-tick-mark"></i>
                    </div>
                    <h3>Our Planning</h3>
                    <p>Our planning is strategic and forward-thinking, focusing on both short-term objectives and long-term goals. We prioritize adaptability, ensuring our approach remains agile in the dynamic landscape of our industry. This thoughtful strategy guides us toward sustainable growth and success.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-vision-box">
                    <div class="icon">
                        <i class="icofont-tick-mark"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>Our vision is to pioneer a future where healthcare is seamlessly accessible to all through cutting-edge technology and compassionate innovation. We envision a world where barriers to quality care are dismantled, fostering a global community that thrives on holistic well-being. The Platform you can trust.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Mission Area -->
<section class="our-mission-area ptb-100 pt-0">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-lg-6 col-md-12 p-0">
                <div class="our-mission-content">
                    <span class="sub-title">Our Mission &amp; Vision</span>
                    <h2>Better Information, Better Health</h2>
                    <p>Our mission is to redefine healthcare accessibility through technology and compassion. Our vision is a future where seamless, inclusive healthcare empowers individuals worldwide.</p>
                    <ul>
                        <li>
                            <div class="icon">
                                <i class="icofont-doctor"></i>
                            </div>
                            <span>Professional Staff</span>
                            Our professional staff, committed to excellence, ensures the highest standard of service in every aspect of healthcare.
                        </li>
                        <li>
                            <div class="icon">
                                <i class="icofont-kid"></i>
                            </div>
                            <span>Well Qualified Doctors</span>
                            Our team of well-qualified doctors brings expertise and dedication, ensuring top-notch healthcare for our patients.
                        </li>
                        <li>
                            <div class="icon">
                                <i class="icofont-laboratory"></i>
                            </div>
                            <span>Commitment to Patient-Centric Care</span>
                            Emphasizing our unwavering dedication to placing patients at the forefront, ensuring personalized and empathetic healthcare experiences.
                        </li>
                        <li>
                            <div class="icon">
                                <i class="icofont-tooth"></i>
                            </div>
                            <span>Excellence in Medical Services</span>
                            Striving for excellence in every aspect of medical services, ensuring the highest quality care for our patients.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0">
                <div class="our-mission-image">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Newsletter Area -->
<section class="newsletter section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6  col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-text ">
                    <h6>Sign up for newsletter</h6>
                    <p class="">Sign up for newsletter to get notifications about Discounts.</p>
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
@include('components/footer')
