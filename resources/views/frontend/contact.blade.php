@include('components/header')
@include('components/navbar')

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Contact Us</h2>
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact Us -->
<section class="contact-us section">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-us-left">
                        <!--Start Google-map -->
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=Lahore&t=k&z=10&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                    href="https://2yu.co">2yu</a><br>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 100%;
                                        width: 100%;
                                    }
                                </style><a href="https://embedgooglemap.2yu.co/">html embed google map</a>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                        height: 100%;
                                        width: 100%;
                                    }
                                </style>
                            </div>
                        </div>
                        <!--/End Google-map -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-form">
                        <h2>Contact Us</h2>
                        <p>If you have any questions please fell free to contact with us.</p>
                        <!-- Form -->
                        <form class="form" method="post" action="mail/mail.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" placeholder="Name" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="phone" placeholder="Phone" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" placeholder="Subject" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Your Message" required=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-info">
            <div class="row">
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont icofont-ui-call"></i>
                        <div class="content">
                            <h3>+(92) 1234 56789</h3>
                            <p>info@digitalclinic.com</p>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont-google-map"></i>
                        <div class="content">
                            <h3>Lahore</h3>
                            <p>Lahore, Punjab</p>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont icofont-wall-clock"></i>
                        <div class="content">
                            <h3>Mon - Sat: 8am - 5pm</h3>
                            <p>Sunday Closed</p>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
            </div>
        </div>
    </div>
</section>
<!--/ End Contact Us -->

@include('components/footer')
