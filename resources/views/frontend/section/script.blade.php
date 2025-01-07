


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

<script src="{{asset('frontend/js/jquery-te-1.4.0.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.MultiFile.min.js')}}"></script>

<script src="{{ asset('frontend/js/main.js') }}"></script>
<script>
    var player = new Plyr('#player');
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<scrip>
    
    @if(session('success'))
        Swal.fire({
            toast: true,
            icon: 'success',
            title: '{{ session('success') }}',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            customClass: {
                popup: 'colored-toast' // Add a custom class for styling
            },
            background: '#7079e7', // Green background for success
            color: '#ffffff', // White text color
            iconColor: '#ffffff', // White icon color
        });
    @endif
</script>





@stack('scripts')

