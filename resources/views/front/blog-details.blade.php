<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/zigo/default/blog-details-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2025 06:03:41 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('front.assets.css')
    <title>Blog Details | Physical Therapy Somerset, NJ - Comprehensive Orthopedic PT</title>
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
                <h2 style="color: #fff;">{{ $blogDetails->name }}</h2>
                <ul class="breadcrumb-menu list-style">
                    <li style="color: #fff;"><a href="{{ route('front.index') }}">Home</a></li>

                    <li style="color: #fff;">{{ $blogDetails->name }}</li>
                </ul>
                <div class="option-item">
                    <a href="{{ route('front.appointment') }}" class="btn-two">Request Appointment</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Details Section Start -->
    <div class="blog-details-wrap ptb-100">
        <div class="container gx-5">
            <div class="row gx-5">
                <div class="col-xl-8">
                    <article>
                        <div class="post-img">
                            <img src="{{ Storage::url($blogDetails->image) }}" alt="Image">
                        </div>
                        <div class="blog-title">
                            <a href="javascript:void(0)"
                                class="blog-date"><span>{{ \Carbon\Carbon::parse($blogDetails->date)->format('d') }}</span>{{ \Carbon\Carbon::parse($blogDetails->date)->format('M') }}</a>
                            <h2>{{ $blogDetails->name }}</h2>
                        </div>
                        <div class="post-para">
                            {!! $blogDetails->blog_details !!}
                        </div>
                    </article>


                    <div id="cmt-form">
                        <div class="mb-3">
                            <h3 class="comment-box-title">Leave A Comment</h3>
                            <p>Your email address will not be published. Required fields are marked.</p>
                        </div>
                        <form id="commentForm" method="POST">
                            @csrf
                            <input type="hidden" name="blog" id="blog" value="{{ $blogDetails->name }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" required
                                            placeholder="Name*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" required
                                            placeholder="Email Address*">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Please Enter Your Comment Here"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn-one" id="submit-btn">Post A Comment</button>
                                </div>
                                <div class="col-12 mt-3" id="success-message" style="display:none;">
                                    <p style="text-align: center; color: green;">Your appointment request has been sent
                                        successfully!</p>
                                </div>
                            </div>
                        </form>
                    </div>
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
                                            name="arrow-forward-circle-outline"></ion-icon>Dresses</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Coffee Tables</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Jeans</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Sofas</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Tables TV</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Jewelry</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Electronics</a></li>
                                <li><a href="blog-left-sidebar.html"><ion-icon
                                            name="arrow-forward-circle-outline"></ion-icon>Office Desks</a></li>
                            </ul>
                        </div> --}}
                        {{-- <div class="sidebar-widget">
                            <h3 class="sidebar-widget-title">Tags</h3>
                            <ul class="tag-list list-style">
                                <li><a href="posts-by-tag.html">Exercise</a></li>
                                <li><a href="posts-by-tag.html">Health</a></li>
                                <li><a href="posts-by-tag.html">Physio</a></li>
                                <li><a href="posts-by-tag.html">Spine</a></li>
                                <li><a href="posts-by-tag.html">Pain</a></li>
                                <li><a href="posts-by-tag.html">Clinic</a></li>
                            </ul>
                        </div> --}}
                        <div class="sidebar-widget contact-widget-two">
                            <h4>How We Can Cover Injury Pain By Exercise</h4>
                            <a href="{{ route('front.contact') }}" class="btn-one d-block w-100">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Section End -->

    <!-- Footer Section Start -->
    @include('front.footer')
    <!-- Footer Section End -->

    <!-- Back to Top -->
    <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
        <i class="ri-arrow-up-line"></i>
    </button>

    @include('front.assets.js')
    <script>
        $('#commentForm').on('submit', function(e) {
            e.preventDefault();

            // Disable the submit button and change text
            $('#submit-btn').prop('disabled', true).text('Please Wait...');

            // Submit the form via AJAX
            $.ajax({
                url: "{{ route('leavecomment') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function() {
                    $('#submit-btn').prop('disabled', false).text('Leave a Comment');
                    $('#commentForm')[0].reset(); // Reset form fields
                    $('#success-message').fadeIn().delay(5000).fadeOut(); // Show success message
                },
                error: function() {
                    alert('There was an error. Please try again.');
                    $('#submit-btn').prop('disabled', false).text('Send Message');
                }
            });
        });
    </script>
</body>

</html>
