@extends('components/doctor_layout')
@section('title', 'Digital Clinic | Create Prescription')
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
                            <li class="breadcrumb-item active" aria-current="page">Create Prescription</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Create Prescription</h6>
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
            <form method="POST" action="{{ route('prescriptions.store') }}">
                @csrf
                <div class="row">

                    <!-- PATIENT ID -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="pid">
                                Patient ID
                            </label>
                            <input class="form-control" name="patient_id" type="number" placeholder="Enter Patient ID" id="pid">
                        </div>
                    </div>

                    <!-- MEDICINE NAME -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="medicine_name">
                                Medicine Name
                            </label>
                            <input class="form-control" name="medicine_name" type="text" placeholder="Enter Medicine Name" id="medicine_name">
                        </div>
                    </div>

                    <!-- FREQUENCY -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label" for="frequency">Select Frequency</label>
                            <select class="form-control" name="frequency" id="frequency">
                                <option value="" selected disabled>Select a Frequency</option>
                                <option value="Once Daily">Once Daily</option>
                                <option value="Twice Daily">Twice Daily</option>
                                <option value="TID">TID</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- DOSAGE -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="dosage">
                                Dosage
                            </label>
                            <input class="form-control" name="dosage" type="text" placeholder="Enter Dosage" id="dosage">
                        </div>
                    </div>

                    <!-- UNIT -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="unit">Select Unit</label>
                            <select class="form-control" name="unit" id="unit">
                                <option value="" selected disabled>Select a unit</option>
                                <option value="mg">Milligrams (mg)</option>
                                <option value="g">Grams (g)</option>
                                <option value="mcg">Micrograms (mcg)</option>
                                <option value="ml">Milliliters (ml)</option>
                                <option value="teaspoon">Teaspoon</option>
                                </option>
                            </select>
                        </div>
                    </div>


                    <!-- ROUTE OF ADMINISTRATION -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="route_of_administration">Select Route of Administration</label>
                            <select class="form-control" name="route_of_administration" id="route_of_administration">
                                <option value="" selected disabled>Select a Route of Administration</option>
                                <option value="Oral">Oral</option>
                                <option value="Injection">Injection</option>
                                <option value="Topical">Topical</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- DURATION -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="duration">Select Duration</label>
                            <select class="form-control" name="duration" id="duration">
                                <option value="" selected disabled>Select a Duration</option>
                                <option value="3 Days">3 Days</option>
                                <option value="7 Days">7 Days</option>
                                <option value="2 Weeks">2 Weeks</option>
                            </select>
                        </div>
                    </div>

                    <!-- ADDITIONAL INSTRUCTIONS -->
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="form-control-label" for="instructions">Additional Instructions</label>
                            <textarea class="form-control form-control-sm" name="additional_instructions" id="instructions" placeholder="Write Additional Instructions" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
