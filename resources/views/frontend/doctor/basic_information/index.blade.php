@extends('components/doctor_layout')
@section('title', 'Digital Clinic | Doctor Basic Information')
@section('header')
<!-- Header -->
<div class="header pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                        <ol class="breadcrumb breadcrumb-links">
                            <li class="breadcrumb-item"><a href="{{ url('doctor/dashboard') }}"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ url('doctor/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Basic Information</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Basic Information</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid mt--6">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div style="height: 25rem;">
        <form method="POST" action="{{ route('doctor.profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="fullname">Full Name</label>
                                <input type="text" value="{{ session()->get('doctor_name') }}" class="form-control form-control-sm" id="fullname" placeholder="Full Name" name="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="text" value="{{ session()->get('doctor_email') }}" class="form-control form-control-sm" id="email" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="picture">Profile Picture</label>
                                <input type="file" class="form-control form-control-sm" id="picture" accept="image/*" name="picture">
                            </div>

                            @error('picture')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm float-right">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
