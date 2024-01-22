@include('components/header')
@include('components/navbar')

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">{{ $blog->title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Blogs Start -->
<section class="news-single section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="single-main">
                    <!-- News Head -->
                    <div class="news-head">
                        <img src="{{ asset('storage/blogimages/' . $blog->image) }}" alt="{{ $blog->image }}">
                    </div>
                    <!-- News Title -->
                    <h1 class="news-title">
                        <a href="news-single.html">
                            {{ $blog->title }}
                        </a>
                    </h1>
                    <!-- Meta -->
                    <div class="meta">
                        <div class="meta-left">
                            <span class="author date"> By: {{ $blog->admin->name }} </span>
                        </div>
                        <div class="meta-right">
                            <span class="author date"><i
                                    class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($blog->updated_at)->format('M j, Y - h:i a') }}</span>
                        </div>
                    </div>
                    <!-- News Text -->
                    <div class="news-text">
                        <p>{{ $blog->content }}</p>
                        <div class="blog-bottom">
                            <!-- Social Share -->
                            <ul class="social-share">
                                <li class="facebook"><a href="#">
                                        <i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                                <li class="twitter"><a href="#">
                                        <i class="fa fa-twitter"></i><span>Twitter</span></a>
                                </li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Blogs End -->

@include('components/footer')
