@extends('components/patient_layout')
@section('title', 'Digital Clinic | Patient Dashboard')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/profile') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Patient Google Fit</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Patient Google Fit</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6 h-100">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ url('profile/google/login') }}" class="btn btn-primary btn-sm">View Google Fit Data</a>

        <div class="row mt-3">
            <div class="col-xl-6">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Users</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Audience overview</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-line" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Users</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Audience overview</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-pie" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xl-6">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Users</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Audience overview</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-doughnut" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Surtitle -->
                        <h6 class="surtitle">Users</h6>
                        <!-- Title -->
                        <h5 class="h3 mb-0">Audience overview</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
