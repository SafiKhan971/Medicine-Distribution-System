@include('components/header')
@include('components/navbar')
{{-- <div class="mb-5 container-fluid">
    <form action="{{ route('profile.create.appointment') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <label for="doctor">Select Doctor</label><br>
                <select id="doctor" class="form-select" name="doctor_id">
                    <option disabled selected>Choose ...</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-8">
                <label for="datetimepicker">Select Date and Time:</label>
                <input type="datetime-local" class="form-control" name="app_date_time">
            </div>
            <div class="col-md-8">
                <button class="btn" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div> --}}


<!-- Start Appointment -->
<section class="appointment" id="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Are Always Ready to Help You. Book An Appointment</h2>
                    <img src="{{ asset('img/section-img.png') }}" alt="#">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form class="form" action="{{ route('profile.create.appointment') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="name" type="text" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="phone" type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <select id="doctor" class="form-control" name="doctor_id">
                                    <option disabled selected="" value="">Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <input type="datetime-local" name="app_date_time">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="form-group">
                                <div class="button">
                                    <button type="submit" class="btn">Book An Appointment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 ">
                <div class="appointment-image">
                    <img src="{{ asset('img/contact-img.png') }}" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Appointment -->

@include('components/footer');
