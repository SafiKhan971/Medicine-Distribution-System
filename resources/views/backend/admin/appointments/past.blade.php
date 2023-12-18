@extends('components/admin_layout')
@section('title', 'Digital Clinic | Past Appointments')
@section('header')
<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                        <ol class="breadcrumb breadcrumb-links">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Past Appointments</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Past Appointments</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    @include('flash::message')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sr.No</th>
                                <th>Doctor Name</th>
                                <th>Patient Name</th>
                                <th>Date / Time</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $serial_no = 1;
                            @endphp
                            @foreach($past_appointments as $appointment)
                            <tr>
                                <td>{{ $serial_no++ }}</td>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ $appointment->patient->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->app_dt_start)->format('M j, Y - h:i A') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
