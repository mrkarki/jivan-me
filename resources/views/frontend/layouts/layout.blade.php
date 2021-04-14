<!DOCTYPE html>
<html>

<!-- head section -->
@include('frontend.layouts.head')

<body class="js">
    <!-- head section -->
    @include('frontend.layouts.header')

    <!-- content/body section -->
    @yield('content')

    <!-- this is footer section -->
    @include('frontend.layouts.footer')
    <!-- footer scripts -->
    @include('frontend.layouts.script')

</body>

</html>
