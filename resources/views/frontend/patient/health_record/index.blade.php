@extends('components/patient_layout')
@section('title', 'Digital Clinic | Health Records ')
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
                                <li class="breadcrumb-item active" aria-current="page">Health Records</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Health Records</h6>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('profile.create.record') }}" class="btn btn-primary btn-sm">Create a Health Record</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Past Medical Condition</th>
                                    <th>Present Medical Condition</th>
                                    <th>Medications</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $serial_no = 1;
                                @endphp
                                @foreach ($health_records as $health_record)
                                    <tr>
                                        <td>{{ $serial_no++ }}</td>
                                        <td>{{ $health_record->past_medical_condition }}</td>
                                        <td>{{ $health_record->present_medical_condition }}</td>
                                        <td>{{ $health_record->medications }}</td>
                                        <td>
                                            <a href="{{ route('profile.health-record.view') }}"
                                                class="btn btn-primary btn-sm">View</a>
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
