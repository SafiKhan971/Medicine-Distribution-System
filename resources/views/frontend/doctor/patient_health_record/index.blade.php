@extends('components/doctor_layout')
@section('title', 'Digital Clinic | Patient Health Records')
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
                            <li class="breadcrumb-item"><a href="{{url('doctor/dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Patient Health Records</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Patient Health Records</h6>
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
                                <th>Patient Name</th>
                                <th>Patient Email</th>
                                <th>Patient Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $serial_no = 1;
                            @endphp
                            @foreach($patient_records as $patient_record)
                            <tr>
                                <td>{{ $serial_no++ }}</td>
                                <td>{{ isset($patient_record->name) ? $patient_record->name : '-'  }}</td>
                                <td>{{ isset($patient_record->email) ? $patient_record->email : '-' }}</td>
                                <td>{{ isset($patient_record->address) ? $patient_record->address : '-' }}</td>
                                <td>
                                    <a href="{{route('health-record.show', $patient_record->id)}}" class="btn btn-primary btn-sm">View</a>
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
