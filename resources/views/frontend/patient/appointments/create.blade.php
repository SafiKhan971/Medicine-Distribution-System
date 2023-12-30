@include('components/header')
@include('components/navbar')
@include('notify::components.notify')

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Get Your Appointment</h2>
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Appointment</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Appointment -->
<section class="appointment" id="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Are Always Ready to Help You. Book An Appointment</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form class="form" action="{{ route('profile.create.appointment') }}" method="post">
                    @csrf
                    <div class="row">
                        @error('error')
                            <div style="color: red; margin-top: 10px">{{ $message }}</div>
                        @enderror
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="app_date_time">Select Doctor</label>
                                <select id="doctor" class="form-control wide" name="doctor_id">
                                    <option selected="" value="" required>Select Doctor</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"> {{ $doctor->name }} ({{ $doctor->specialization }}) </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="duty_timing">Duty Timing</label>
                                <input type="text" id="duty_timing" readonly="" placeholder="From - To" value="">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <label for="app_date_time">Select Date/Time</label>
                                <input type="datetime-local" name="app_date_time" required
                                    value=""{{ old('app_date_time') }}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="form-group">
                                <div class="button">
                                    <button type="submit" class="btn btn-primary">Book An Appointment</button>
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

<script>
    $(document).ready(function() {
        function updateDutyTiming() {
            var selectedDoctorId = $('#doctor').val();
            $.ajax({
                type: 'GET',
                url: '/getDutyTiming/' + selectedDoctorId,
                success: function(data) {
                    $('#duty_timing').val(data.duty_timing);
                },
                error: function(error) {
                    console.error('Error fetching duty timing:', error);
                }
            });
        }
        $('#doctor').change(updateDutyTiming);
    });
</script>

@include('components/footer');
