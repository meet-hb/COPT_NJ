<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>{{ $therapy_name }} Somerset, NJ - Comprehensive Orthopedic PT</title>
</head>

<body>

    @include('front.layout')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrap"
        style="background-image: url('{{ Storage::url($therapy_details->benner) }}');background-repeat: no-repeat;
  background-size: cover;">
        {{-- <img src="{{ Storage::url($therapy_details->benner) }}" alt="Image" class="br-shape-two animationFramesTwo"> --}}
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo">
        <div class="container gx-5">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">{{ $therapy_name }}</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">{{ $therapy_name }}</li>
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
        <div class="container gx-5">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="project-desc">
                        {!! $therapy_details->description !!}
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="single-img">
                        <img src="{{ Storage::url($therapy_details->image) }}" alt="Image">
                    </div>
                </div>

            </div>


        </div>
    </div>
    <!-- Project Details Section End -->

    <div class="project-details-wrap mt-3">
        <div class="card" style="background-color: #efefef; border: none;">
            <div class="container gx-5">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-lg-6">


                        <div class="project-desc mb-3">
                            {!! $therapy_details->extra_information !!}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <section class="appointment-steps-section mt-3">
        <div class="container gx-5" bis_skin_checked="1">
            <h3>Your Next Steps…</h3>
            <div class="appointment-steps-wrapper" bis_skin_checked="1">
                <ol class="appointment-steps-listing">
                    <li class="appointment-steps-item">
                        <p> Request An Appointment</p>
                    </li>
                    <li class="appointment-steps-item">
                        <p>Receive A Custom Treatment Plan</p>
                    </li>
                    <li class="appointment-steps-item">
                        <p>Work Hard and Progress In Your Recovery</p>
                    </li>
                    <li class="appointment-steps-item">
                        <p>Recover &amp; Enjoy Life Pain-Free!</p>
                    </li>
                </ol><svg xmlns="http://www.w3.org/2000/svg" width="255" height="300" viewBox="0 0 255 300">
                    <path
                        d="M219.014,300a9.53,9.53,0,0,1-5.528-1.723l-26.356-18.4a9.532,9.532,0,1,1,10.958-15.6l12.06,8.419V19.047H9.523A9.523,9.523,0,0,1,9.523,0H219.729a9.523,9.523,0,0,1,9.523,9.523s0,.01,0,.015,0,.01,0,.015v262.2l10.716-7.481a9.533,9.533,0,1,1,10.958,15.6l-24.579,17.159A11.387,11.387,0,0,1,219.1,300Z">
                    </path>
                </svg>
            </div>
        </div>
        <div data-bg="https://coptnj.com/wp-content/uploads/2022/06/comprehensive-orthopedic-physical-therapy-appointment-background—somerset-nj.png"
            class="appointment-block rocket-lazyload entered error" bis_skin_checked="1" data-ll-status="error">
            <div class="container gx-5" bis_skin_checked="1">
                <div class="appointment-block-wrapper" bis_skin_checked="1">
                    <h4>YOUR ROAD TO RECOVERY STARTS TODAY!</h4>
                    <div class="appointment-button" bis_skin_checked="1"><a href="/physical-therapist-appointment/"
                            target="_self" class="btn">Request
                            Appointment</a></div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer Section Start -->
    @include('front.footer')
    <!-- Footer Section End -->

    <!-- Back to Top -->
    <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
        <i class="ri-arrow-up-line"></i>
    </button>

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
