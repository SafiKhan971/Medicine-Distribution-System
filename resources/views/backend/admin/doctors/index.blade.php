@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Doctors List')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i
                                            class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Doctors List</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Doctors List</h6>
                    </div>
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
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>Error!</strong> {{ session('error') }}</span>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor['name'] }}</td>
                                        <td>{{ $doctor['email'] }}</td>
                                        {{-- <td>{{ $doctor['status'] == 1 ? 'Approved' : 'Unapproved' }}</td> --}}
                                        <td>{{ statusLabel($doctor['status']); }}</td>
                                        <td>
                                            <a href="{{ url('/admin/doctor/details/' . $doctor['id']) }}"
                                                class="btn btn-outline-default btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="View Details">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @if ($doctor['status'] == 0)
                                                <a href="{{ url('/admin/doctor/approve/' . $doctor['id']) }}"
                                                    class="btn btn-outline-success btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Approve">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </a>
                                            @else
                                                <a href="{{ url('/admin/doctor/disapprove/' . $doctor['id']) }}"
                                                    class="btn btn-outline-warning btn-sm" data-toggle="tooltip"
                                                    data-placement="top" title="Disapprove" data-toggle="modal"
                                                    data-target="#modal-form">
                                                    <i class="fa fa-thumbs-down"></i>
                                                </a>
                                            @endif
                                            {{-- <a href="{{ url('/admin/doctor/update/' . $doctor['id']) }}"
                                                class="btn btn-outline-primary btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a> --}}
                                            <a href="{{ url('/admin/doctor/delete/' . $doctor['id']) }}"
                                                class="btn btn-outline-danger btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
