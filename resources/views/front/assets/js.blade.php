<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ url('/') }}/assets/front/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('/') }}/assets/front/js/swiper-bundle.min.js"></script>
<script src="{{ url('/') }}/assets/front/js/fslightbox.js"></script>
<script src="{{ url('/') }}/assets/front/js/aos.js"></script>
<script src="{{ url('/') }}/assets/front/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#blogRequestForm').on('submit', function(e) {
        e.preventDefault();

        // Disable the submit button and change text
        $('#submit-btn').prop('disabled', true).text('Submitting...');

        // Submit the form via AJAX
        $.ajax({
            url: "{{ route('blogRequestFormSubmit') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function() {
                $('#submit-btn').prop('disabled', false).text('Send Message');
                $('#blogRequestForm')[0].reset(); // Reset form fields
                alert('Request has been sent Successfully!');
            },
            error: function() {
                alert('There was an error. Please try again.');
                $('#submit-btn').prop('disabled', false).text('Send Message');
            }
        });
    });
</script>
