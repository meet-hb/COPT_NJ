<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/zigo/default/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Feb 2025 06:03:41 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link of CSS files -->
    @include('front.assets.css')
    <title>Contact Us | Physical Therapy Somerset, NJ - Comprehensive Orthopedic PT</title>
</head>

<body>




    @include('front.layout')

    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-wrapr">
        <!-- <img src="{{ url('/') }}/assets/front/img/br-shape-1.webp" alt="Image" class="br-shape-one moveHorizontal"> -->
        <img src="{{ url('/') }}/assets/front/img/br-shape-2.webp" alt="Image"
            class="br-shape-two animationFramesTwo">
        <div class="container gx-5">
            <div class="breadcrumb-content">
                <h2 style="color: #fff;">Contact</h2>
                <ul class="breadcrumb-menu list-style">
                    <li><a href="{{ route('front.index') }}">Home</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="option-item">
                    <a href="{{ route('front.appointment') }}" class="btn-two">Request Appointment</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumb Section End -->

    <!-- Contact Section Start -->
    <div class="container gx-5 pt-100">
        <div class="row gx-5 pb-75 justify-content-center">

            <div class="col-xl-8 col-lg-7 col-12 justify-content-center">
                <div class="section-title-one  mb-30">
                    <span>Contact With Us</span>
                    <h2>GET IN TOUCH WITH US</h2>
                </div>
                <form class="form-wrap" id="contactForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" id="name" placeholder="Name" required
                                    data-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email Address" required
                                    data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="phone" id="phone" placeholder="Phone Number" required
                                    data-error="Please enter your phone">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" placeholder="Subject"
                                    data-error="Please enter your subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Write Message" required
                                    data-error="Please enter your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <div class="form-group">
                                <div class="form-check checkbox">
                                    <input name="gridCheck" value=""
                                        class="form-check-input" type="checkbox" id="gridCheck" required>
                                    <label class="form-check-label mx-3" for="gridCheck">
                                        I agree to the <a class="link-one" href="#">Terms &amp;
                                            Conditions</a> and <a class="link-one" href="#">Privacy
                                            Policy</a>
                                    </label>
                                    <div class="help-block with-errors gridCheck-error"></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <button type="submit" class="btn-one d-block w-100" id="submit-btn">Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-12 mt-3" id="success-message" style="display: none;">
                            <p style="text-align: center; color: green;">Your appointment request has been sent
                                successfully!</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                            <a href="mailto:info@coptnj.com">info@coptnj.com</a>
                        </li>
                        <div class="location-action mt-2" style="justify-content: space-between;"
                            bis_skin_checked="1">
                            <a href="#" target="_blank" class="btn secondary mx-2"
                                aria-label="Map Link">Map</a>
                        </div>
                    </ul>

                </div>

            </div>
        </div>
    </div><br><br>

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
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            // Disable the submit button and change text
            $('#submit-btn').prop('disabled', true).text('Submitting...');

            // Submit the form via AJAX
            $.ajax({
                url: "{{ route('contactus') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function() {
                    $('#submit-btn').prop('disabled', false).text('Send Message');
                    $('#contactForm')[0].reset(); // Reset form fields
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
