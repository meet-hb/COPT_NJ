<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Direct Access | Somerset, NJ -
        Comprehensive Orthopedic PT</title>
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
                <h2 style="color: #fff;">Direct Access</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">Direct Access</li>
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
                <h2>Newsflash: You Don’t Need A Referral To See A Physical
                    Therapist!</h2>
                <div class="project-desc">
                    <p>Imagine waking up with pain in your back that becomes
                        worse as the day progresses. When you phone
                        your doctor’s office, you’re told that the next
                        available appointment is three days away! That
                        means you’re in for another three days of pain. If
                        only there was a way to get in touch with
                        someone who could help you sooner!</p>
                    <p>
                        You’re in luck because there is! Every state has
                        approved legislation allowing physical therapists to
                        assess and treat patients without the need for a
                        doctor’s referral.
                    </p>
                    <p>
                        With Direct Access, health care becomes more efficient and effective, allowing you to prioritize
                        your recovery with physical therapy! If you see our physical therapist as soon as possible, you
                        will feel much better!
                    </p>
                    <p>
                        Direct Access also saves you money and allows you to go back to your normal routine more
                        quickly. Direct Access is all about being able to make your own judgments without being
                        constrained by regulations. It gives you control over your medical treatment.
                    </p>
                    <p>
                        Continue reading to learn more about the benefits of Direct Access, and be sure to contact
                        Comprehensive Orthopedic Physical Therapy in Somerset, NJ today if you have any questions or
                        would like to set up an appointment to be seen by a physical therapist!
                    </p>
                </div>

                <h2>Direct Access Myths</h2>
                <div class="project-desc">
                    <p>Many people believe that Direct Access refers to outpatient physical therapy; however, it also
                        relates to treatment in pediatric facilities, private home care, school districts, hospitals,
                        and sports fields. Direct Access is much more common than the general public realizes.</p>
                    <p>
                        Another popular misconception is that Direct Access is not available in all states. In some
                        form, Direct Access is available in all 50 states and the District of Columbia. While the
                        program continues to have some limitations, the foundation was laid, and regulations will be
                        revised in the future to ensure that you receive the care you need when you want it.
                    </p>

                </div>

                <h2>What to know about health insurance and direct access</h2>
                <div class="project-desc">
                    <p>Although the health insurance sector is continually changing, Direct Access covers a wide range
                        of private health insurance carriers.</p>
                    <p>
                        Medicare will cover the cost of service if the physical therapist sets a treatment plan for the
                        patient. Keep in mind that before beginning treatment, the physical therapist must have the plan
                        of care reviewed and signed off on by a licensed doctor.
                    </p>
                    <p>
                        Direct Access to physical therapy has many benefits. Including but not limited to:
                    </p>
                    <ul>
                        <li>Patients reported a higher level of satisfaction when they received physical therapy through
                            Direct Access versus physician referral.</li>
                        <li>
                            Patients receiving physical therapy through direct access versus referral had better
                            outcomes at discharge.
                        </li>
                    </ul>

                </div>
                <h2>Better health is just a phone call away</h2>
                <div class="project-desc">
                    <p>ADirect Access is changing access to healthcare. If you or someone you love would like to learn
                        more about Direct Access to physical therapy or how physical therapy can combat chronic pain of
                        any sort, schedule an appointment with a Somerset, NJ physical therapist.</p>
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
