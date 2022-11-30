<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from tixia.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 10:25:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('base/images/atip.png')}}">
	<link rel="stylesheet" href="{{asset('base/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('base/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}}" rel="stylesheet">
	<link href="{{asset('base/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('base/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">  

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" >

    @include('layouts.header')
      <!--sidebar -->

      @include('layouts.sidebar')

   
        <!-- Isi Content -->
          @yield('content')
        
        

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Developed by <a href="https://sukumaya.co.id/" target="_blank">Sukumaya</a> 2022</p>
            </div>
        </div>
</div>

<script src="{{asset('base/vendor/global/global.min.js')}}"></script>
	{{-- <script src="{{asset('base/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script> --}}
	<script src="{{asset('base/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('base/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
	<script src="{{asset('base/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
	<!-- Apex Chart -->
	<!-- <script src="{{asset('base/vendor/apexchart/apexchart.js')}}"></script> -->
	
	<!-- Chart piety plugin files -->
    <script src="{{asset('base/vendor/peity/jquery.peity.min.js')}}"></script>	
	
	<!-- Dashboard 1 -->
	<script src="{{asset('base/js/dashboard/dashboard-1.js')}}"></script>
	
    <script src="{{asset('base/js/custom.min.js')}}"></script>
	<script src="{{asset('base/js/deznav-init.js')}}"></script>
	<script src="{{asset('base/js/demo.js')}}"></script>
    <!-- <script src="{{asset('base/js/styleSwitcher.js')}}"></script> -->

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
     @stack('page-scripts')
    @stack('after-scripts')

    {{-- notification --}}
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    
	
</body>

<!-- Mirrored from tixia.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Jul 2021 10:26:22 GMT -->
</html>