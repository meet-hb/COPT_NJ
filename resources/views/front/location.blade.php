<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Our Locations - Physical Therapy Somerset, NJ - Comprehensive Orthopedic PT</title>
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
                <h2 style="color: #fff;">Physical Therapy Somerset, NJ</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">Physical Therapy Somerset, NJ</li>
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
                <h2>Physical Therapy Somerset, NJ</h2>
                <div class="project-desc">
                    <p>Comprehensive Orthopedic Physical Therapy in Somerset, NJ is located at <b
                            style="color: #00BFB3"> 900 Easton Ave , Suite #22 .</b></p>
                    <p>It can be hard to take the first step toward recovery, and Comprehensive Orthopedic Physical
                        Therapy understands that. If you do not know what is causing your pain, it is easy to discount
                        physical therapy as an option that can help you feel better. We want you to know that physical
                        therapy and acupuncture are healthy, natural ways to find pain relief for your condition.</p>
                    <p>
                        At our Somerset, NJ clinic, you will receive physical therapy or acupuncture that is tailored to
                        your specific needs, taking into account your symptoms, medical history, and any health
                        limitations. To identify which of our services will be most beneficial to you, we use advanced
                        diagnostic techniques and technology. Long-term pain prevention, healing, and injury avoidance
                        are the results of our thorough exams.
                    </p>
                    <p>
                        With Direct Access, health care becomes more efficient and effective, allowing you to prioritize
                        your recovery with physical therapy! If you see our physical therapist as soon as possible, you
                        will feel much better!
                    </p>
                    <p>
                        Physical therapy or acupuncture may be the answer if you have trouble living the life you want.
                        Our Somerset, NJ physical therapists and acupuncturists can help you live a healthy, pain-free
                        life again.
                    </p>
                    <p>Let Comprehensive Orthopedic Physical Therapy help you find the source of your pain once and for
                        all!</p>
                </div>

                <h2>Finding Relief at Comprehensive Orthopedic Physical Therapy</h2>
                <div class="project-desc">
                    <p>Comprehensive Orthopedic Physical Therapy’s top priority is to help you achieve your recovery,
                        health, and fitness goals. We will work hard for you and provide a warm, friendly environment
                        for you to heal safely at one of the most well-known Somerset, NJ physical therapy clinics. We
                        only succeed if we can help you succeed, and our physical therapists are here to get you back on
                        track and return to the activities you enjoy.</p>
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
                                                                900 Easton Ave #22, Somerset, NJ 08873
                                                                Somerset, NJ 08873
                                                            </li>
                                                            <li>
                                                                P:(732) 846-9400
                                                            </li>
                                                            <li>
                                                                F:(732) 846-9404
                                                            </li>
                                                            <li>
                                                                info@coptnj.com
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
                                                        <iframe
                                                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d24267.51630128956!2d-74.485536!3d40.509775!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3c726c56688b9%3A0x5e4632ff8d8371b8!2sComprehensive%20Orthopedic%20Physical%20Therapy!5e0!3m2!1sen!2sus!4v1743073584455!5m2!1sen!2sus"
                                                            width="317" height="265" style="border:0;"
                                                            allowfullscreen="" loading="lazy"
                                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
