@extends('components/doctor_layout')
@section('title', 'Digital Clinic | Update Prescription')
@section('header')
<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                        <ol class="breadcrumb breadcrumb-links">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url('doctor/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Update Prescription</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Update Prescription</h6>
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
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ route('prescriptions.index') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
            <form method="POST" action="{{ url('doctor/prescriptions/' . $prescription->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- PATIENT ID -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="pid">Patient</label>
                            <select name="patient_id" class="form-control form-control-sm" id="pid">
                                <option value="" disabled>Please Select</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ $prescription->user_id == $patient->id ? 'selected' : '' }} > {{ $patient->name }}</option>
                                @endforeach
                            </select>
                            {{-- <input class="form-control form-control-sm" name="patient_id" type="text" placeholder="Enter Patient ID" id="pid" value="{{ $prescription->user_id }}"> --}}
                        </div>
                    </div>

                    <!-- MEDICINE NAME -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="medicine_name">Medicine Name</label>
                            <input class="form-control form-control-sm" name="medicine_name" type="text" placeholder="Enter Medicine Name" id="medicine_name" value="{{ $prescription->medicine_name }}">
                        </div>
                    </div>

                    <!-- FREQUENCY -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="frequency">Frequency</label>
                            <select class="form-control form-control-sm" name="frequency" id="frequency">
                                <option value="" disabled>Please Select</option>
                                <option value="Once Daily" {{ $prescription->frequency == 'Once Daily' ? 'selected' : '' }}>Once Daily</option>
                                <option value="Twice Daily" {{ $prescription->frequency == 'Twice Daily' ? 'selected' : '' }}>Twice Daily</option>
                                <option value="TID" {{ $prescription->frequency == 'TID' ? 'selected' : '' }}>TID</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- DOSAGE -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="dosage">Dosage</label>
                            <input class="form-control form-control-sm" name="dosage" type="text" placeholder="Enter Dosage" id="dosage" value="{{ $prescription->dosage }}">
                        </div>
                    </div>

                    <!-- UNIT -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="unit">Unit</label>
                            <select class="form-control form-control-sm" name="unit" id="unit">
                                <option value="" disabled>Please Select</option>
                                <option value="mg" {{ $prescription->unit == 'mg' ? 'selected' : '' }}>Milligrams (mg)</option>
                                <option value="g" {{ $prescription->unit == 'g' ? 'selected' : '' }}>Grams (g)</option>
                                <option value="mcg" {{ $prescription->unit == 'mcg' ? 'selected' : '' }}>Micrograms (mcg)</option>
                                <option value="ml" {{ $prescription->unit == 'ml' ? 'selected' : '' }}>Milliliters (ml)</option>
                                <option value="teaspoon" {{ $prescription->unit == 'teaspoon' ? 'selected' : '' }}>Teaspoon</option>
                            </select>
                        </div>
                    </div>

                    <!-- ROUTE OF ADMINISTRATION -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="route_of_administration">Route of Administration</label>
                            <select class="form-control form-control-sm" name="route_of_administration" id="route_of_administration">
                                <option value="" disabled>Please Select</option>
                                <option value="Oral" {{ $prescription->route_of_administration == 'Oral' ? 'selected' : '' }}>Oral</option>
                                <option value="Injection" {{ $prescription->route_of_administration == 'Injection' ? 'selected' : '' }}>Injection</option>
                                <option value="Topical" {{ $prescription->route_of_administration == 'Topical' ? 'selected' : '' }}>Topical</option>
                            </select>
                        </div>
                    </div>

                    <!-- DURATION -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="duration">Duration</label>
                            <select class="form-control form-control-sm" name="duration" id="duration">
                                <option value="" disabled>Please Select</option>
                                <option value="3 Days" {{ $prescription->duration == '3 Days' ? 'selected' : '' }}>3 Days</option>
                                <option value="7 Days" {{ $prescription->duration == '7 Days' ? 'selected' : '' }}>7 Days</option>
                                <option value="2 Weeks" {{ $prescription->duration == '2 Weeks' ? 'selected' : '' }}>2 Weeks</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- ADDITIONAL INSTRUCTIONS -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label" for="instructions">Additional Instructions</label>
                            <textarea class="form-control form-control-sm" name="additional_instructions" id="instructions" placeholder="Write Additional Instructions" rows="3">{{ $prescription->additional_instructions }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
