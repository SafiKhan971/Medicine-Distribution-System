@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Edit Appointment')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ url('profile') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('profile') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Appointment</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Edit Appointment</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid mt--6">
        <div class="card mb-4">
            <form action="{{ route('admin.edit.appointment', $appointment->id) }}" method="post">
                @csrf
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-start">
                            <a href="{{ url('admin/appointments') }}" class="btn btn-secondary btn-sm float-right">Back</a>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="doctor">Doctor</label>
                                <select class="form-control form-control-sm" name="doctor_id" id="doctor">
                                    <option value=""> Please Select </option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            @if ($doctor->id == $appointment->doctor->id) selected @endif> {{ $doctor->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_time" class="form-control-label">Date / Time</label>
                                <input class="form-control form-control-sm" type="datetime-local" name="app_date_time"
                                    value="{{ $appointment->app_dt_start }}" id="date_time">
                            </div>
                        </div>

                        <div class="col-md-12 text-start">
                            <button type="submit" class="btn btn-primary btn-sm"> Update </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="copyright text-center text-muted">
                        &copy; 2023 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                            target="_blank">Digital Clinic</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
