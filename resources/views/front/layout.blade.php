@php
    $howWeTreats = howWeTreat();
    $whatWeTreat = whatWeTreat();
    $half = ceil($whatWeTreat->count() / 2);
    $firstHalf = $whatWeTreat->slice(0, $half);
    $secondHalf = $whatWeTreat->slice($half);
@endphp


<style>


</style>
<!--  Preloader Start -->
{{-- <div class="loader-wrapper">
    <div class="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div> --}}
<!--  Preloader End -->

<div class="navbar-area header-one bg-white" id="navbar">
    <!-- <div class="topbar" style="background-color: #00BFB3;">
        <div class="container">
            <div class="top ">
                <p  style="color: #fff;">We now accept Medicare!</p>
            </div>
        </div>

     </div> -->
    <div data-name="wenowacceptmedicare" id="address-bar" class="address-bar" style="">
        <div class="address-text">
            <p>We now accept Medicare!</p>
        </div>
        {{-- <i class="address-close icon-close">x</i> --}}
    </div>
    <div class="container-fluid nav-first">
        <div class="container p-2">
            <div class="top d-flex justify-content-between align-items-center">

                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div class="logo-part d-flex container gap-3">
                        <img class="logo-light loog"
                            src="{{ url('/') }}/assets/front/img/comprehensive-orthopedic-physical-therapy-logo-somerset-nj-300x138.png"
                            alt="logo">
                        <img class="logo-light loog" src="{{ url('/') }}/assets/front/img/Reactive-trans.png"
                            alt="logo">
                    </div>

                    <!-- <img class="logo-dark" src="{{ url('/') }}/assets/front/img/logo-white.webp" alt="logo"> -->
                </a>
                <ul class="header-links container iconn-con">
                    <li class="call"><a href="tel:7328469400" class="call-tracking btn enable-act">(732) 846-9400</a>
                    </li>
                    <li class="review"><a
                            href="https://search.google.com/local/writereview?placeid=ChIJuYhmxSbHw4kRuHGDjf8yRl4"
                            target="_blank" class="btn">Review Us</a></li>
                    <div class="option-item">
                        <a href="{{ route('front.appointment') }}" class="btn-two">Request Appointment</a>
                    </div>
                </ul>


            </div>

        </div>



        <nav class="navbar navbar-expand-lg container-fluid">

            {{-- <a class="navbar-brand d-flex" href="{{ url('/') }}">
                <div class="logo-part d-flex container gap-3">
                    <img class="logo-light"
                        src="{{ url('/') }}/assets/front/img/comprehensive-orthopedic-physical-therapy-logo-somerset-nj-300x138.png"
                        alt="logo">
                    <img class="logo-light" src="{{ url('/') }}/assets/front/img/Reactive-trans.png"
                        alt="logo">
                </div>

                 <img class="logo-dark" src="{{ url('/') }}/assets/front/img/logo-white.webp" alt="logo">
            </a> --}}
            <div class="d-none call-icon ms-5">
                <a class="sidebar-toggler">
                    <a href="tel:7328469400">
                        <img src="{{ url('/') }}/assets/front/img/icons8-call-40.png" alt="Image"></a>
                </a>
            </div>
            <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button"
                aria-controls="navbarOffcanvas">
                <span class="burger-menu">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </span>
            </a>




            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('front.our-practice') }}" class="dropdown-toggle nav-link">
                            ABOUT US
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="{{ route('front.our-practice') }}" class="nav-link">
                                    OUR PRACTICE
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.our-locations') }}" class="nav-link">
                                    OUR LOCATIONS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.our-team') }}" class="nav-link">
                                    OUR TEAM
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.career') }}" class="nav-link">
                                    CAREER
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.whatWeTreatMain') }}" class="dropdown-toggle nav-link">
                            WHAT WE TREAT
                        </a>
                        <ul class="dropdown-menu we">
                            <div class="row">
                                <div class="col-lg-6">
                                    @foreach ($firstHalf as $treat)
                                        <li class="nav-item">
                                            <a href="{{ route('front.whatWeTreat', $treat->treatment_name) }}"
                                                class="nav-link">
                                                {{ strtoupper($treat->treatment_name) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                                <div class="col-lg-6">
                                    @foreach ($secondHalf as $treat)
                                        <li class="nav-item">
                                            <a href="{{ route('front.whatWeTreat', $treat->treatment_name) }}"
                                                class="nav-link">
                                                {{ strtoupper($treat->treatment_name) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.howWeTreatMain') }}" class="dropdown-toggle nav-link">
                            HOW WE TREAT
                        </a>
                        <ul class="dropdown-menu how">
                            @foreach ($howWeTreats as $howWeTreat)
                                <li class="nav-item">
                                    <a href="{{ route('front.howWeTreat', $howWeTreat->therapy_name) }}"
                                        class="nav-link">
                                        {{ strtoupper($howWeTreat->therapy_name) }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.patientInfo') }}" class="dropdown-toggle nav-link">
                            PATIENT INFO
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="{{ route('front.patientInfo') }}" class="nav-link">
                                    PATIENT INFO / FORMS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.directAccess') }}" class="nav-link">
                                    DIRECT ACCESS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.insuranceInfo') }}" class="nav-link">
                                    INSURANCE INFO
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Reviews
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('front.referAFriend') }}" class="nav-link">
                                    REFER A FRIEND
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('front.faq') }}" class="nav-link">
                                    FAQS
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.health-blog') }}" class="nav-link">
                            HEALTH BLOG
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="{{ route('front.contact') }}" class="nav-link">
                            CONTACT
                        </a>
                    </li>
                </ul>
                <div class="others-option d-none d-flex align-items-center">
                    <div class="option-item">
                        <a class="sidebar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button"
                            aria-controls="navbarOffcanvas">
                            <img src="{{ url('/') }}/assets/front/img/icons/sidebar-menu.svg" alt="Image">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Start Responsive Navbar Area -->
<div class="responsive-navbar offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1"
    id="navbarOffcanvas">
    <div class="offcanvas-header">
        <a href="{{ url('/') }}" class="logo d-inline-block d-flex">
            <img class="logo-light"
                src="{{ url('/') }}/assets/front/img/comprehensive-orthopedic-physical-therapy-logo-somerset-nj-300x138.png"
                alt="logo">
            <img class="logo-light mx-2" src="{{ url('/') }}/assets/front/img/Reactive-trans.png"
                alt="logo" style="width: 180px;">
            <!-- <img class="logo-dark" src="{{ url('/') }}/assets/front/img/logo-white.webp" alt="logo"> -->
        </a>
        <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="navbarAccordion">
            <div class="accordion-item">
                <button class="accordion-button collapsed active" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    ABOUT US
                </button>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion2">
                            <div class="accordion-item">
                                <a class="accordion-link active" href="{{ route('front.our-practice') }}">
                                    OUR PRACTICE
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="{{ route('front.our-locations') }}">
                                    OUR LOCATIONS
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="{{ route('front.our-team') }}">
                                    OUR TEAM
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="{{ route('front.career') }}">
                                    CAREER
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapZigour" aria-expanded="false" aria-controls="collapZigour">
                    WHAT WE TREAT
                </button>
                <div id="collapZigour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion45">
                            @foreach ($whatWeTreat as $treat)
                                <div class="accordion-item">
                                    <a class="accordion-link"
                                        href="{{ route('front.whatWeTreat', $treat->treatment_name) }}">
                                        {{ strtoupper($treat->treatment_name) }}
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapHowTreat" aria-expanded="false" aria-controls="collapHowTreat">
                    HOW WE TREAT
                </button>
                <div id="collapHowTreat" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion45">
                            @foreach ($howWeTreats as $howWeTreat)
                                <div class="accordion-item">
                                    <a href="{{ route('front.howWeTreat', $howWeTreat->therapy_name) }}"
                                        class="nav-link">
                                        {{ strtoupper($howWeTreat->therapy_name) }}
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapPatientInfo" aria-expanded="false" aria-controls="collapPatientInfo">
                    PATIENT INFO
                </button>
                <div id="collapPatientInfo" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion45">
                            <div class="accordion-item">
                                <a href="{{ route('front.patientInfo') }}" class="nav-link">
                                    PATIENT INFO / FORMS
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="{{ route('front.directAccess') }}" class="nav-link">
                                    DIRECT ACCESS
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="{{ route('front.insuranceInfo') }}" class="nav-link">
                                    INSURANCE INFO
                                </a>
                            </div>
                            {{-- <div class="accordion-item">
                                <a href="#" class="nav-link">
                                    Reviews
                                </a>
                            </div> --}}
                            <div class="accordion-item">
                                <a href="{{ route('front.referAFriend') }}" class="nav-link">
                                    REFER A FRIEND
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="{{ route('front.faq') }}" class="nav-link">
                                    FAQS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('front.health-blog') }}">
                    HEALTH BLOG
                </a>
            </div>

            <div class="accordion-item">
                <a class="accordion-button without-icon" href="{{ route('front.contact') }}">
                    CONTACT
                </a>
            </div>
        </div>
        <div class="offcanvas-contact-info">
            <h4>Contact Info</h4>
            <ul class="contact-info list-style">
                <li>
                    <i class="ri-map-pin-fill"></i>
                    <p>900 Easton Ave #22
                        Somerset, NJ 08873</p>
                </li>
                <li>
                    <i class="ri-mail-fill"></i>
                    <a href="mailto:info@coptnj.com">
                        info@coptnj.com</a>
                </li>
                <li>
                    <i class="ri-phone-fill"></i>
                    <a href="tel:(732) 846-9400">(732) 846-9400</a>
                </li>
                <li>
                    <i class="fa fa-fax" aria-hidden="true"></i>
                    <a href="tel:7328469404">(732) 846-9404</a>
                </li>
            </ul>
            <ul class="social-profile list-style">
                <li><a href="https://www.facebook.com/coptnj" target="_blank"><i class="ri-facebook-fill"></i></a>
                </li>
                <li><a href="https://www.instagram.com/coptnj" target="_blank"><i class="ri-instagram-line"></i></a>
                </li>
                <li><a href="https://www.linkedin.com/company/comprehensive-orthopedic-physical-therapy/"
                        target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                <li><a href="https://www.twitter.com/coptnj" target="_blank"><i class="ri-twitter-x-fill"></i></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UC4avEkzY30hpdvJUEbbr4wA" target="_blank">
                        <i class="ri-youtube-line"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="others-option d-flex d-lg-none align-items-center">
            <div class="option-item">
                <a href="{{ route('front.appointment') }}" class="btn-two">Request Appointment</a>
            </div>
        </div>
    </div>
</div>
