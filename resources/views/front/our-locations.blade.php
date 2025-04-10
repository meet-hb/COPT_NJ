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
        @foreach ($getLocations as $location)
            <div class="container gx-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6 p-0">
                        {!! $location->location_details !!}
                    </div>
                    <div class="col-lg-6">
                        <div class="location-info">
                            <h2>{{ $location->location_name }}</h2>
                            <ul class="contact-info list-style">
                                <li>
                                    <span>
                                        <i class="ri-map-pin-2-fill"></i>
                                    </span>
                                    <a href="#">{{ $location->address }}</a>
                                </li>
                                <li>
                                    <span>
                                        <i class="ri-phone-fill"></i>
                                    </span>
                                    <a href="tel:(732) 846-9400">{{ $location->phone }}</a>
                                </li>
                                <li>
                                    <span>
                                        <i class="fa fa-fax" aria-hidden="true"></i>
                                    </span>
                                    <a href="tel:(732) 846-9404">{{ $location->fax }}</a>
                                </li>
                                <li>
                                    <span>
                                        <i class="ri-mail-fill"></i>
                                    </span>
                                    <a href="#">{{ $location->email }}</a>
                                </li>
                            </ul>
                            <div class="location-action mt-2" style="justify-content: space-between;"
                                bis_skin_checked="1">
                                <a href="{{ route('front.location-details', $location->location_name) }}"
                                    title="{{ $location->location_name }}" class="btn primary"
                                    aria-label="Location Info">Info</a>
                                {{-- <a href="#" target="_blank"
                                    class="btn secondary mx-2" aria-label="Map Link">Map</a> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div><br>
        @endforeach

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
