@php
    $howWeTreats = howWeTreat();
@endphp
<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>How We Treat | Somerset, NJ - Comprehensive Orthopedic PT</title>
</head>

<style>
    .btn-link {
        margin-bottom: .13rem;
        color: #00BFB3;
        font-size: 1rem;
        text-decoration: none;
        border-bottom: 1px solid transparent;
        transition: background-color 0.3s ease 0s, color 0.3s ease 0s, border-color 0.3s ease 0s;
    }
</style>

<body>

    @include('front.layout')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapr">
        <!-- <img src="assets/img/br-shape-1.webp" alt="Image" class="br-shape-one moveHorizontal"> -->
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">How We Treat</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="index">Home</a></li>
                    <li style="color: #fff;"><a href="#">How We Treat</a></li>
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
            <div class="row justify-content-center">
                @foreach ($howWeTreats as $howWeTreat)
                    @php
                        $therapy_details = \Illuminate\Support\Facades\DB::table('therapy_details')
                            ->where('therapy_id', $howWeTreat->id)
                            ->first();
                    @endphp
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <a href="javascript:void(0)">
                            <div class="team-card-one">
                                <div class="team-img">
                                    <img src="{{ Storage::url($therapy_details->image) }}" alt="Image"
                                        style="width: 345px; height: 345px;">
                                    {{-- <a href="#" class="btn-one add-to-cart">Read
                                        More</a> --}}
                                </div>
                                <h4>{{ $howWeTreat->therapy_name }}</h4>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($therapy_details->description), 80, '...') }}
                                </p>
                                <a href="{{ route('front.howWeTreat', $howWeTreat->therapy_name) }}"
                                    class="btn-one add-to-cart">Read More</a>
                            </div>
                        </a>
                    </div>
                @endforeach
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
