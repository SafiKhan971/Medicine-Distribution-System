@extends('backend/admin/components/admin_layout')
@section('title', 'Digital Clinic | Create a Blog')
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
                                <li class="breadcrumb-item active" aria-current="page">Create a Blog</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Create a Blog</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid mt--6">
        <div class="card mb-4">
            <form action="{{ url('admin/blogs') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-start">
                            <a href="{{ url('admin/blogs') }}" class="btn btn-secondary btn-sm float-right">Back</a>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="title">Title</label>
                                <input class="form-control form-control-sm" type="text" name="title" id="title"
                                    placeholder="Title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="content">Content</label>
                                <textarea class="form-control form-control-sm" type="text" name="content" id="content" placeholder="Content"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="image">Image</label>
                                <input class="form-control form-control-sm" type="file" name="image" id="image" accept="image/*">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 text-start">
                            <button type="submit" class="btn btn-primary btn-sm"> Submit </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
