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
                            <li class="breadcrumb-item"><a href="{{url('profile')}}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url('profile')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Health Record</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Patient Health Record</h6>
                </div>
                <!-- <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">New</a>
                            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                        </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid mt--6">
    <div>
        <form action="{{route('profile.create.record')}}" method="post">
            @csrf
            <h2>Medical History</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="example3cols1Input">Past Medical Conditions <small>(Chronic illnesses, Surgeries, Allergies)</small> </label>
                        <form>
                            <div data-toggle="quill" data-quill-placeholder="Write Here ..."></div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="example3cols1Input">Present Medical Conditions</label>
                        <form>
                            <div data-toggle="quill" data-quill-placeholder="Write Here ..."></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="medications">Medications <small>(Current and Past)</small></label>
                        <textarea class="form-control" id="medications" placeholder="Medications" rows="3"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="hcp">Health Care Providers <small>(Specialists)</small></label>
                        <textarea class="form-control" id="hcp" placeholder="Health Care Providers" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <h2>Vital Signs</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bp" class="form-control-label">Blood Pressure</label>
                        <input class="form-control" type="number" placeholder="Blood Pressure" id="bp">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="hr" class="form-control-label">Heart Rate</label>
                        <input class="form-control" type="number" placeholder="Heart Rate" id="hr">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="rr" class="form-control-label">Respiratory Rate</label>
                        <input class="form-control" type="number" placeholder="Respiratory Rate" id="rr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="temp" class="form-control-label">Temprature</label>
                        <input class="form-control" type="number" placeholder="Temprature" id="temp">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="wt" class="form-control-label">Weight</label>
                        <input class="form-control" type="number" placeholder="Weight" id="wt">
                    </div>
                </div>
            </div>
            <hr>
            <h2>Other Information</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="lsi">Life Style Information <small>(Smoking/Alcohol Habits, Diet Preferences)</small></label>
                        <textarea class="form-control" id="lsi" placeholder="Life Style Information" rows="3"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label" for="docs">Documents <small>(Laboratory Results, Prescriptions)</small></label>
                        <form>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" lang="en">
                                <label class="custom-file-label" for="customFileLang">Select file</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label" for="cmnts">Comments <small>(Symptoms, Current Health Issues)</small></label>
                        <form>
                            <div data-toggle="quill" data-quill-placeholder="Write Here ..."></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>
        </form>


    </div>
    <!-- Footer -->
    <footer class="footer pt-0">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="copyright text-center text-muted">
                    &copy; 2023 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Digital Clinic</a>
                </div>
            </div>
            <!-- <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                        </li>
                    </ul>
                </div> -->
        </div>
    </footer>
</div>
@endsection