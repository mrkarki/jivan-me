    <!-- Mainly scripts -->
    <script src="{{ asset('assets/admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- TOASTR -->
    <script src="{{ asset('assets/admin/js/plugins/toastr/toastr.min.js') }}"></script>

    <!-- GITTER -->
    <script src="{{ asset('assets/admin/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('assets/admin/js/inspinia.js') }}"></script>

    <script>
        @if(Session::has('success'))
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success("{{ Session::get('success') }}");

                }, 1300);
        @endif
    </script>
@stack('js')
