<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('front.assets.css')
    <title>Patient Info / Forms | Physical Therapy Somerset, NJ - Comprehensive Orthopedic PT</title>
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
                <h2 style="color: #fff;">Patient Info / Forms</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="index.html">Home</a></li>
                    <li style="color: #fff;">Patient Info / Forms</li>
                </ul>
                <div class="option-item">
                    <a href="{{ route('front.appointment') }}" class="btn-two">Request Appointment</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Project Details Section Start -->
    <div class="project-details-wrap ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="project-desc">
                        {!! $patientInfo->value !!}
                    </div>
                </div>
            </div>
            <div class="pdg-formate">
                <div class="container">
                    <div class="patient-form-listing justify-content-start" bis_skin_checked="1">
                        <div class="patient-form-item text-center cell-sm-6 cell-md-4 ptb-60" bis_skin_checked="1">
                            <div class="form-image" bis_skin_checked="1"><span class="form-number"></span>
                                <picture><img decoding="async"
                                        src="{{ url('/') }}/assets/front/img/letterhead-pdf.png"
                                        alt="New Patient Paperwork"
                                        data-lazy-src="{{ url('/') }}/assets/front/img/letterhead-pdf.png"
                                        data-ll-status="loaded" class="entered lazyloaded"><noscript><img
                                            decoding="async"
                                            src="{{ url('/') }}/assets/front/img/letterhead-pdf.png"
                                            alt="New Patient Paperwork" /></noscript></picture>
                            </div>
                            <div class="form-content" bis_skin_checked="1">
                                <h3>New Patient Paperwork</h3>
                                <div class="btn-center" bis_skin_checked="1"><a class="btn Download" target="_blank"
                                        href="{{ url('/') }}/assets/front/img/New-Patient-Paperwork.pdf">Download
                                        &amp; Print</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Footer -->
    @include('front.footer')
    <!-- End Footer -->

    @include('front.assets.js')
</body>

</html>
