<!DOCTYPE html>
<html>

<!-- head section -->
@include('admin.layouts.head')

<body>
    <div id="wrapper">

        <!-- sidenavbar section -->
        @include('admin.layouts.sidenavbar')

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <!-- Topnavbar section -->
            @include('admin.layouts.topnavbar')

            <!-- content/body section -->
            @yield('content')

            <!-- this is footer section -->
            @include('admin.layouts.footer')

        </div>

    </div>

<!-- footer section -->
@include('admin.layouts.script')
</body>
</html>
