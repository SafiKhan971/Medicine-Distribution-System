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
                            <li class="breadcrumb-item"><a href="{{url('profile')}}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{url('profile')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Patient Appointments</h6>
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
        <div class="card">
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-buttons">
                    <thead class="thead-light">
                        <tr>
                            <th>Sr.NO</th>
                            <th>Doctor</th>
                            <th>Date / Time</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->app_dt_start }}</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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