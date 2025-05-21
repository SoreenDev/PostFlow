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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard-resource/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('dashboard-resource/images/favicon.png') }}" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @fluxAppearance
    @livewireStyles

</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
             {{ $slot }}
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('dashboard-resource/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('dashboard-resource/js/off-canvas.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/misc.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/settings.js') }}"></script>
<script src="{{ asset('dashboard-resource/js/todolist.js') }}"></script>
@livewireScripts
@fluxScripts
<!-- endinject -->
</body>
</html>

