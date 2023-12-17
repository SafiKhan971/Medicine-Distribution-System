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
                                <li class="breadcrumb-item active" aria-current="page">Create a Health Record</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Create a Health Record</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid mt--6">
        <div>
            <form id="myForm" action="{{ route('profile.create.record') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <h2>Medical History</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="pmc">Past Medical Conditions <small>(Chronic
                                            illnesses, Surgeries, Allergies)</small></label>
                                    <textarea class="form-control form-control-sm" name="past_medical_condition" id="pmc"
                                        placeholder="Past Medical Conditions" rows="3">{{ $record->past_medical_condition ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="pmdc">Present Medical Conditions</label>
                                    <textarea class="form-control form-control-sm" name="present_medical_condition" id="pmdc"
                                        placeholder="Present Medical Conditions" rows="3">{{ $record->present_medical_condition ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="medications">Medications <small>(Current and
                                            Past)</small></label>
                                    <textarea class="form-control form-control-sm" name="medications" id="medications" placeholder="Medications"
                                        rows="3">{{ $record->medications ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="hcp">Health Care Providers
                                        <small>(Specialists)</small></label>
                                    <textarea class="form-control form-control-sm" name="healthcare_providers" id="hcp"
                                        placeholder="Health Care Providers" rows="3">{{ $record->healthcare_providers ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h2>Vital Signs</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bp" class="form-control-label">Blood Pressure</label>
                                    <input class="form-control form-control-sm" value="{{ $record->blood_pressure ?? '' }}"
                                        name="blood_pressure" type="number" placeholder="Blood Pressure" id="bp">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hr" class="form-control-label">Heart Rate</label>
                                    <input class="form-control form-control-sm" value="{{ $record->heart_rate ?? '' }}"
                                        name="heart_rate" type="number" placeholder="Heart Rate" id="hr">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rr" class="form-control-label">Respiratory Rate</label>
                                    <input class="form-control form-control-sm"
                                        value="{{ $record->respiratory_rate ?? '' }}" name="respiratory_rate" type="number"
                                        placeholder="Respiratory Rate" id="rr">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="temp" class="form-control-label">Temprature</label>
                                    <input class="form-control form-control-sm" value="{{ $record->temprature ?? '' }}"
                                        name="temprature" type="number" placeholder="Temprature" id="temp">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="wt" class="form-control-label">Weight</label>
                                    <input class="form-control form-control-sm" value="{{ $record->weight ?? '' }}"
                                        name="weight" type="number" placeholder="Weight" id="wt">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h2>Other Information</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="lsi">Life Style Information
                                        <small>(Smoking/Alcohol Habits, Diet Preferences)</small></label>
                                    <textarea class="form-control form-control-sm" name="lifestyle_info" id="lsi"
                                        placeholder="Life Style Information" rows="3">{{ $record->lifestyle_info ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="docs">Documents <small>(Laboratory Results,
                                            Prescriptions)</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input custom-file-input-sm"
                                            name="documents[]" multiple id="docs" lang="en">
                                        <label class="custom-file-label" for="docs">Select file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="cmnts">Comments
                                        <small>(Symptoms, Current Health Issues)</small></label>
                                    <textarea name="comments" id="comments" rows="3" placeholder="Write Here ...">{{ $record->comments ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-sm"> Submit </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
