@extends('components/patient_layout')
@section('title', 'Digital Clinic | Appointments')
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
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Appointments</h6>
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
                                <th>Sr.NO</th>
                                <th>Doctor</th>
                                <th>Date / Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $serial_no = 1;
                            @endphp
                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $serial_no++ }}</td>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ $appointment->app_dt_start }}</td>
                                <td>
                                    <a href="{{route('profile.edit.appointment', $appointment->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{route('profile.delete.appointment', $appointment->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
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