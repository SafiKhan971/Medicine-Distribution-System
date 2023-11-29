@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Update Patient')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Patient</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Update Patient</h6>
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
            <form method="POST" action="{{ route('admin.patient.update') }}">
                <!-- Card body -->
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{ $patient['id'] }}">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/patients') }}" class="btn btn-secondary btn-sm float-right">Back</a>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" id="name" name="name"
                                    value="{{ $patient['name'] }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email"
                                    value="{{ $patient['email'] }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm float-start">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
