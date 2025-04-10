<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Terms & Conditions | Somerset, NJ -
        Comprehensive Orthopedic PT</title>
</head>

<body>

    @include('front.layout')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapr">
        <!-- <img src="assets/img/br-shape-1.webp" alt="Image" class="br-shape-one moveHorizontal"> -->
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">Terms & Conditions</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">Terms & Conditions</li>
                </ul>

            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Project Details Section Start -->
    <div class="project-details-wrap ptb-100">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-xl-12 col-lg-12">

                </div>
            </div>
            <div class="row gx-5 align-items-center">

                <div class="project-desc">
                    {!! $termsAndConditions !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section Start -->
    @include('front.footer')
    <!-- Footer Section End -->


    @include('front.assets.js')
</body>

<!-- Mirrored from templates.hibootstrap.com/zigo/default/project-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2025 06:03:34 GMT -->

</html>
