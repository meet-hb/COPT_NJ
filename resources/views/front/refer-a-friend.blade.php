<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Refer a Friend | Somerset, NJ - Comprehensive Orthopedic PT</title>
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
                <h2 style="color: #fff;">Refer a Friend</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="index">Home</a></li>
                    <li style="color: #fff;"><a href="#">Refer a Friend</a></li>
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

            <div class="row gx-5 align-items-center">
                <h2>Is it possible for Comprehensive Orthopedic Physical Therapy to assist someone you know?</h2>
                <p>
                    If you know someone who could benefit from physical therapy’s pain-relieving benefits, please tell
                    them about your experience and send them to Comprehensive Orthopedic Physical Therapy! We’d like to
                    help as many people in Somerset, NJ as possible when it comes to finding pain relief and improving
                    their mobility! We want to have a good impact on as many people as possible in order to give hope to
                    our patients.
                </p>
                <p>
                    Complete the form below if you know someone who could benefit from our services. We will reach out
                    with information on how we might be able to help!
                </p>
            </div>
            <div class="row align-items-center">
                <div id="cmt-form">
                    <form action="#" class="comment-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" required
                                        placeholder="Your Name*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" required
                                        placeholder="Your Email*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" required
                                        placeholder="Your Friend's Name*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" required
                                        placeholder="Your Friend's Email*">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="additional_comments" id="additional_comments" cols="30" rows="10"
                                        placeholder="Additional Comments"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn-one">Send Referal</button>
                            </div>
                        </div>
                    </form>
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

</html>
