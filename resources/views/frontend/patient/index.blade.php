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
                            <li class="breadcrumb-item"><a href="{{ url('profile') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url('profile') }}">Dashboard</a></li>
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
    {{-- {{-- <div style="height: 25rem;">
        <h2>Patient Dashboard</h2>
    </div> --}}
    <!-- Footer --> --}}
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
