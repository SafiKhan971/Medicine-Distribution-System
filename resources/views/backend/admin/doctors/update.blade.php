@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Update Doctor')
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Update Doctor</h3>
                <a href="{{ url('admin/doctors') }}" class="btn btn-secondary">Back</a>
            </div>
            <form method="POST" action="{{ route('admin.doctor.update') }}">
                <!-- Card body -->
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{ $doctor['id'] }}">
                    <div class="form-group">
                        <label class="form-control-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $doctor['name'] }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $doctor['email'] }}">
                    </div>
                </div>

                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
