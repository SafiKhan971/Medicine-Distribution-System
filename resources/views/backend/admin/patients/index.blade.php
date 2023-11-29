@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Patients List')
@section('content')
<!-- Page content -->
<div class="container-fluid mt--6">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text">
            <strong>Success!</strong> {{ session('success') }}
        </span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Patients List</h3>
                    <p class="text-sm mb-0">
                        This is Patients List.
                    </p>
                </div>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $patient['name'] }}</td>
                                <td>{{ $patient['email'] }}</td>
                                <td>
                                    <a href="{{ url('/admin/patient/update/' . $patient['id']) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('/admin/patient/delete/' . $patient['id']) }}" class="btn btn-danger btn-sm">Delete</a>
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
