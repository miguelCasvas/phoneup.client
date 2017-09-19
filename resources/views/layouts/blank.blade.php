<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

        <!-- NProgress -->
        <link href="{{ asset("vendors/nprogress/nprogress.css") }}" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="{{ asset("vendors/bootstrap-daterangepicker/daterangepicker.css") }}" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->
        <link href="{{ asset("vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css") }}" rel="stylesheet">
        <!-- Ion.RangeSlider -->
        <link href="{{ asset("vendors/normalize-css/normalize.css") }}" rel="stylesheet">
        <link href="{{ asset("vendors/ion.rangeSlider/css/ion.rangeSlider.css") }}" rel="stylesheet">
        <link href="{{ asset("vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css") }}" rel="stylesheet">
        <!-- Bootstrap Colorpicker -->
        <link href="{{ asset("vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css") }}" rel="stylesheet">

        <link href="{{ asset("vendors/cropper/dist/cropper.min.css") }}" rel="stylesheet">

        @stack('stylesheets')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('includes/sidebar')

                @include('includes/topbar')

                @yield('main_container')

                @include('includes/footer')

            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset("js/jquery.min.js") }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset("js/gentelella.min.js") }}"></script>

        <!-- FastClick -->
        <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
        <!-- NProgress -->
        <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <!-- bootstrap-datetimepicker -->
        <script src="{{ asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
        <!-- Ion.RangeSlider -->
        <script src="{{ asset('vendors/ion.rangeSlider/js/ion.rangeSlider.min.js') }}"></script>
        <!-- Bootstrap Colorpicker -->
        <script src="{{ asset('vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
        <!-- jquery.inputmask -->
        <script src="{{ asset('vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') }}"></script>
        <!-- jQuery Knob -->
        <script src="{{ asset('vendors/jquery-knob/dist/jquery.knob.min.js') }}"></script>
        {{--<!-- Cropper -->--}}
        {{--<script src="{{ asset('vendors/cropper/dist/cropper.min.js') }}"></script>--}}


        @stack('scripts')

    </body>
</html>