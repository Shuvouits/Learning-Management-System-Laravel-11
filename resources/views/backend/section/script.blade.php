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

   <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

   <!----Sweet Alert---->

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

   <!------Select2----->

   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script src="{{ asset('backend/assets/plugins/select2/js/select2-custom.js') }}"></script>

   <!-- summernote JS -->

   <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

   <script>
       new PerfectScrollbar(".app-container")
   </script>

   <script>
       $(document).ready(function() {
           $('#example').DataTable();
       });
   </script>

   <!----Photo Preview Script ----->

   <script>
       $(document).ready(function() {
           $('#Photo').on('change', function(event) {
               const [file] = event.target.files;
               if (file) {
                   $('#photoPreview')
                       .attr('src', URL.createObjectURL(file))
                       .css('display', 'block'); // Show the image preview
               }
           });
       });
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


<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200, // Set the height of the editor
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>





   @stack('scripts')
