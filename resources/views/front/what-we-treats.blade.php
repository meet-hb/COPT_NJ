@php
    $whatWeTreats = \App\Models\Treatment::where('is_active', 1)->where('is_deleted', 0)->get();
@endphp
<!DOCTYPE html>
<html lang="zxx">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>What We Treat | Somerset, NJ - Comprehensive Orthopedic PT</title>
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
                <h2 style="color: #fff;">What We Treat</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="index">Home</a></li>
                    <li style="color: #fff;"><a href="#">What We Treat</a></li>
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

                @foreach ($whatWeTreats as $whatWeTreat)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <a href="javascript:void(0)">
                            <div class="team-card-one">
                                <div class="team-img">
                                    <img src="{{ Storage::url($whatWeTreat->image) }}" alt="Image"
                                        style="width: 345px; height: 345px;">
                                    {{-- <div class="team-social">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quickview-modal"><i
                                                class="ri-add-line"></i></a>
                                    {{-- <a href="#" class="btn-one add-to-cart">Read
                                        More</a> --}}
                                </div>
                                <h4>{{ $whatWeTreat->treatment_name }}</h4>
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($whatWeTreat->body_description), 80, '...') }}
                                </p>
                                <a href="{{ route('front.whatWeTreat', $whatWeTreat->treatment_name) }}"
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

    @include('front.assets.js')
</body>

</html>
