<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Our Team - Comprehensive Orthopedic Physical Therapy</title>
</head>

<body>

    @include('front.layout')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapr">
        <!-- <img src="{{ url('/') }}/assets/front/img/br-shape-1.webp" alt="Image" class="br-shape-one moveHorizontal"> -->
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo" />
        <div class="container gx-3">
            <div class="breadcrumb-content">
                <h2 style="color: #fff">{{ $team->name . '(' . $team->position . ')' }}</h2>
                <ul class="breadcrumb-menu list-style mt-2">
                    <li style="color: #fff"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff">Our Team</li>
                </ul>

                <div class="option-item">
                    <a href="{{ route('front.appointment') }}" class="btn-two">Request Appointment</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Team Section Start -->
    <div class="container gx-3 pt-100 pb-75">
        <div class="row justify-content-center">
            <!-- <h2 class="text-center">Physical Therapists</h2> -->
            <section id="about" class="about section">
                <!-- Section Title -->
                <!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4 justify-content-center">
                        <div class="col-lg-6 justify-content-center text-center">
                            <img src="{{ Storage::url($team->image) }}" class="img-fluid" alt="" />
                            <h3 class="text-center">{{ $team->name }}</h3>
                            <span class="text-center">{{ $team->position }}</span>
                        </div>
                        <p class="py-3">
                            {!! $team->description !!}
                        </p>
                    </div>
                </div>
            </section>
            <!-- /About Section -->
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Team Section Start -->
    <div class="container gx-3 pt-100 pb-75">
        <div class="row justify-content-center">
            <!-- <h2 class="text-center">Physical Therapists</h2> -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="team-card-one">
                    <div class="team-img">
                    </div>
                    <h3></h3>
                    <span></span>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Section End -->


    @include('front.footer')

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
