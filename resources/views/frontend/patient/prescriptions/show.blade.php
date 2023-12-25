@extends('components/patient_layout')
@section('title', 'Digital Clinic | Doctor Prescription')
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
                                <li class="breadcrumb-item active" aria-current="page">View Doctor Prescription</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">View Doctor Prescription</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid mt--6">
        <div class="card mb-4">
            <div class="card-body">
                @foreach ($prescriptions as $prescription)
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bp" class="form-control-label">Doctor Name</label>
                            <input class="form-control form-control-sm" value="{{ $prescription->doctor->name }}" readonly />
                        </div>
                        <div class="col-md-6">
                            <label for="bp" class="form-control-label">Medicine</label>
                            <input class="form-control form-control-sm" value="{{ $prescription->medicine_name }}" readonly />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="bp" class="form-control-label">Dosage</label>
                            <input class="form-control form-control-sm" value="{{$prescription->dosage }} - {{$prescription->unit}}" readonly />
                        </div>
                        <div class="col-md-6">
                            <label for="bp" class="form-control-label">Duration</label>
                            <input class="form-control form-control-sm" value="{{ $prescription->duration }}" readonly />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
