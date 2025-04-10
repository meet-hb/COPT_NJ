<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Our Locations - Physical Therapy {{ $getLocationDetails->location_name }} - Comprehensive Orthopedic PT
    </title>
    <style>
        iframe {
            width: 317px;
            height: 265px;
        }
    </style>
</head>

<body>
    <!-- Start Navbar Area -->
    @include('front.layout')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapr">
        <!-- <img src="{{ url('/') }}/assets/front/img/br-shape-1.webp" alt="Image" class="br-shape-one moveHorizontal"> -->
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo">
        <div class="container gx-5">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">Physical Therapy {{ $getLocationDetails->location_name }}</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">Physical Therapy {{ $getLocationDetails->location_name }}</li>
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

            <div class="row gx-5 align-items-center">
                <div class="project-desc">
                    {!! $getLocationDetails->description !!}
                </div>
                <div class="card-section-address">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 ">
                                <div class="two-section">
                                    <div class="row" style="background-color: #eaeaea">
                                        <div class="col-lg-10 justify-content-center">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="title-1 p-2">
                                                        <h3>Address</h3>
                                                        <ul style="line-height: 2rem">
                                                            <li>
                                                                {{ $getLocationDetails->address }}
                                                            </li>
                                                            <li>
                                                                P:{{ $getLocationDetails->phone }}
                                                            </li>
                                                            <li>
                                                                F:{{ $getLocationDetails->fax }}
                                                            </li>
                                                            <li>
                                                                {{ $getLocationDetails->email }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="title-1 justify-content-left p-2">
                                                        <h3>Business Hours</h3>
                                                        <ul style="line-height: 2rem">
                                                            <li>
                                                                Mon-Thurs | 9AM - 8PM
                                                            </li>
                                                            <li>
                                                                Friday | 9AM - 6PM
                                                            </li>
                                                            <li>
                                                                Sat-Sun | Closed
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                                <div class="col-lg-2 justify-content-end">
                                                    <div class="title-1">
                                                        {!! $getLocationDetails->location_details !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>



                </div>




            </div>


        </div>
    </div>

    <div class="blog-wrap-two" style="background-color: #E4F6Fe;">
        <div class="container gx-5">
            <div class="row p-5 gx-5">
                <h3>Get To Know Our Clinic</h3>
                @php
                    $images = explode(',', $getLocationDetails->other_images);
                @endphp
                @foreach ($images as $image)
                    @if ($image)
                        <div class="col-lg-3">
                            <div class="blog-card-one">
                                <div class="blog-card-img">
                                    <img src="{{ Storage::url($image) }}" alt="photo1" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </div>

    <div class="section-intro ptb-100">
        <div class="container gx-5">
            <div class="row gx-5">
                <h3 class="text-center">Treatments We Offer At Our Somerset, NJ Physical Therapy Clinic</h3>
            </div>
            <div class="row justify-content-center pt-5  gx-5 text-center">
                <div class="col-lg-4">
                    <div class="details-image text-center">
                        <img src="{{ url('/') }}/assets/front/img/physical-therapy-clinic-sports-performance-comprehensive-orthopedic-physical-therapy-somerset-nj-1.jpg"
                            alt="photo1" class="img-fluid">
                    </div>
                    <div class="details-desc text-center pt-2">
                        <h4><a href="{{ route('front.whatWeTreat', 'Sports Injuries') }}">Sports Injuries</a></h4>
                        <p>Did participating in physical activity or sport injure you? It makes no difference whether
                            you're a professional athlete or a weekend warrior.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details-image">
                        <img src="{{ url('/') }}/assets/front/img/Physical-therapy-clinic-back-pain-relief-comprehensive-orthopedic-physical-therapy-somerset-nj-1.jpg"
                            alt="photo1" class="img-fluid">
                    </div>
                    <div class="details-desc text-center pt-2">
                        <h4><a href="{{ route('front.whatWeTreat', 'Back Pain Relief') }}">Back Pain/Sciatica Pain</a>
                        </h4>
                        <p>Are you currently searching for back pain relief? Did you have a restless night's sleep or
                            injure your back while lifting something too heavy? Did you sustain an injury while
                            participating in a sporting event?</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="details-image">
                        <img src="{{ url('/') }}/assets/front/img/physical-therapy-clinic-balance-and-gait-disorders-comprehensive-orthopedic-physical-therapy-somerset-nj-1.jpg"
                            alt="photo1" class="img-fluid">
                    </div>
                    <div class="details-desc text-center pt-2">
                        <h4><a href="{{ route('front.whatWeTreat', 'Balance and Gait Disorders') }}">Balance and Gait
                                Training</a></h4>
                        <p>We've all experienced dizziness at some point in our lives, and we're sure you'd agree it's
                            not a pleasant sensation. Nobody wants to feel as if the ground beneath their feet is giving
                            way!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="location-team">
        <div class="container gx-5">
            <div class="location-team-wrapper">
                <div class="location-team-content">
                    {!! $getLocationDetails->expertise !!}
                </div>
            </div>
        </div>
    </section>

    <section class="location-about ptb-100">
        <div class="container gx-5">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ url('/') }}/assets/front/img/Gallery-outside-clinic-comprehensive-orthopedic-physical-therapy-somerset-nj.jpg"
                        alt="photo1" class="img-fluid">
                </div>
                <div class="col-lg-9">
                    {!! $getLocationDetails->extra_information !!}
                </div>
            </div>
        </div>
    </section>

    <section class="location-appointment ptb-100 gx-5">
        <div class="container p-5">
            <div class="text-center">
                <h2>Are you suffering from pain or limited range of motion?</h2>
                <p>If you’re suffering, fill out the form to request an appointment.</p>
            </div>
            <div class="location-appointment-form"><noscript class="ninja-forms-noscript-message">
                    Notice: JavaScript is required for this content.</noscript>
                <div id="inline-6ExxWYsXbb1iLfiK8s58-div" class="ep-iFrameContainer" style="display: block;">
                    <div id="inline-6ExxWYsXbb1iLfiK8s58-wrapper" class="ep-wrapper" style=""><iframe
                            src="https://api.leadconnectorhq.com/widget/form/6ExxWYsXbb1iLfiK8s58"
                            style="width: 100%; height: 500px; border: none; border-radius: 4px; overflow: hidden; display: block;"
                            id="inline-6ExxWYsXbb1iLfiK8s58" data-layout="{'id':'INLINE'}"
                            data-trigger-type="alwaysShow" data-trigger-value=""
                            data-activation-type="alwaysActivated" data-activation-value=""
                            data-deactivation-type="neverDeactivate" data-deactivation-value=""
                            data-form-name="Request Appointment" data-height="565"
                            data-layout-iframe-id="inline-6ExxWYsXbb1iLfiK8s58" data-form-id="6ExxWYsXbb1iLfiK8s58"
                            title="Request Appointment" scrolling="no">
                        </iframe></div>
                </div>
                <script src="../../../link.msgsndr.com/js/form_embed.js"></script>

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


    @include('front.assets.js')
</body>

</html>
