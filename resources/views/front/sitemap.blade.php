@php
    $howWeTreats = howWeTreat();
    $whatWeTreat = whatWeTreat();
@endphp
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Sitemap | Somerset, NJ -
        Comprehensive Orthopedic PT</title>
    <style>
        li a {
            color: #00bfb3;
            font-weight: bold;
            font-size: 13pt;
        }
    </style>
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
                <h2 style="color: #fff;">SITEMAP</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">SITEMAP</li>
                </ul>
                <div class="option-item">
                    <a href="{{ route('front.appointment') }}" class="btn-two">Request
                        Appointment</a>
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

                </div>
            </div>
            <div class="row gx-5 align-items-center">

                <div class="project-desc">
                    <ul type="square">
                        <li><b style="color: black;font-size:13pt;">Pages</b></li>
                        <ul type="circle">
                            <li><a href="{{ route('front.areas_we_serve') }}">Areas we Serve</a></li>
                            <li><a href="{{ route('front.teletherapy') }}">At Home Physical Therapy With Telehealth</a>
                            </li>
                            <li><a href="{{ route('front.health-blog') }}">Blog</a></li>
                            <li><a href="{{ route('front.career') }}">Career</a></li>
                            <li><a href="{{ route('front.contact') }}">Contact</a></li>
                            <li><a href="{{ route('front.index') }}">Experience Comprehensive Orthopedic Physical
                                    Therapy Somerset, NJ</a></li>
                            <li><a href="javascript:void(0)">How we Treat</a></li>
                            <ul type="square">
                                @foreach ($howWeTreats as $howWeTreat)
                                    <li><a href="{{ route('front.howWeTreat', $howWeTreat->therapy_name) }}">
                                            {{ ucfirst($howWeTreat->therapy_name) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <li><a href="javascript:void(0)">New Patient Welcome Series</a></li>
                            <li><a href="{{ route('front.our-locations') }}">Our Locations</a></li>
                            <li><a href="{{ route('front.our-practice') }}">Our Practice</a></li>
                            <li><a href="{{ route('front.our-team') }}">Our Team</a></li>
                            <li><a href="javascript:void(0)">Patient Information</a></li>
                            <ul type="square">
                                <li><a href="{{ route('front.patientInfo') }}">Patient Info/Forms</a></li>
                                <li><a href="{{ route('front.directAccess') }}">Direct Access</a></li>
                                <li><a href="{{ route('front.insuranceInfo') }}">Insurance Info</a></li>
                                <li><a href="javascript:void(0)">Reviews</a></li>
                                <li><a href="{{ route('front.referAFriend') }}">Refer a Friend</a></li>
                                <li><a href="{{ route('front.faq') }}">FAQs</a></li>
                            </ul>
                            <li><a href="{{ route('front.privacy_policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('front.appointment') }}">Request Appointment</a></li>
                            <li><a href="{{ route('front.terms_and_conditions') }}">Terms of Use</a></li>
                            <li><a href="javascript:void(0)">What we Treat</a></li>
                            <ul type="square">
                                @foreach ($whatWeTreat as $treat)
                                    <li>
                                        <a href="{{ route('front.whatWeTreat', $treat->treatment_name) }}">
                                            {{ ucfirst($treat->treatment_name) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </ul>
                    </ul>
                </div>

            </div>


        </div>
    </div>

    <!-- Footer Section Start -->
    @include('front.footer')
    <!-- Footer Section End -->

    <!-- Modal HTML -->
    <!-- <div class="modal fade" id="quickview-modal" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="quickview-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <button type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ri-close-line"></i>
                    </button>
                    <div class="modal-body">
                        <div class="video-popup">
                            <iframe width="885" height="498" src="https://www.youtube.com/embed/3FjT7etqxt8"
                                title="How to Design an Elvis Movie Poster in Photoshop" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    @include('front.assets.js')
</body>

<!-- Mirrored from templates.hibootstrap.com/zigo/default/project-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2025 06:03:34 GMT -->

</html>
