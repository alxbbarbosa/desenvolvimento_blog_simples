<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!--- Basic Page Needs -->
        <meta charset="utf-8">
        <title>{{ $config->title }}</title>
        <meta name="_token" content="{{ csrf_token() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('metas')
        <!-- mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/media-queries.css') }}">

        <!-- Script -->
        <script src="{{ asset('js/modernizr.js') }}"></script>
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >

    </head>

    <body>
        <!-- Header-->
        @include('blog.layout._partials.header')
        <!-- Header End -->

        <!-- Content -->
        <div id="content-wrap">
            <div class="row">
                <div id="main" class="eight columns">
                @yield('content')
                </div> <!-- end main -->

                @include('blog.layout._partials.sidebar')
                <!-- end sidebar -->
            </div> <!-- end row -->

        </div> <!-- end content-wrap -->


        <!-- Footer -->
        @include('blog.layout._partials.footer')
        <!-- End Footer-->


        <!-- Java Script -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        @yield('js')

    </body>

</html>