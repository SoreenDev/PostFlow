<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'none' }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('dashboard-resource/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-resource/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href=" {{ asset('dashboard-resource/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href=" {{ asset('dashboard-resource/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('dashboard-resource/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('dashboard-resource/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('dashboard-resource/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('dashboard-resource/images/favicon.png') }}" />
    @livewireStyles
</head>
<body>

{{ $slot }}
<!-- plugins:js -->
<script src="{{ asset('dashboard-resource/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('dashboard-resource/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dashboard-resource/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('dashboard-resource/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('dashboard-resource/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('dashboard-resource/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/jquery.cookie.js') }}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('dashboard-resource/js/off-canvas.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/misc.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/settings.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('dashboard-resource/js/dashboard.js') }}"></script>
@livewireScripts
<!-- End custom js for this page -->
</body>
</html>
