<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
        <title>{{ $title ?? 'Page Title' }}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="{{ asset('template_resource/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('template_resource/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('template_resource/css/main.css') }}">


    <!-- script "{{ asset('template_resource/css/base.css') }}"
    ================================================== -->
    <script src="{{ asset('template_resource/js/modernizr.js') }}"></script>
    <script src="{{ asset('template_resource/js/pace.min.js') }}"></script>

    <!-- favicons
     ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>
    <body>
    </body>
    <body id="top">

    <!-- header
   ================================================== -->
    <livewire:header/>

    <!-- content
    ================================================== -->
    {{ $slot }}

    <!-- footer
    ================================================== -->
    <livewire:footer/>

    <!-- Java Script
    ================================================== -->
    <script src=" {{asset('template/js/jquery-2.1.3.min.js')}} "></script>
    <script src=" {{asset('template/js/plugins.js')}} "></script>
    <script src=" {{asset('template/js/jquery.appear.js')}} "></script>
    <script src=" {{asset('template/js/main.js')}} "></script>

    </body>

</html>
