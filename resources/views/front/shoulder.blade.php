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

                <div class="col-lg-6 img-pint point-image" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="200">
                    <div class="about-img">
                        <img src="{{ url('/') }}/assets/front/img/human-body.png" alt="Image">
                        <a href="{{ route('front.knee-balance-and-walking') }}" title="Back"
                            id="knee-balance-and-walking" class="condition-body-link knee-balance-and-walking"></a>
                        <a href="{{ route('front.whatWeTreat', ['Back Pain Relief']) }}" title="Back" id="back"
                            class="condition-body-link back"></a>
                        <a href="{{ route('front.whatWeTreat', ['Hip Pain Relief']) }}" title="Hip" id="hip"
                            class="condition-body-link hip"></a>
                        <a href="#" title="Elbow, Wrist and Hand" id="elbow-wrist-and-hand"
                            class="condition-body-link elbow-wrist-and-hand"></a>
                        <a href="{{ route('front.whatWeTreat', ['Foot Pain Relief']) }}" title="Foot and Ankle"
                            id="foot-and-ankle" class="condition-body-link foot-and-ankle"></a>
                        <a href="#" title="Shoulder" id="shoulder" class="condition-body-link shoulder"></a>
                        <a href="#" title="Shoulder" id="head-and-neck"
                            class="condition-body-link head-and-neck"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4 style="color: black;">Shoulder</h4>
                    <h6>Click on the body parts or the list below to find out more about your pain and how physical
                        therapy can help.</h6>
                    <ul type="square">
                        <li><a href="javascript:void(0);" data-bs-target="#exampleModalToggle"
                                data-bs-toggle="modal">Sprain / Strain</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Shoulder Pain</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Dislocation, Instability</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Labrum Tear</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Frozen Shoulder / Adhesive Capsulitis</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Rotator Cuff Injuries</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Sports Injuries</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Bursitis / Tendonitis</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Post-surgery Rehab</a></li>
                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal"
                                type="button">Fractures</a></li>
                    </ul>
                </div>
            </div>

            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>What is Herniated or Bulging Disc?</h5>
                    <p>A disc is a jelly like, fluid filled sac that acts as a cushion between the bones of your neck
                        (vertebrae). Your discs change as you age, drying out and becoming more brittle. In addition, as
                        the discs dry out with age, the change in height between the vertebrae decreases, causing
                        changes in posture and function. In younger adults, the center of the disc (nucleus) is held in
                        place by many rings of the disc (picture a cross section of a tree trunk). With minor or major
                        injuries, poor posture and strain, these rings can rupture allowing a pressing outward of the
                        disc nucleus. Finally, as the nucleus reaches the outer edges, the disc can begin to bulge,
                        which in turn can rub and irritate nerve roots exiting your spine.</p>
                    <p>In more severe cases, the disc can become herniated, which further presses into the spaces where
                        nerves are exiting. Symptoms can range from localized pain, to numbness / tingling to a specific
                        part of the shoulder, arm or hands. In more severe cases complete lack of sensation, muscle
                        weakness and paralysis of an area of the upper extremity can occur.</p>
                    <p>Changes in posture, strength and range of motion can all affect the positioning of the disc and
                        how much bulging or herniation is occurring.</p>
                    <h5>
                        How physical therapy helps
                    </h5>
                    <p>
                        The good news is that the majority of bulging and herniated discs can be treated conservatively
                        with physical therapy. By working with your medical history, symptoms and testing, our physical
                        therapists can determine what areas have been affected.
                    </p>
                    <p>
                        A thorough plan is then created to relieve pressure on the disc by improving joint function,
                        muscle strength and posture. Modalities, such as ultrasound or electrical stimulation may be
                        used to reduce pain, muscle spasm or inflammation. Our therapists work with you to recover lost
                        strength and range of motion. In addition, we then train you on the correct exercises to
                        maintain good posture and reduce the risk of future episodes. Call us today to discover how we
                        can help relieve your pain quickly and restore your function!
                    </p>
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
