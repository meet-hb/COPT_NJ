<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Physical Therapy Somerset, NJ - Comprehensive Orthopedic PT</title>
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
                <h2 style="color: #fff;">Our Practice</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">Our Practice</li>
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
            <div class="row align-items-center">

                <div class="col-xl-12 col-lg-12">
                    <div class="project-desc">
                        <p>At Comprehensive Orthopedic Physical Therapy, we have a highly experienced team of physical
                            therapists who offer specialized treatment for any orthopedic, neurological conditions,
                            Sports injuries, including pre and post-surgical patients pain, injury, or discomfort you
                            may be feeling. Our patients have found high levels of success in our treatment services,
                            due to our implementation of advanced technology and methods.</p>
                        <p>
                            A course in therapeutic care includes concise initial evaluation, periodic re-evaluation, a
                            manually oriented treatment program, and patient education. Patients benefit from many
                            resources including strength training, injury prevention and sport massage. We use
                            sophisticated diagnostic methods, such as movement investigation and gait analysis, to help
                            determine which services you will benefit from most. At Comprehensive Orthopedic Physical
                            Therapy, our thorough evaluations lead to successful treatment plans for your pain relief,
                            healing, and future injury prevention needs.
                        </p>
                        <p>
                            Our Office Comprehensive Orthopedic Physical Therapy is located just behind IHOP and Boston
                            Market at Easton Ave, Somerset, NJ with dedicated staff members that are eager to help you
                            recover.
                        </p>
                        <p>Since the last 20 year, our ambition has always been to provide leading physical therapy
                            services and elite care for those in need in Somerset and the surrounding area. Our goal is
                            to help each of our patients achieve their optimum level of mobility and function, without
                            being limited by pain or discomfort.</p>
                        <p>Make this page about How YOU work for the patient and why you do what you do. Potential
                            patients are hurting and looking for help. So talk about how you can solve their problem.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gx-5 align-items-center">
                <h2>Learn About Comprehensive Orthopedic Physical Therapy in Somerset, NJ!</h2>
                <p>Are you suffering from an ailment, condition, or injury that prevents you from fully appreciating and
                    enjoying life? There is no reason to feel alone! Comprehensive Orthopedic Physical Therapy can help
                    you feel better so you can resume your favorite activities.</p>
                <p>
                    Choose Comprehensive Orthopedic Physical Therapy if you live in Somerset, NJ and need relief from
                    pain, an injury, or a chronic ailment! We are one of the most well-known Somerset, NJ physical
                    therapy clinics, and we are ready to provide you with the relief you are looking for.
                </p>
                <div class="col-xl-12 col-lg-12 text-center">
                    <div class="single-img">
                        <img src="{{ url('/') }}/assets/front/img/comprehensive-orthopedic-physical-therapy-our-practice-somerset-nj-1024x400 (1).png"
                            alt="Image">
                    </div>
                </div>
                <!-- <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span>
                                    <i class="ri-add-line plus"></i>
                                    <i class="ri-subtract-line minus"></i>
                                </span>
                                Poor Posture
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Back pain can be caused by poor posture. If your posture is incorrect, it can strain
                                    other parts of your body, causing pain, inflammation, or dysfunction.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span>
                                    <i class="ri-add-line plus"></i>
                                    <i class="ri-subtract-line minus"></i>
                                </span>
                                Sprain/Strain
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>A back sprain occurs when you overstretch the ligaments in your spine, whereas a back
                                    strain occurs when you overstretch your back muscles.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span>
                                    <i class="ri-add-line plus"></i>
                                    <i class="ri-subtract-line minus"></i>
                                </span>
                                Herniated discs
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>These can cause significant pain in the back and radiculopathy in your thigh, leg, or
                                    foot, as well as other underlying issues. A herniated disc can also cause sciatica,
                                    which is quite painful!

                                    The good news is that physical therapy at our Somerset, NJ clinic can help you if
                                    you’re struggling with any of these conditions involving your back.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <span>
                                    <i class="ri-add-line plus"></i>
                                    <i class="ri-subtract-line minus"></i>
                                </span>
                                Degenerative disc disease (DDD)
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Degenerative disc disease is another major cause of back discomfort as we age. A
                                    dull, painful ache in the lower back is familiar in people with this condition, as
                                    is difficulty standing or walking for lengthy periods.</p>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
            <div class="row gx-5 align-items-center">
                <h2>Why do we do what we do?</h2>
                <p>
                    The team at Comprehensive Orthopedic Physical Therapy is here to help you at every stage of your
                    rehabilitation. We want you to succeed, thus our own success is contingent on yours. In order to
                    accomplish so, we provide a warm, friendly environment in which you may heal in peace and with
                    confidence!
                </p>
                <p>
                    We offer specific treatment regimens that can help you recover from an accident, avoid future
                    injuries, and relieve pain.
                </p>
            </div>
            <div class="row gx-5  align-items-center">
                <h2>Our Mission</h2>
                <p>
                    Comprehensive Orthopedic Physical Therapy is dedicated to consistently providing life-changing
                    results to everyone in Somerset, NJ that needs help with managing pain or recovering from an injury.
                    Our Somerset, NJ physical therapy clinic strives to learn new pain-relieving methods, improve our
                    skills, and, of course, provide an exceptional team environment.
                </p>
                <p>
                    <a href="{{ route('front.appointment') }}" style="color: #00bfb3; text-decoration: none;">Request
                        an appointment</a> at
                    COPTNJ with
                    one of our physical therapists today! We will be happy to meet
                    with you and create a plan for your journey toward health, healing, and pain relief.
                </p>
            </div>
            <div class="row gx-5  align-items-center">
                <h2>What does a physical therapist do?</h2>
                <p>
                    Our goal is to assist you in achieving your health and rehab objectives so that you may get back to
                    living the life you want.
                </p>
                <p>
                    We’ll evaluate your symptoms, talk about your medical history, and any health constraints you might
                    have. Our physical therapist will then devise a personalized treatment plan to help you get back on
                    your feet.
                </p>
                <p>
                    We come to work every day rooting for your recovery, and we can’t wait to see you thrive once again!
                </p>
            </div>
            <div class="row gx-5  align-items-center">
                <h2>Find True Relief For Chronic Pain and Injuries</h2>
                <p>
                    Our goal at Comprehensive Orthopedic Physical Therapy is to help you achieve your greatest physical
                    potential! Since no two people are alike, our treatment plans are individually tailored to you and
                    geared to help you achieve your goals.
                </p>
                <p>
                    It’s understandable to be apprehensive about physical therapy if you’ve never had it before. After
                    your first appointment, you’ll look back and laugh about being worried! We’re committed to helping
                    you enjoy a pain-free life once more.
                </p>
                <p>
                    Comprehensive Orthopedic Physical Therapy in Somerset, NJ has you covered when it comes to
                    addressing your discomfort. Physical therapy is a safe and effective way to rehabilitate a variety
                    of injuries and ailments. Our physical therapy center in town is available to assist you at every
                    stage of your recovery.
                </p>
                <p>
                    During your first visit, one of our physical therapists will do a thorough assessment to establish
                    the source of your pain or discomfort. Following that, you will be given a treatment plan that is
                    tailored to your specific recovery needs.
                </p>
                <p>
                    Our therapists will take into account your symptoms, medical history, and health limits when
                    creating the best recovery plan for you.
                </p>
                <p>
                    At Comprehensive Orthopedic Physical Therapy, we are confident that anyone who comes to our
                    Somerset, NJ physical therapy clinic can be helped with our expertise. We are eager to see you reach
                    your recovery goals.
                </p>
            </div>
            <div class="row gx-5  align-items-center">
                <h2>Comprehensive Orthopedic Physical Therapy Can Help You Return To A Normal Lifestyle!</h2>
                <p>
                    Comprehensive Orthopedic Physical Therapy is here to help you at every step of your journey. Our
                    success is based on your recovery. Therefore, we strive to create an environment that is comfortable
                    and caring, so you can heal.
                </p>
                <p>
                    We would be delighted to speak with you and work with you to create a treatment plan that will get
                    you on the road to healing and relief from pain. <a href="{{ route('front.appointment') }}"
                        style="color: #00bfb3; text-decoration: none;">Request an appointment</a> in Somerset, NJ
                    today!
                </p>

            </div>

        </div>
    </div>

    @include('front.footer')

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

    <!-- Link of JS files -->
    @include('front.assets.js')
</body>

<!-- Mirrored from templates.hibootstrap.com/zigo/default/project-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2025 06:03:34 GMT -->

</html>
