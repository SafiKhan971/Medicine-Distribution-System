@extends('components/patient_layout')
@section('title', 'Digital Clinic | Doctors')
@section('header')
<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                        <ol class="breadcrumb breadcrumb-links">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{url('/profile')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Doctors</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Specialization</th>
                                <th>Experience</th>
                                <th>Duty Timing</th>
                                <th>Working Days</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $serial_no = 1;
                            @endphp
                            @foreach($doctors as $doctor)
                            <tr>
                                <td>{{ $serial_no++ }}</td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->specialization }}</td>
                                <td>{{ $doctor->experience }}</td>
                                <td>{{ \Carbon\Carbon::parse($doctor->start_time)->format('h:i A') }} to {{ \Carbon\Carbon::parse($doctor->end_time)->format('h:i A') }}</td>
                                <td>{{($doctor->days_week == 4)? "Monday to Thursday" : "Monday to Friday"}}</td>

                                <td>
                                    <a href="{{route('profile.create.appointment')}}" class="btn btn-primary btn-sm">Get Appointment</a>
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
