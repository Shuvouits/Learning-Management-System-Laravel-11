   <!-- Bootstrap JS -->
   <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
   <!-- plugins -->
   <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
   <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
   <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
   <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
   <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
   <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
   <script src="{{ asset('backend/assets/plugins/chartjs/js/chart.js') }}"></script>
   <script src="{{ asset('backend/assets/js/index.js') }}"></script>
   <!-- app JS -->
   <script src="{{ asset('backend/assets/js/app.js') }}"></script>

   <!----Sweet Alert---->

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

       <script>
           new PerfectScrollbar(".app-container")
       </script>

<script>
    @if (session('success'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#fff',
        });
    @elseif (session('error'))
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#fff',
        });

    @endif
</script>


       @stack('scripts')
