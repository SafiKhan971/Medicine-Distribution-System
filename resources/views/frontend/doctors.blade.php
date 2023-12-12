@include('components/header')
@include('components/navbar')

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Meet Our Qualified Doctors</h2>
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Doctors</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Doctors Start -->
<section id="team" class="team section single-page">
    <div class="container">
        <div class="row">
            @if ($doctors)
                @foreach ($doctors as $doctor)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-team">
                            <div class="t-head">
                                <img src="{{ asset('storage/doctorfiles/' . ($doctor->profile_picture ? $doctor->profile_picture : 'img/team1.jpg')) }}" alt="Profile Picture">
                                <div class="t-icon">
                                    <a href="{{ url('profile/appointment') }}" class="btn">Get Appointment</a>
                                </div>
                            </div>
                            <div class="t-bottom">
                                <p>{{ $doctor->specialization }}</p>
                                <h2><a href="doctor-details.html">{{ $doctor->name }}</a></h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p> No Doctor Found. </p>
            @endif
            {{-- <div class="col-lg-4 col-md-6 col-12">

                <div class="single-team">
                    <div class="t-head">
                        <img src="{{ asset('img/team1.jpg') }}" alt="#">
                        <div class="t-icon">
                            <a href="{{ url('profile/appointment') }}" class="btn">Get Appointment</a>
                        </div>
                    </div>
                    <div class="t-bottom">
                        <p>Neurosurgeon</p>
                        <h2><a href="doctor-details.html">Collis Molate</a></h2>
                    </div>
                </div>

            </div> --}}
            {{-- <div class="col-lg-4 col-md-6 col-12">

                <div class="single-team">

                    <div class="t-head">
                        <img src="{{ asset('img/team1.jpg') }}" alt="#">
                        <div class="t-icon">
                            <a href="appointment.html" class="btn">Get Appointment</a>
                        </div>
                    </div>

                    <div class="t-bottom">
                        <p>Neurosurgeon</p>
                        <h2><a href="doctor-details.html">Domani Plavon</a></h2>
                    </div>

                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-12">

                <div class="single-team">

                    <div class="t-head">
                        <img src="{{ asset('img/team1.jpg') }}" alt="#">
                        <div class="t-icon">
                            <a href="appointment.html" class="btn">Get Appointment</a>
                        </div>
                    </div>

                    <div class="t-bottom">
                        <p>Dental Surgeon</p>
                        <h2><a href="doctor-details.html">John Mard</a></h2>
                    </div>

                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-12">

                <div class="single-team">

                    <div class="t-head">
                        <img src="{{ asset('img/team1.jpg') }}" alt="#">
                        <div class="t-icon">
                            <a href="appointment.html" class="btn">Get Appointment</a>
                        </div>
                    </div>

                    <div class="t-bottom">
                        <p>Neurosurgeon</p>
                        <h2><a href="doctor-details.html">Amanal Frond</a></h2>
                    </div>

                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-12">

                <div class="single-team">
                    <div class="t-head">
                        <img src="{{ asset('img/team1.jpg') }}" alt="#">
                        <div class="t-icon">
                            <a href="appointment.html" class="btn">Get Appointment</a>
                        </div>
                    </div>
                    <div class="t-bottom">
                        <p>Neurosurgeon</p>
                        <h2><a href="doctor-details.html">Collis Molate</a></h2>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-12">

                <div class="single-team">

                    <div class="t-head">
                        <img src="{{ asset('img/team1.jpg') }}" alt="#">
                        <div class="t-icon">
                            <a href="appointment.html" class="btn">Get Appointment</a>
                        </div>
                    </div>

                    <div class="t-bottom">
                        <p>Neurosurgeon</p>
                        <h2><a href="doctor-details.html">Domani Plavon</a></h2>
                    </div>

                </div>

            </div> --}}
        </div>
    </div>
</section>
<!-- Doctors End -->

@include('components/footer')
