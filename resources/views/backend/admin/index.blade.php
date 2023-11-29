@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Admin Dashboard')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 d-inline-block mb-0">Alternative</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Alternative</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6 h-100">
        <div style="height: 25rem;">
            <h1>Admin Dashboard</h1>
        </div>
        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="copyright text-center text-muted">
                        &copy; 2023 <a href="{{ url('/') }}" class="font-weight-bold ml-1">Digital Clinic</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
