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
                            <input class="form-control" name="patient_id" type="text" placeholder="Enter Patient ID" id="pid">
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

                    <!-- DOSAGE -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="dosage">
                            Dosage
                            </label>
                            <input class="form-control" name="dosage" type="text" placeholder="Enter Dosage" id="dosage">
                        </div>
                    </div>

                    <!-- SELECT UNIT -->
                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="unit">
                            Unit
                            </label>
                            <input class="form-control" name="unit" type="text" placeholder="Enter Unit" id="unit">
                        </div>
                    </div> -->
                </div>
                    
                    

                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var textarea = document.getElementById('Comments');
        var wordCountDisplay = document.getElementById('wordCount');
        var maxWords = 50;

        textarea.addEventListener('input', function() {
            var words = textarea.value.split(/\s+/).filter(function(word) {
                return word.length > 0;
            });

            if (words.length > maxWords) {
                textarea.value = words.slice(0, maxWords).join(' ');
            }

            wordCountDisplay.textContent = 'Word count: ' + words.length;
        });
    });
</script>
@endsection