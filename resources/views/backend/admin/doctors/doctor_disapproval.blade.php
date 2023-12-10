@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Doctor Disapproval')
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
                                <li class="breadcrumb-item active" aria-current="page">Doctor Disapproval</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Doctor Disapproval</h6>
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
            <form method="POST" action="{{ route('admin.doctor.disapproval') }}">
                <!-- Card body -->
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{ $doctor['id'] }}">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/doctors') }}" class="btn btn-secondary btn-sm float-right">Back</a>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Disapproval Reason</label>
                                <textarea type="text" class="form-control form-control-sm" id="disapproval_reason" name="disapproval_reason"
                                    placeholder="Disapproval Reason" rows="5" cols="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm float-start">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
