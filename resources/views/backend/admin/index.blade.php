@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Admin Dashboard')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i
                                            class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
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
        {{-- <div class="mb-3">
            <h1>Admin Dashboard</h1>
        </div> --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Success!</strong> {{ session('success') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row" style="height: 25rem;">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats pt-3 pb-2">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-2">Registered Patients</h5>
                      <a href="{{ url('admin/patients') }}"><span class="h2 font-weight-bold mb-0">{{ $total_patients }}</span></a>
                    </div>
                    <div class="col-auto">
                      <a href="{{ url('admin/patients') }}">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                          <i class="fas fa-user"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats pt-3 pb-2">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-2">Registered Doctors</h5>
                      <a href="{{ url('admin/doctors') }}"><span class="h2 font-weight-bold mb-0">{{ $total_doctors }}</span></a>
                    </div>
                    <div class="col-auto">
                      <a href="{{ url('admin/doctors') }}">
                        <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                          <i class="ni ni-hat-3"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats pt-3 pb-2">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-2">Total Appointments</h5>
                      <a href="{{ url('admin/appointments') }}"><span class="h2 font-weight-bold mb-0">{{ $total_appointments }}</span>
                    </div>
                    <div class="col-auto">
                      <a href="{{ url('admin/appointments') }}">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                          <i class="ni ni-calendar-grid-58"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
