<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!--- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title>Mantenha Simples.</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- mobile specific metas
   ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
         ================================================== -->
        <link rel="stylesheet" href="{{ asset('css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/media-queries.css') }}">

        <!-- Script
        ================================================== -->
        <script src="{{ asset('js/modernizr.js') }}"></script>

        <!-- Favicons
             ================================================== -->
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >

    </head>

    <body>

        <!-- Header-->
        @include('blog.layout._partials.header')
        <!-- Header End -->

        <!-- Content
        ================================================== -->
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


        <!-- Java Script
        ================================================== -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
        <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/main.js"></script>

    </body>

</html>