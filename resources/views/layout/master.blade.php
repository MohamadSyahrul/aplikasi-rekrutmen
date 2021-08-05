<!DOCTYPE html>

<html lang="en">
<!-- BEGIN: Head -->

<head>
    @include('layout.head')
    <title>
        @yield('title')
    </title>

    @stack('plugin-style')

</head>
<!-- END: Head -->

<body class="app">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        @include('layout.mobile')
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            @include('layout.side')
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                @include('layout.topbar')
            </div>
            <!-- END: Top Bar -->
            @yield('content')
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="{{asset('template/dist/js/app.js')}}"></script>
    <!-- END: JS Assets-->

    @stack('plugin-scripts')

</body>

</html>
