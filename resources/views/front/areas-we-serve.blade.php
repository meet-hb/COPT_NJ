@php
    $howWeTreats = howWeTreat();
    $whatWeTreat = whatWeTreat();
@endphp
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Areas we Serve | Somerset, NJ -
        Comprehensive Orthopedic PT</title>
    <style>
        ul {
            color: black;
        }
    </style>
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
                <h2 style="color: #fff;">Areas we Serve</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>
                    <li style="color: #fff;">Areas we Serve</li>
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

                <div class="project-desc">
                    <h4 style="color: black;">Comprehensive Orthopedic Physical Therapy is proud to serve in NJ.
                        Particularly Somerset, Middlesex, and Mercer counties. We are easily accessible to the following
                        areas:</h4>
                    <ul type="square">
                        <li style="color: black;font-size:13pt;"">Somerset</li>
                        <li style="color: black;font-size:13pt;"">Franklin Park
                        </li>
                        <li style="color: black;font-size:13pt;"">Kendall Park
                        </li>
                        <li style="color: black;font-size:13pt;"">Monmouth Junction
                        </li>
                        <li style="color: black;font-size:13pt;"">North Brunswick
                        </li>
                        <li style="color: black;font-size:13pt;"">New Brunswick
                        </li>
                        <li style="color: black;font-size:13pt;"">East Brunswick
                        </li>
                        <li style="color: black;font-size:13pt;"">South Brunswick
                        </li>
                        <li style="color: black;font-size:13pt;"">Dayton
                        </li>
                        <li style="color: black;font-size:13pt;"">Milltown
                        </li>
                        <li style="color: black;font-size:13pt;"">Sayreville
                        </li>
                        <li style="color: black;font-size:13pt;"">New Brunswick
                        </li>
                        <li style="color: black;font-size:13pt;"">South River
                        </li>
                        <li style="color: black;font-size:13pt;"">Princeton
                        </li>
                        <li style="color: black;font-size:13pt;"">Kingston
                        </li>
                        <li style="color: black;font-size:13pt;"">Plainsboro
                        </li>
                        <li style="color: black;font-size:13pt;"">Middlesex Borough
                        </li>
                        <li style="color: black;font-size:13pt;"">Bound Brook

                        </li>
                        <li style="color: black;font-size:13pt;"">Manville
                        </li>
                        <li style="color: black;font-size:13pt;"">Piscataway
                        </li>
                        <li style="color: black;font-size:13pt;"">South Plainfield
                        </li>
                        <li style="color: black;font-size:13pt;"">Dunellen
                        </li>
                        <li style="color: black;font-size:13pt;"">Green Brook
                        </li>
                        <li style="color: black;font-size:13pt;"">Bridgewater
                        </li>
                        <li style="color: black;font-size:13pt;"">Hillsborough
                        </li>
                        <li style="color: black;font-size:13pt;"">Edison
                        </li>
                        <li style="color: black;font-size:13pt;"">Old Bridge
                        </li>
                        <li style="color: black;font-size:13pt;"">Monroe
                        </li>
                        <li style="color: black;font-size:13pt;"">Freehold
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

    <!-- Footer Section Start -->
    @include('front.footer')
    <!-- Footer Section End -->

    @include('front.assets.js')
</body>

<!-- Mirrored from templates.hibootstrap.com/zigo/default/project-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2025 06:03:34 GMT -->

</html>
