@include('components/header')
@include('components/navbar')
<section class="error-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <!-- Error Inner -->
                <div class="error-inner">
                    <h1>404<span>Oop's sorry we can't find that page!</span></h1>
                    <div class="mt-3 button">
                        <a href="{{ url('/') }}" class="btn" style="color: white">Go Back To Homepage</a>
                    </div>
                </div>
                <!--/ End Error Inner -->
            </div>
        </div>
    </div>
</section>
@include('components/footer')
