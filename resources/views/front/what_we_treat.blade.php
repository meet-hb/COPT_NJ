<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>{{ $treatment_name }}, NJ - Comprehensive Orthopedic Physical Therapy</title>
</head>

<body>

    @include('front.layout')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrap mt-5"
        style="background-image: url('{{ Storage::url($treatments->banner) }}');background-repeat: no-repeat;
  background-size: cover;">
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo">
        <div class="container gx-5">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">{{ $treatment_name }}</h2>
                <ul class="breadcrumb-menu list-style">
                    <li><a href="{{ route('front.index') }}">Home</a></li>
                    <li>{{ $treatment_name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Project Details Section Start -->
    <div class="project-details-wrap ptb-100">
        <div class="container gx-5">
            @if ($treatment_name != 'View More Conditions')
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <div class="single-img">
                            <img src="{{ Storage::url($treatments->image) }}" alt="Image">
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="project-desc">
                            {!! $treatments->body_description !!}
                        </div>
                    </div>
                </div>
            @else
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="project-desc">
                            {!! $treatments->body_description !!}
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 img-pint align-items-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="about-img">
                                <img src="{{ url('/') }}/assets/front/img/human-body.png" alt="Image">
                                <a href="{{ route('front.whatWeTreat', ['Knee Pain Relief']) }}"
                                    title="Knee, Balance and Walking" id="knee-balance-and-walking"
                                    class="condition-body-link knee-balance-and-walking"></a>
                                <a href="{{ route('front.whatWeTreat', ['Back Pain Relief']) }}" title="Back"
                                    id="back" class="condition-body-link back"></a>
                                <a href="{{ route('front.whatWeTreat', ['Hip Pain Relief']) }}" title="Hip"
                                    id="hip" class="condition-body-link hip"></a>
                                <!--<a href="#" title="Elbow, Wrist and Hand" id="elbow-wrist-and-hand"-->
                                <!--    class="condition-body-link elbow-wrist-and-hand"></a>-->
                                <a href="{{ route('front.whatWeTreat', ['Foot Pain Relief']) }}" title="Foot and Ankle"
                                    id="foot-and-ankle" class="condition-body-link foot-and-ankle"></a>
                                <a href="#" title="Shoulder" id="shoulder"
                                    class="condition-body-link shoulder"></a>
                                <a href="#" title="Head and Neck" id="head-and-neck"
                                    class="condition-body-link head-and-neck"></a>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            <div class="row gx-5 align-items-center mt-5">
                @if ($treatments->causes_summary != null)
                    {!! $treatments->causes_summary !!}
                @endif

                @if (isset($treatment_causes) && count($treatment_causes) > 0)
                    <div class="accordion" id="accordionExample">
                        @foreach ($treatment_causes as $index => $treatment_cause)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $loop->index }}" aria-expanded="false"
                                        aria-controls="collapse{{ $loop->index }}">
                                        <span>
                                            <i class="ri-add-line plus"></i>
                                            <i class="ri-subtract-line minus"></i>
                                        </span>
                                        {{ $treatment_causes[$loop->index]['name'] }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse"
                                    aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {{ $treatment_causes[$loop->index]->description }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif



            </div>
            @if (!empty(strip_tags($treatments->causes_note)))
                <div class="row mt-3 align-items-center">
                    {!! $treatments->causes_note !!}
                </div>
            @endif

            @if (!empty(strip_tags($treatments->symptoms)))
                <div class="row mt-3 mb-3 align-items-center">
                    <div class="col-xl-12">
                        <div class="card" style="background-color: #efefef; border: none;">
                            {!! $treatments->symptoms !!}
                        </div>
                    </div>
                </div>
            @endif

            @if ($treatments->extra_information != null)
                <div class="row mt-3 align-items-center">
                    <div class="col-xl-12">
                        {!! $treatments->extra_information !!}
                    </div>
                </div>
            @endif


        </div>
    </div>

    <section class="appointment-steps-section">
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
            <div class="container" bis_skin_checked="1">
                <div class="appointment-block-wrapper" bis_skin_checked="1">
                    <h4>YOUR ROAD TO RECOVERY STARTS TODAY!</h4>
                    <div class="appointment-button" bis_skin_checked="1"><a href="{{ route('front.appointment') }}"
                            target="_self" class="btn">Request
                            Appointment</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Project Details Section End -->
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
