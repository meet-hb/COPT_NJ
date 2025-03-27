<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('front.assets.css')

    <title>Request Appointment</title>
</head>

<body>

    @include('front.layout')

    <!-- Start Search Modal -->
    <div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <input type="text" class="form-control" placeholder="Search here....">
                    <button type="submit"><i class="fi fi-rr-search"></i></button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="ri-close-line"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Search Modal -->

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapr">
        <!-- <img src="{{ url('/') }}/assets/front/img/br-shape-1.webp" alt="Image" class="br-shape-one moveHorizontal"> -->
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo">
        <div class="container">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">Request Appointment</h2>
                <ul class="breadcrumb-menu list-style">
                    <li><a href="{{ route('front.index') }}">Home</a></li>
                    <li><a href="#">Request Appointment</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Appointment Section Start -->
    <div class="container ptb-100">
        <div class="row gx-5">
            <div class="col-xl-10 offset-xl-1">
                <form id="appointment-form">
                    @csrf
                    <h5 class="mb-30">Request Appointment</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email Address"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="phone" id="phone" placeholder="Phone Number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="date" name="date" id="date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="service_time" id="service_time" required>
                                    <option value="" selected disabled>Preferred Time</option>
                                    <option value="1">Morning</option>
                                    <option value="2">Afternoon</option>
                                    <option value="3">Evening</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="service_refer" id="service_refer" required>
                                    <option value="" selected disabled>How did you hear about us?</option>
                                    <option value="Physician referral">Physician referral</option>
                                    <option value="Google">Google</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Friend">Friend</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="5" placeholder="Write Message" required></textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" id="submit-btn" class="btn-one d-block w-100">REQUEST
                                APPOINTMENT</button>
                        </div>

                        <!-- Success Message -->
                        <div class="col-12 mt-3" id="success-message" style="display: none;">
                            <p style="text-align: center; color: green;">Your appointment request has been sent
                                successfully!</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- Appointment Section End -->

    <!-- Footer Section Start -->
    @include('front.footer')
    <!-- Footer Section End -->
    <!-- Back to Top -->
    <button type="button" id="backtotop" class="position-fixed text-center border-0 p-0">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!-- Modal HTML -->
    <div class="modal fade" id="quickview-modal" data-bs-keyboard="false" tabindex="-1"
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
    </div>

    @include('front.assets.js')
    <script>
        $('#appointment-form').on('submit', function(e) {
            e.preventDefault();

            // Disable the submit button and change text
            $('#submit-btn').prop('disabled', true).text('Submitting...');

            // Submit the form via AJAX
            $.ajax({
                url: "{{ route('appointment.store') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function() {
                    $('#submit-btn').prop('disabled', false).text('REQUEST APPOINTMENT');
                    $('#appointment-form')[0].reset(); // Reset form fields
                    $('#success-message').fadeIn().delay(5000).fadeOut(); // Show success message
                },
                error: function() {
                    alert('There was an error. Please try again.');
                    $('#submit-btn').prop('disabled', false).text('REQUEST APPOINTMENT');
                }
            });
        });
    </script>
</body>

</html>
