@extends('components/doctor_layout')
@section('title', 'Digital Clinic | Prescriptions')
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
                            <li class="breadcrumb-item active" aria-current="page">Prescriptions</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Prescriptions</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="{{route('prescriptions.create')}}" class="btn btn-neutral btn-sm">Add New</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    @if(session('success'))
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
                                <th>Patient ID</th>
                                <th>Patient Name</th>
                                <th>Medicine Name</th>
                                <th>Dosage</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($prescriptions as $key => $prescription)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $prescription->user_id }}</td>
                                <td>{{ $prescription->patient->name }}</td>
                                <td>{{ $prescription->medicine_name }}</td>
                                <td>{{ $prescription->dosage }}</td>
                                <td>{{ $prescription->duration }}</td>
                                <td>
                                    <!-- Add your actions here, e.g., edit, delete buttons -->
                                    <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
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
