<html>

<head>
    <title>RILR</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png')}}">


    <!-- Menu CSS -->
    <link href="{{ asset('assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('assets/plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Datatables CSS -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <!-- Sweet-Alert -->
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css')}}">
    <!-- animation CSS -->
    <link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet">
    <!-- needed css -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('assets/css/default.css')}}" id="theme" rel="stylesheet">

    <!-- FullCalendar -->
    <link href="{{ asset('assets/css/fullcalendar.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/calendar.css')}}" rel="stylesheet" />
    <!-- FullCalendar -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/script/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('js/functions.js')}}"></script>

    <link rel="stylesheet" href="{{asset('assets/venobox/venobox/venobox.min.css')}}" />
<script src="{{asset('assets/venobox/venobox/venobox.min.js')}}"></script>
</head>

<body onLoad="muestraReloj()" class="fix-header">



    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->


    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-boxed-layout="full" data-boxed-layout="boxed" data-header-position="fixed" data-sidebar-position="fixed" class="mini-sidebar">
        @include('header')
        @yield('content')
        @include('footer')
    </div>


    <!-- apps -->
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.init.horizontal-fullwidth.js')}}"></script>
    <script src="{{ asset('assets/js/app-style-switcher.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/js/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/js/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('assets/js/waves.js')}}"></script>
    <!-- Sweet-Alert -->
    <script src="{{ asset('assets/js/sweetalert-dev.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('assets/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('assets/js/custom.js')}}"></script>

    <!-- FullCalendar -->
    <script src="{{ asset('assets/js/moment.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/locale/es.js')}}"></script>
    <!-- FullCalendar -->

    <!-- script jquery -->
    <script type="text/javascript" src="{{ asset('assets/script/titulos.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/script2.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/validation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/script/script.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('assets/calendario/jquery-ui.css')}}" />
    {{--<script src="{{ asset('assets/calendario/jquery-ui.js')}}"></script>--}}
    <!-- script jquery -->

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/noty/packaged/jquery.noty.packaged.min.js')}}"></script>

     <!-- Calendario -->
     <link rel="stylesheet" href="{{ asset('assets/calendario/jquery-ui.css')}}" />
    <script src="{{ asset('assets/calendario/jquery-ui.js')}}"></script>
    <script src="{{ asset('assets/script/jscalendario.js')}}"></script>
    

    <!-- Calendario -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

</body>

</html>
