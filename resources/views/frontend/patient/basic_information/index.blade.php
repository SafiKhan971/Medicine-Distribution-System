@extends('components/patient_layout')
@section('title', 'Digital Clinic | Patient Dashboard')
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

    <div style="height: 35rem;">
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="fullname">Full Name</label>
                                <input type="text" value="{{ auth()->user()->name }}" class="form-control form-control-sm" id="fullname" placeholder="Full Name" name="fullname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input type="text" value="{{ auth()->user()->email }}" class="form-control form-control-sm" id="email" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Phone No.</label>
                                <input type="number" value="{{ auth()->user()->phone }}" class="form-control form-control-sm" id="phone" placeholder="Phone No." name="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="picture">Profile Picture</label>
                                <input type="file" class="form-control form-control-sm" id="picture" accept="image/*" name="picture">
                            </div>

                            @error('picture')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-control-label" for="gender">Gender</label>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="male" type="radio" value="Male" {{ auth()->user()->gender === 'Male' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="male">Male</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="female" type="radio" value="Female" {{ auth()->user()->gender === 'Female' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="female">Female</label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="other" type="radio" value="Other" {{ auth()->user()->gender === 'Other' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="other">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="dob">Date of Birth</label>
                                <input type="date" id="dob" name="dob" class="form-control form-control-sm" value="{{ auth()->user()->dob }}">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="address">Address</label>
                                <textarea rows="5" cols="5" class="form-control form-control-sm" id="address" placeholder="Address" name="address">{{ auth()->user()->address }}</textarea>
                            </div>
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
