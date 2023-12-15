@extends('components/patient_layout')
@section('title', 'Digital Clinic | Create a Feedback')
@section('header')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block mb-3">
                            <ol class="breadcrumb breadcrumb-links">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create a Feedback</li>
                            </ol>
                        </nav>
                        <br>
                        <h6 class="h2 d-inline-block mb-0">Create a Feedback</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('profile.feedbacks') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <form method="POST" action="{{ route('profile.store.feedback') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="Comments">
                                    Comments <small> (max 50 words): </small>
                                </label>
                                <textarea type="text" class="form-control form-control-sm" id="Comments" placeholder="Comments" name="comments"
                                    rows="5"></textarea>
                                <small id="wordCount" class="text-muted text-right">Word count: 0</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var textarea = document.getElementById('Comments');
            var wordCountDisplay = document.getElementById('wordCount');
            var maxWords = 50;

            textarea.addEventListener('input', function() {
                var words = textarea.value.split(/\s+/).filter(function(word) {
                    return word.length > 0;
                });

                if (words.length > maxWords) {
                    textarea.value = words.slice(0, maxWords).join(' ');
                }

                wordCountDisplay.textContent = 'Word count: ' + words.length;
            });
        });
    </script>
@endsection
