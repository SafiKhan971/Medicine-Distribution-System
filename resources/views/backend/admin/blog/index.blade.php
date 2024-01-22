@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Blogs')
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
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </nav>
                    <br>
                    <h6 class="h2 d-inline-block mb-0">Blogs</h6>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url('admin/blogs/create') }}" class="btn btn-primary btn-sm">Create a Blog</a>
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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-buttons">
                        <thead class="thead-light">
                            <tr>
                                <th>Sr.No</th>
                                <th>Title</th>
                                <th>Published at</th>
                                <th>Published by</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $serial_no = 1;
                            @endphp
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $serial_no++ }}</td>
                                <td>
                                    {{ isset($blog->title) ? $blog->title : '-' }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('M j, Y - h:i A') }}
                                </td>
                                <td>{{ isset($blog->admin->name) ? $blog->admin->name : '-' }}</td>
                                <td>
                                    <a href="{{ route('blogs.edit', $blog->id ) }}" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('blogs.destroy', ['blog' => $blog->id ]) }}" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
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
