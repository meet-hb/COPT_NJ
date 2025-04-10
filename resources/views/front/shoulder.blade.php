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
    <title>Shoulder | Somerset, NJ -
        Comprehensive Orthopedic PT</title>
    <style>
        ul a {
            color: #00bfb3;
            font-weight: bold;
            font-size: 13pt;
        }

        ul a:hover {
            color: #00bfb3;
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
        <div class="container gx-5">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">Shoulder</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">Shoulder</li>
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
        <div class="container gx-5">
            <div class="row">


                <div class="col-lg-6">
                    <h4 style="color: black;">Shoulder</h4>
                    <h6>Click on the body parts or the list below to find out more about your pain and how physical
                        therapy can help.</h6>
                    <ul type="square">
                        <li><a href="javascript:void(0);" data-bs-target="#exampleModalToggle1"
                                data-bs-toggle="modal">Sprain / Strain</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle2"
                                type="button">Shoulder Pain</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle3"
                                type="button">Dislocation, Instability</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle4"
                                type="button">Labrum Tear</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle5"
                                type="button">Frozen Shoulder / Adhesive Capsulitis</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle6"
                                type="button">Rotator Cuff Injuries</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle7"
                                type="button">Sports Injuries</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle8"
                                type="button">Bursitis / Tendonitis</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle9"
                                type="button">Post-surgery Rehab</a></li>
                        <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModalToggle10"
                                type="button">Fractures</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 img-pint " data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="about-img">
                        <img src="{{ url('/') }}/assets/front/img/human-body.png" alt="Image">
                        <a href="{{ route('front.knee-balance-and-walking') }}" title="Knee, Balance and Walking"
                            id="knee-balance-and-walking" class="condition-body-link knee-balance-and-walking"></a>
                        <a href="{{ route('front.back') }}" title="Back" id="back"
                            class="condition-body-link back"></a>
                        <a href="{{ route('front.hip') }}" title="Hip" id="hip"
                            class="condition-body-link hip"></a>
                        <a href="{{ route('front.elbow-wrist-hand') }}" title="Elbow, Wrist and Hand"
                            id="elbow-wrist-and-hand" class="condition-body-link elbow-wrist-and-hand"></a>
                        <a href="{{ route('front.foot-and-ankle') }}" title="Foot and Ankle" id="foot-and-ankle"
                            class="condition-body-link foot-and-ankle"></a>
                        <a href="{{ route('front.shoulder') }}" title="Shoulder" id="shoulder"
                            class="condition-body-link shoulder"></a>
                        <a href="{{ route('front.head-and-neck') }}" title="Head and Neck" id="head-and-neck"
                            class="condition-body-link head-and-neck"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.modal.shoulder_details')

    <!-- Footer Section Start -->
    @include('front.footer')
    <!-- Footer Section End -->

    @include('front.assets.js')
</body>

</html>
