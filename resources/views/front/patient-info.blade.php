<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('front.assets.css')
    <title>Patient Info / Forms | Physical Therapy Somerset, NJ - Comprehensive Orthopedic PT</title>
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
                <h2 style="color: #fff;">Patient Info / Forms</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="index.html">Home</a></li>
                    <li style="color: #fff;">Patient Info / Forms</li>
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
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="project-desc">
                        <p>At Comprehensive Orthopedic Physical Therapy in Somerset, NJ, our physical therapy team is
                            committed to finding the root cause of your discomfort and developing a treatment plan to
                            help you return to a fulfilling and active lifestyle.
                        </p>
                        <p>
                            Our Somerset, NJ physical therapy clinic can help you do what you love again!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gx-5 align-items-center">
                <h2>Preparing for your first appointment</h2>
                <ul style="list-style: none; padding: -1.62rem;">
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Make a list of questions you want to discuss on your first visit.
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Bring a copy of your insurance card and a photo ID with you.
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Please call our office ahead of time to verify your insurance benefits.
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Be prepared to share your medical history, previous treatments, current medications, and other
                        pertinent information.
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Make a list of any signs or symptoms that the therapist should know. What has been irritating or
                        hurting you lately? How long have you been dealing with the issue? What does it prevent you from
                        doing?
                    </li>
                </ul>
            </div>
            <div class="row gx-5 align-items-center">
                <h2>What your first appointment at Comprehensive Orthopedic Physical Therapy will be like:</h2>
                <ul style="list-style: none; padding: -1.62rem;">
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        When you arrive at our office, you will register at the front desk. We’ll handle the insurance
                        paperwork so you can focus on getting better as early as possible.
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        After that, you’ll meet with one of our physical therapists for your initial evaluation. During
                        your assessment, we will inquire about your medical history, current pain, illness, or injury.
                        Please be upfront and honest with us so that we can better understand your problem and find the
                        best solution for you!
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Our physical therapist will assess your movement, strength, and coordination during your
                        appointment.
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Based on the results of your evaluation, our physical therapist will recommend and build a
                        unique treatment plan for you. The goal will be to recuperate as quickly as possible while
                        achieving the most substantial results. On the first day, you may receive some treatments to get
                        you started on the road to recovery; however, your following visit will include a whole therapy
                        session.
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Our therapist will record their findings and treatment plan, and they can give those to your
                        referring physician or another medical expert of your choosing.
                    </li>
                    <li style="color: black;">
                        <img src="{{ url('/') }}/assets/front/img/icons8-correct-25.png" alt="">
                        Before leaving your first appointment, you will schedule the remainder of your sessions with the
                        front desk. The number of treatment sessions required is determined by our therapist and will be
                        discussed with you at your first appointment.

                    </li>
                </ul>
            </div>
            <div class="row gx-5  align-items-center">
                <h2>Save some time – fill these out beforehand!</h2>
                <p>
                    If you wish to save time on your first visit, please print the patient forms below, fill them out,
                    and bring them with you to your appointment. If you don’t have time to print them ahead of time,
                    arrive at least 25 minutes early to give yourself plenty of time to finish them before your
                    appointment.
                </p>

            </div>
            <div class="pdg-formate">
                <div class="container">
                    <div class="patient-form-listing justify-content-start" bis_skin_checked="1">
                        <div class="patient-form-item text-center cell-sm-6 cell-md-4 ptb-60" bis_skin_checked="1">
                            <div class="form-image" bis_skin_checked="1"><span class="form-number"></span>
                                <picture><img decoding="async"
                                        src="{{ url('/') }}/assets/front/img/letterhead-pdf.png"
                                        alt="New Patient Paperwork"
                                        data-lazy-src="{{ url('/') }}/assets/front/img/letterhead-pdf.png"
                                        data-ll-status="loaded" class="entered lazyloaded"><noscript><img
                                            decoding="async"
                                            src="{{ url('/') }}/assets/front/img/letterhead-pdf.png"
                                            alt="New Patient Paperwork" /></noscript></picture>
                            </div>
                            <div class="form-content" bis_skin_checked="1">
                                <h3>New Patient Paperwork</h3>
                                <div class="btn-center" bis_skin_checked="1"><a class="btn Download" target="_blank"
                                        href="{{ url('/') }}/assets/front/img/New-Patient-Paperwork.pdf">Download
                                        &amp; Print</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Footer -->
    @include('front.footer')
    <!-- End Footer -->

    @include('front.assets.js')
</body>

</html>
