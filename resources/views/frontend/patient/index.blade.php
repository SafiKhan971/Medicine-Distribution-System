@extends('components/patient_layout')
@section('title', 'Digital Clinic | Patient Dashboard')
@section('header')
<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav ria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                        <ol class="breadcrumb breadcrumb-links">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url('/profile') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Patient Dashboard</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h1 d-inline-block mb-0">Patient Dashboard</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    @include('flash::message')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats pt-3 pb-2">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-2">Registered Doctors</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $total_doctors }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="fa fa-user-md" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats pt-3 pb-2">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-2">Future Appointments</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $future_appointments }}</span>
                        </div>
                        <div class="col-auto">
                            <a href="{{ url('profile/future-appointments') }}">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fa fa-clock" aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats pt-3 pb-2">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-2">Past Appointments</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $past_appointments }}</span>
                        </div>
                        <div class="col-auto">
                            <a href="{{ url('profile/past-appointments') }}">
                                <div class="icon icon-shape bg-gradient-gray text-white rounded-circle shadow">
                                    <i class="fa fa-history" aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats pt-3 pb-2">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-2">Total Feedbacks</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $total_feedbacks }}</span>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('profile.feedbacks') }}">
                                <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                                    <i class="fa fa-comments"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats pt-3 pb-2">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-2">Total Health Records</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $total_health_records }}</span>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('profile.health-records') }}">
                                <div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
                                    <i class="fa fa-medkit" aria-hidden="true"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer pt-0 mt-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="copyright text-center text-muted">
                    &copy; 2023 <a href="{{ url('/') }}" class="font-weight-bold ml-1">Digital Clinic</a>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
