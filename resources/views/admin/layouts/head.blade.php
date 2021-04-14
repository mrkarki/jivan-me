<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/font-awesome/css/fontawesome-all.min.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('assets/admin/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- custom style -->
    <link href="{{ asset('assets/admin/css/custom_other.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('assets/admin/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <!-- TOASTR -->
    <link href="{{ asset('assets/admin/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @stack('style')

</head>
