


<script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/js/waypoint.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/fancybox.js') }}"></script>
<script src="{{ asset('frontend/js/datedropper.min.js') }}"></script>
<script src="{{ asset('frontend/js/emojionearea.min.js') }}"></script>
<script src="{{ asset('frontend/js/tooltipster.bundle.min.js') }}"></script>
<script src="{{asset('frontend/js/plyr.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.lazy.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script>
    var player = new Plyr('#player');
</script>

<script>
    $(document).ready(function() {
        $('.toggleDescription').on('click', function() {

            var $descriptionContent = $('#descriptionContent');
            var $toggleButton = $(this);

            // Toggle the 'expanded' class to control the height of the content
            $descriptionContent.toggleClass('expanded');

            // Change button text and icon depending on whether the content is expanded or collapsed
            if ($descriptionContent.hasClass('expanded')) {
                $toggleButton.html('Show less <i class="la la-angle-up ml-1 fs-14"></i>');
            } else {
                $toggleButton.html('Show more <i class="la la-angle-down ml-1 fs-14"></i>');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
    $('#toggleBio').on('click', function () {
        var $bioContent = $('#bioContent');
        var $toggleButton = $(this);
        var $fullText = $('.bio-full-text');

        // Toggle the 'expanded' class to control the height of the content
        $bioContent.toggleClass('expanded');

        // Toggle full text visibility
        $fullText.toggle();

        // Change button text depending on whether the content is expanded or collapsed
        if ($bioContent.hasClass('expanded')) {
            $toggleButton.text('Show less');
        } else {
            $toggleButton.text('Show more');
        }
    });
});

</script>

