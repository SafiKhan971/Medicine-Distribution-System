@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Update Patient')
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Update Patient</h3>
                <a href="{{ url('admin/patients') }}" class="btn btn-secondary">Back</a>
            </div>
            <form method="POST" action="{{ route('admin.patient.update') }}">
                <!-- Card body -->
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="id" value="{{ $patient['id'] }}">
                    <div class="form-group">
                        <label class="form-control-label" for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $patient['name'] }}">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $patient['email'] }}">
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
