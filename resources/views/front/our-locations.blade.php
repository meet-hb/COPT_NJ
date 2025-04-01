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
                <h2 style="color: #fff;">Physical Therapy in Somerset, Parsippany and Fairlawn</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">Physical Therapy in Somerset, Parsippany and Fairlawn</li>
                </ul>
                <div class="option-item">
                    <a href="{{ route('front.appointment') }}" class="btn-two">Request Appointment</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
    <!-- Map  -->
    <div class="locations mt-5">
        <div class="container gx-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 p-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3033.419419906208!2d-74.48806072325714!3d40.5102197499428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3c727ae3cd41b%3A0x7eaf604410f37c86!2s900%20Easton%20Ave%20%2322%2C%20Somerset%2C%20NJ%2008873!5e0!3m2!1sen!2sus!4v1741587507047!5m2!1sen!2sus"
                        width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="location-info">
                        <h2>Somerset, NJ</h2>
                        <ul class="contact-info list-style">
                            <li>
                                <span>
                                    <i class="ri-map-pin-2-fill"></i>
                                </span>
                                <a href="#">900 Easton Ave #22
                                    Somerset, NJ 08873</a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-phone-fill"></i>
                                </span>
                                <a href="tel:(732) 846-9400">(732) 846-9400</a>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-fax" aria-hidden="true"></i>
                                </span>
                                <a href="tel:(732) 846-9404">(732) 846-9404</a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-mail-fill"></i>
                                </span>
                                <a href="#">info@coptnj.com</a>
                            </li>
                        </ul>
                        <div class="location-action mt-2" style="justify-content: space-between;" bis_skin_checked="1">
                            <a href="{{ route('front.location-details', 'Somerset') }}"
                                title="Physiotherapy Somerset, NJ" class="btn primary"
                                aria-label="Location Info">Info</a><a href="#" target="_blank"
                                class="btn secondary mx-2" aria-label="Map Link">Map</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container gx-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 p-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3017.472054439015!2d-74.3764423232454!3d40.86151362844784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c30791a8cde30d%3A0x1f1d682baf768bc0!2s745%20US-46%2C%20Parsippany%2C%20NJ%2007054!5e0!3m2!1sen!2sus!4v1741589920972!5m2!1sen!2sus"
                        width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="location-info">
                        <h2>Parsippany, NJ(Coming Soon)</h2>
                        <ul class="contact-info list-style">
                            <li>
                                <span>
                                    <i class="ri-map-pin-2-fill"></i>
                                </span>
                                <a href="#">745 RT 46,
                                    Parsippany, NJ 07054</a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-phone-fill"></i>
                                </span>
                                <a href="tel:(732) 846-9400">(732) 846-9400</a>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-fax" aria-hidden="true"></i>
                                </span>
                                <a href="tel:(732) 846-9404">(732) 846-9404</a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-mail-fill"></i>
                                </span>
                                <a href="#">info@coptnj.com</a>
                            </li>

                        </ul>
                        <div class="location-action mt-2" style="justify-content: space-between;" bis_skin_checked="1">
                            <a href="{{ route('front.location-details', 'Parsippany') }}"
                                title="Parsippany, NJ(Coming Soon)" class="btn primary"
                                aria-label="Location Info">Info</a><a href="#" target="_blank"
                                class="btn secondary mx-2" aria-label="Map Link">Map</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container gx-5 mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 p-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3014.694085774874!2d-74.11895450832641!3d40.92245295087512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2fb8568d15987%3A0xed768cae5ca3e756!2s22-01%20Broadway%2C%20Fair%20Lawn%2C%20NJ%2007410!5e0!3m2!1sen!2sus!4v1741590093647!5m2!1sen!2sus"
                        width="100%" height="260" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="location-info">
                        <h2>Fairlawn, NJ(Coming Soon)</h2>
                        <ul class="contact-info list-style">
                            <li>
                                <span>
                                    <i class="ri-map-pin-2-fill"></i>
                                </span>
                                <a href="#">22-01 Broadway,
                                    Fairlawn, NJ 07410
                                </a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-phone-fill"></i>
                                </span>
                                <a href="tel:(732) 846-9400">(732) 846-9400</a>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-fax" aria-hidden="true"></i>
                                </span>
                                <a href="tel:(732) 846-9404">(732) 846-9404</a>
                            </li>
                            <li>
                                <span>
                                    <i class="ri-mail-fill"></i>
                                </span>
                                <a href="#">info@coptnj.com</a>
                            </li>

                        </ul>
                        <div class="location-action mt-2" style="justify-content: space-between;"
                            bis_skin_checked="1">
                            <a href="{{ route('front.location-details', 'Fairlawn') }}"
                                title="Physiotherapy Somerset, NJ" class="btn primary"
                                aria-label="Location Info">Info</a><a href="#" target="_blank"
                                class="btn secondary mx-2" aria-label="Map Link">Map</a>
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
