<div class="footer-subscribe" bis_skin_checked="1">
    <div class="container" bis_skin_checked="1">
        <div class="subscribe-wrapper" bis_skin_checked="1">
            <div class="subscribe-wrapper-inner" bis_skin_checked="1">
                <div class="subscribe-form" bis_skin_checked="1">
                    <div id="inline-7n2Z1C2ZYW2KiyyZKRjV-div" class="ep-iFrameContainer"
                        style="border-radius: 4px; display: block;" bis_skin_checked="1">
                        <div id="inline-7n2Z1C2ZYW2KiyyZKRjV-wrapper" class="ep-wrapper" style="border-radius: 4px;"
                            bis_skin_checked="1">

                            <form id="blogRequestForm">
                                @csrf
                                <div class="form-group" style="max-width:700px;margin-bottom:0 !important;">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter your email"
                                        style="color: #000000 !important; border: 1px solid #04BFB3FF !important; border: 1px solid #04BFB3FF !important;border-radius: 40px !important;padding: 10px 25px 10px 25px;box-shadow: 0px 0px 5px 1px #CBCBCB82;font-family: 'Poppins';font-size: 14px;font-weight: 400;background-clip: inherit !important;"
                                        required>
                                </div>
                                <button type="submit" id="btn-submit" class="mt-2"
                                    style="background-color:#1F2B44FF;color:#fff; border:0px solid #04BFB300;border-radius:40px;padding:10px 25px 10px 25px;white-space:normal;width:100%;box-shadow:0px 0px 0px 0px #FFFFFF;">Subscribe</button>
                            </form>
                        </div>
                    </div>



                </div>
                <div class="footer-title mt-2" bis_skin_checked="1">Subscribe today for bimonthly free<br>healthy
                    tips
                    and exclusive offers.
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer Section Start -->
<footer class="footer-wrap">
    <div class="footer-top">
        <img src="{{ url('/') }}/assets/front/img/footer-shape-1.webp" alt="Image"
            class="footer-shape-one md-none">
        <img src="{{ url('/') }}/assets/front/img/footer-shape-2.webp" alt="Image"
            class="footer-shape-two md-none">
        <div class="container gx-5">

            <div class="row pt-100 pb-75">
                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <a href="{{ route('front.index') }}" class="footer-logo">
                            <img class="logo-light"
                                src="{{ url('/') }}/assets/front/img/comprehensive-orthopedic-physical-therapy-logo-somerset-nj-300x138.png"
                                alt="Image">
                            <!-- <img class="logo-dark" src="assets/img/logo-white.webp" alt="Image"> -->
                        </a>
                        <ul class="social-profile list-style">
                            <li>
                                <a href="https://facebook.com/coptnj" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/coptnj" target="_blank">
                                    <i class="ri-twitter-x-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/company/comprehensive-orthopedic-physical-therapy/"
                                    target="_blank">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/coptnj" target="_blank">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="footer-location-item text-start mt-lg-2" bis_skin_checked="1">
                            <div class="footer-widget-title" bis_skin_checked="1">Hours</div>


                            <p class="has-loc-icon1 text-white">
                                <i class="icon-time"></i>



                                Mon-Thurs | 9am - 8pm<br>



                                Fri | 9am - 6pm<br>



                                Sat-Sun | Closed<br>


                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">About</h3>
                        <ul class="footer-menu list-style">
                            <li>
                                <a href="{{ route('front.our-practice') }}">
                                    Our Practice
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.our-locations') }}">
                                    Our Location
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.our-team') }}">
                                    Our Team
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.career') }}">
                                    Career
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-2 col-lg-2 col-md-6 col-sm-6 ps-xl-4">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">What We Treat</h3>
                        <ul class="footer-menu list-style">
                            <li>
                                <a href="{{ route('front.whatWeTreat', ['Back Pain Relief']) }}">Back Pain Relief</a>
                            </li>
                            <li>
                                <a href="{{ route('front.whatWeTreat', ['Sciatica Pain Relief']) }}">Sciatica Relief</a>
                            </li>
                            <li>
                                <a href="{{ route('front.whatWeTreat', ['Neck Pain Relief']) }}">Neck Pain Relief</a>
                            </li>
                            <li>
                                <a href="{{ route('front.whatWeTreat', ['Shoulder Pain Relief']) }}">Shoulder Pain
                                    Relief</a>
                            </li>
                            <li>
                                <a href="{{ route('front.whatWeTreat', ['Hip Pain Relief']) }}">Hip Pain Relief</a>
                            </li>
                            <li>
                                <a href="{{ route('front.whatWeTreat', ['Knee Pain Relief']) }}">Knee Pain Relief</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">How We Treat</h3>
                        <ul class="footer-menu list-style">
                            <li>
                                <a href="{{ route('front.howWeTreat', ['Physical Therapy']) }}">
                                    Physical Therapy
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.howWeTreat', ['Physical Therapy']) }}">
                                    Manual Therapy
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.howWeTreat', ['Acupuncture']) }}">
                                    Acupuncture
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.howWeTreat', ['Alter-G']) }}">
                                    Alter-G
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.howWeTreat', ['Cupping']) }}">
                                    Cupping
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.howWeTreat', ['Fall Prevention']) }}">
                                    Fall Prevention
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 ps-xl-5">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Contact Info</h3>
                        <ul class="contact-info list-style">
                            <li>
                                <span>
                                    <i class="ri-phone-fill"></i>
                                </span>
                                <a href="tel:(732) 846-9400">(732) 846-9400</a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-phone-fill"></i>
                                </span>
                                <a href="tel:(732) 846-9404">(732) 846-9404</a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-mail-fill"></i>
                                </span>
                                <a href="#">info@coptnj.com</a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-map-pin-2-fill"></i>
                                </span>
                                <p>900 Easton Ave #22
                                    Somerset, NJ 08873</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="copyright-text"><i class="ri-copyright-line"></i>Comprehensive Orthopedic Physical Therapy 2025 | <a
            href="{{ route('front.sitemap') }}">Sitemap</a> | <a href="{{ route('front.privacy_policy') }}">Privacy
            Policy</a> | <a href="{{ route('front.terms_and_conditions') }}">Terms & Conditions</a>
    </p>
</footer>
<!-- Footer Section End -->
