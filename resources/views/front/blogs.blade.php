<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/zigo/default/blog-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2025 06:03:38 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Blogs | Somerset, NJ - Comprehensive Orthopedic PT</title>
</head>

<body>
    @include('front.layout')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapr">
        <!-- <img src="assets/img/br-shape-1.webp" alt="Image" class="br-shape-one moveHorizontal"> -->
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo">
        <div class="container gx-5">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">Health Blog</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>

                    <li style="color: #fff;">Health Blog</li>
                </ul>
                <div class="option-item">
                    <a href="{{ route('front.appointment') }}" class="btn-two">Request Appointment</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->


    <!-- Blog Details Section Start -->
    <div class="blog-wrap-two ptb-100">
        <div class="container gx-5">
            <div class="row gx-5">
                <div class="col-xl-8">
                    <div class="row justify-content-center">
                        @foreach ($healthBlogs as $healthBlog)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="blog-card-one">
                                    <div class="blog-card-img">
                                        <img src="{{ Storage::url($healthBlog->image) }}" alt="Image" style="width: 329px; height: 185px;">
                                    </div>
                                    <div class="blog-card-info">
                                        <div class="blog-title">
                                            <a href="{{ route('front.blog_details', $healthBlog->id) }}"
                                                class="blog-date">
                                                <span>{{ \Carbon\Carbon::parse($healthBlog->date)->format('d') }}</span>
                                                {{ \Carbon\Carbon::parse($healthBlog->date)->format('M') }}
                                            </a>
                                            <h3>
                                                <a
                                                    href="{{ route('front.blog_details', $healthBlog->id) }}">{{ $healthBlog->name }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <ul class="page-nav list-style">
                        <!-- Previous Page Link -->
                        @if ($healthBlogs->onFirstPage())
                            <li><a href="javascript:void(0);"><img
                                        src="{{ url('/') }}/assets/front/img/icons/left-arrow-2.svg"
                                        alt="Image"></a></li>
                        @else
                            <li>
                                <a href="{{ $healthBlogs->previousPageUrl() }}"><img
                                        src="{{ url('/') }}/assets/front/img/icons/left-arrow-2.svg"
                                        alt="Image"></a>
                            </li>
                        @endif

                        <!-- Page Numbers -->
                        @foreach ($healthBlogs->getUrlRange(1, $healthBlogs->lastPage()) as $page => $url)
                            <li>
                                <a href="{{ $url }}"
                                    class="{{ $page == $healthBlogs->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Next Page Link -->
                        @if ($healthBlogs->hasMorePages())
                            <li>
                                <a href="{{ $healthBlogs->nextPageUrl() }}"><img
                                        src="{{ url('/') }}/assets/front/img/icons/right-arrow-2.svg"
                                        alt="Image"></a>
                            </li>
                        @else
                            <li><a href="javascript:void(0);"><img
                                        src="{{ url('/') }}/assets/front/img/icons/right-arrow-2.svg"
                                        alt="Image"></a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-xl-4">
                    <div class="sidebar">
                        {{-- <div class="sidebar-widget search-box">
                            <input type="search" placeholder="Search">
                            <button type="submit">
                                <i class="ri-search-line"></i>
                            </button>
                        </div> --}}
                        <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Popular Posts</h3>
                            <div class="popular-post-widget">
                                @foreach ($popularBlogs as $popularBlog)
                                    <div class="pp-post-item">
                                        <a href="{{ route('front.blog_details', $popularBlog->id) }}"
                                            class="pp-post-img">
                                            <img src="{{ Storage::url($popularBlog->image) }}" alt="Image">

                                        </a>
                                        <div class="pp-post-info">
                                            <span>{{ \Carbon\Carbon::parse($popularBlog->date)->format('d') }}
                                                {{ \Carbon\Carbon::parse($popularBlog->date)->format('M') }},
                                                {{ \Carbon\Carbon::parse($popularBlog->date)->format('Y') }}</span>
                                            <h6>
                                                <a href="{{ route('front.blog_details', $popularBlog->id) }}">
                                                    {{ $popularBlog->name }}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Categories</h3>
                            <ul class="category-list-one list-style">
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Ankle Pain Relief</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Arthritis Relief</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Back Pain Relief</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Balance Disorders</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Case Study</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Chronic Pain</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Foot Pain Relief</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Headache Relief</a></li>
                            </ul>
                        </div> --}}


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Section End -->

    @include('front.footer')


    <!-- Back to Top -->
    <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
        <i class="ri-arrow-up-line"></i>
    </button>

    @include('front.assets.js')
</body>

</html>
