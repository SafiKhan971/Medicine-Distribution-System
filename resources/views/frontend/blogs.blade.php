@include('components/header')
@include('components/navbar')

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Keep Up With Our Most Recent Medical News.</h2>
                    <ul class="bread-list">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Blogs Start -->
<section class="blog section" id="blog">
    <div class="container">
        <div class="row mb-5">
            @if (count($blogs) > 0)
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Blog -->
                        <div class="single-news">
                            <div class="news-head">
                                <img src="{{ asset('storage/blogimages/' . $blog->image) }}" alt="{{ $blog->title }}">
                            </div>
                            <div class="news-body">
                                <div class="news-content">
                                    <div class="date">
                                        {{ \Carbon\Carbon::parse($blog->updated_at)->format('M j, Y - h:i a') }}
                                    </div>
                                    <h2><a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a></h2>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                @endforeach
            @else
                <div class="text-center">
                    <p> No Blog Found. </p>
                </div>
            @endif
        </div>
        <div class="text-center">
            <a href="" class="btn text-light">See More</a>
        </div>
    </div>
</section>
<!-- Blogs End -->

@include('components/footer')
