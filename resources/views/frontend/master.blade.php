
<!DOCTYPE html>
<html lang="en">
  <!-- Head Start -->
  
<!-- Mirrored from themes.pixelstrap.com/fastkart-app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Apr 2022 22:08:29 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Fastkart" />
    <meta name="keywords" content="Fastkart" />
    <meta name="author" content="Fastkart" />
    <link rel="manifest" href="manifest.json" />
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('base/images/logoatip.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('frontend/images/favicon.png')}}" />
    <meta name="theme-color" content="#0baf9a" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Fastkart" />
    <meta name="msapplication-TileImage" content="{{asset('frontend/images/favicon.png')}}" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="{{asset('frontend/css/vendors/bootstrap.css')}}" />

    <!-- Iconly Icon css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/iconly.css')}}" />

    <!-- Slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendors/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/vendors/slick-theme.css')}}" />

    <!-- Style css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="{{asset('frontend/css/style.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" integrity="sha256-sWZjHQiY9fvheUAOoxrszw9Wphl3zqfVaz1kZKEvot8=" crossorigin="anonymous">
  </head>

  <body>
    
    {{-- <script src="{{  asset('frontend/js/jquery-3.6.0.min.js')  }}"></script> --}}
    

    {{-- <script src="{{ asset('firebase-messaging-sw.js') }}" ></script> --}}

    @include('frontend.header')
     <div class="content-body">
      <div class="container-fluid">
        @yield('content')
      </div> 
    </div>  <!--sidebar -->
     
      @include('frontend.bottom')

      <!-- jquery 3.6.0 -->

<!-- Bootstrap Js -->
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>

<!-- Lord Icon -->
<script src="{{asset('frontend/js/lord-icon-2.1.0.js')}}"></script>

<!-- Feather Icon -->
<script src="{{asset('frontend/js/feather.min.js')}}"></script>

<!-- Script js -->
<script src="{{asset('frontend/js/script.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js" integrity="sha256-5WYg3s9NxGKR2MpEBTy0QMT3Gvgxl3yKjbW4l0CfUUY=" crossorigin="anonymous"></script>
  </body>
  </html>