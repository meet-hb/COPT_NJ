<script src="{{ url('/') }}/assets/front/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('/') }}/assets/front/js/swiper-bundle.min.js"></script>
<script src="{{ url('/') }}/assets/front/js/fslightbox.js"></script>
<script src="{{ url('/') }}/assets/front/js/aos.js"></script>
<script src="{{ url('/') }}/assets/front/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/2e81685459.js" crossorigin="anonymous"></script>
<script>
    var botmanWidget = {
        aboutText: 'COPTNJ',
        introMessage: 'Hi! Welcome to COPTNJ 👋',
        mainColor: "#00bfb3", // 👈 This changes header background color
        bubbleBackground: "#e74c3c", // Optional: Chat button color
    };
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
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
