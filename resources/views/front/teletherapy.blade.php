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
    <title>At Home Physical Therapy with Telehealth | Somerset, NJ -
        Comprehensive Orthopedic PT</title>
    <style>
        ul {
            color: black;
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
                <h2 style="color: #fff;">At Home Physical Therapy with Telehealth</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">At Home Physical Therapy with Telehealth</li>
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
                <h6 class="text-center">We are now provides a HIPAA compliant telemedicine
                    platform for their
                    patients.</h6>
                <p>
                <h6>We now offer services at a distance and through video telecommunications in the comfort of the
                    patient’s home. Stay safe and healthy and continue your PT treatment at home with Telehealth.</h6>
                </p>
                <div class="project-desc">
                    <h4 style="color: black;">Benifits of Telehealth</h4>
                    <ul type="square">
                        <li style="color: black;font-size:13pt;"">No transportation time or costs</li>
                        <li style="color: black;font-size:13pt;"">No need to take time off of work
                        </li>
                        <li style="color: black;font-size:13pt;"">Eliminate child or elder care issues.

                        </li>
                        <li style="color: black;font-size:13pt;"">On-demand options

                        </li>
                        <li style="color: black;font-size:13pt;"">Access to Specialists

                        </li>
                        <li style="color: black;font-size:13pt;"">Less Chance of Catching a New Illness

                        </li>
                        <li style="color: black;font-size:13pt;"">Less Time in the Waiting Room

                        </li>
                        <li style="color: black;font-size:13pt;"">Better Health

                        </li>

                    </ul>
                </div>

            </div>

        </div>
    </div>

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
