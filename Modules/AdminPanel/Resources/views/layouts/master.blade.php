<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Focus Admin: Creative Admin Dashboard</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ asset('/backend-theme/css/lib/calendar2/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/backend-theme/css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/backend-theme/css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/backend-theme/css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('/backend-theme/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/backend-theme/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/backend-theme/css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('/backend-theme/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{ asset('/backend-theme/css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/backend-theme/css/lib/helper.css')}}" rel="stylesheet">
    <link href="{{ asset('/backend-theme/css/style.css')}}" rel="stylesheet">
</head>

<body>


    <!-- /# sidebar -->
    @include('adminpanel::layouts.nav-bar')

    <!-- /# header -->
    @include('adminpanel::layouts.header')

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
                <!-- /# row -->
                <section id="main-content">
                    @include('adminpanel::layouts.footer')
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="{{ asset('/backend-theme/js/lib/jquery.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/jquery.nanoscroller.min.js')}}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('/backend-theme/js/lib/menubar/sidebar.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/preloader/pace.min.js')}}"></script>
    <!-- sidebar -->

    <script src="{{ asset('/backend-theme/js/lib/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/scripts.js')}}"></script>
    <!-- bootstrap -->

    <script src="{{ asset('/backend-theme/js/lib/calendar-2/moment.latest.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/calendar-2/pignose.calendar.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/calendar-2/pignose.init.js')}}"></script>


    <script src="{{ asset('/backend-theme/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/weather/weather-init.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/circle-progress/circle-progress-init.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/chartist/chartist.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/sparklinechart/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/sparklinechart/sparkline.init.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('/backend-theme/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
    <!-- scripit init-->
    <script src="{{ asset('/backend-theme/js/dashboard2.js')}}"></script>
</body>

</html>
