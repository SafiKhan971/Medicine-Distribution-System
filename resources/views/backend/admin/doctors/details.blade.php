@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Doctor Details')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Doctor Details</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Doctor Details</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="card mb-4">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('admin/doctors') }}" class="btn btn-secondary btn-sm float-right">Back</a>
                    </div>
                </div>
                <h6 class="heading-small text-muted mb-2">Personal Information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" id="name"
                                    value="{{ $doctor['name'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email"
                                    value="{{ $doctor['email'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="phone_no">Phone No</label>
                                <input type="text" class="form-control form-control-sm" id="phone_no"
                                    value="{{ $doctor['phone_no'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="phone_no">Nationality</label>
                                <input type="text" class="form-control form-control-sm" id="nationality"
                                    value="{{ $doctor['nationality'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Date of Birth</label>
                                <input type="date" class="form-control form-control-sm" id="name"
                                    value="{{ $doctor['dob'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-control-label" for="gender">Gender</label>
                            <input type="text" class="form-control form-control-sm" id="name"
                                value="{{ ucwords($doctor['gender']) }}">
                        </div>
                        <div class="col-md-3 mt-lg-3">
                            <label class="form-control-label" for="profile_picture">Profile Picture</label>
                            {{-- <img src="{{ asset('storage/doctorfiles/' . $doctor['profile_picture']) }}" width="50px"
                                height="50px" alt="" data-action="zoom"> --}}
                            <a href="{{ asset('storage/doctorfiles/' . $doctor['profile_picture']) }}" data-fancybox
                                target="_blank">
                                <img src="{{ asset('storage/doctorfiles/' . $doctor['profile_picture']) }}" width="50px"
                                    height="50px" alt="{{ $doctor['profile_picture'] }}">
                            </a>
                        </div>
                        <div class="col-md-3 mt-lg-3">
                            <label class="form-control-label" for="medical_license_picture">Medical License</label>
                            {{-- <img src="{{ asset('storage/doctorfiles/' . $doctor['medical_license_picture']) }}"
                                width="50px" height="50px" alt="" data-action="zoom"> --}}
                            <a href="{{ asset('storage/doctorfiles/' . $doctor['medical_license_picture']) }}"
                                data-fancybox target="_blank">
                                <img src="{{ asset('storage/doctorfiles/' . $doctor['medical_license_picture']) }}"
                                    width="50px" height="50px" alt="{{ $doctor['medical_license_picture'] }}">
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="ml-lg-4 mt-1 mb-3">
                <h6 class="heading-small text-muted mb-2">Professional Information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="medical_license_no">Medical License No</label>
                                <input type="text" class="form-control form-control-sm" id="medical_license_no"
                                    value="{{ $doctor['medical_license_no'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="specialization">Specialization</label>
                                <input type="text" class="form-control form-control-sm" id="specialization"
                                    value="{{ $doctor['specialization'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="experience">Experience <small
                                        class="text-muted">(in
                                        Years)</small></label>
                                <input type="number" class="form-control form-control-sm" id="experience"
                                    value="{{ $doctor['experience'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="board_certifications">
                                    Board of certifications
                                </label>
                                <input type="text" class="form-control form-control-sm" id="board_certifications"
                                    value="{{ $doctor['board_certifications'] }}">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="ml-lg-4 mt-1 mb-3">
                <h6 class="heading-small text-muted mb-2">Clinic / Hospital Affiliation Information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="clinic_name">Name of Clinic / Hospital</label>
                                <input type="text" class="form-control form-control-sm" id="clinic_name"
                                    value="{{ $doctor['clinic_name'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="clinic_email">Clinic / Hospital Email</label>
                                <input type="text" class="form-control form-control-sm" id="clinic_email"
                                    value="{{ $doctor['clinic_email'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="clinic_phone">Clinic / Hospital Phone #</label>
                                <input type="text" class="form-control form-control-sm" id="clinic_phone"
                                    value="{{ $doctor['clinic_phone'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="clinic_address">Clinic / Hospital Address</label>
                                <input type="text" class="form-control form-control-sm" id="clinic_address"
                                    value="{{ $doctor['clinic_address'] }}">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="ml-lg-4 mt-1 mb-3">
                <h6 class="heading-small text-muted mb-2">Availability Information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="days_week">Days Of week</label>
                                <input type="text" class="form-control form-control-sm" id="days_week"
                                    value="{{ $doctor['days_week'] }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="start_time">Start Time</label>
                                <input type="text" class="form-control form-control-sm" id="start_time"
                                    value="{{ \Carbon\Carbon::parse($doctor['start_time'])->format('h:i A') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label" for="end_time">End Time</label>
                                <input type="text" class="form-control form-control-sm" id="end_time"
                                    value="{{ \Carbon\Carbon::parse($doctor['end_time'])->format('h:i A') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
