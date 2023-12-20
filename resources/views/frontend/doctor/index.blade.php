@extends('components/doctor_layout')
@section('title', 'Digital Clinic | Doctor Dashboard')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav ria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('doctor/dashboard') }}">
                                        <i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('doctor/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Doctor Dashboard</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h1 d-inline-block mb-0">Doctor Dashboard</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row" style="height: 31rem;">
            <div class="col-xl-4 col-md-6">
                <div class="card card-stats pt-3 pb-2">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-2">Registered Patients</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $total_patients }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card card-stats pt-3 pb-2">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-2">Patient Health Records</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $health_records }}</span>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('health-record.index') }}">
                                    <div class="icon icon-shape bg-gradient-pink text-white rounded-circle shadow">
                                        <i class="fa fa-medkit" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card card-stats pt-3 pb-2">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-2">Future Appointments</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $future_appointments }}</span>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('doctor.appointments') }}">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="fa fa-clock" aria-hidden="true"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
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
