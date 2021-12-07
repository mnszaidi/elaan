<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="edutim,coaching, distant learning, education html, health coaching, kids education, language school, learning online html, live training, online courses, online training, remote training, school html theme, training, university html, virtual training  ">
  
  <meta name="author" content="themeturn.com">

  <title>@yield('title')</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('front/vendors/bootstrap/bootstrap.css')}}">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="{{ asset('front/vendors/fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{ asset('front/vendors/bicon/css/bicon.min.css')}}">
  <link rel="stylesheet" href="{{ asset('front/vendors/themify/themify-icons.css')}}">
  <!-- animate.css -->
  <link rel="stylesheet" href="{{ asset('front/vendors/animate-css/animate.css')}}">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="{{ asset('front/vendors/woocommerce/woocommerce-layouts.css')}}">
  <link rel="stylesheet" href="{{ asset('front/vendors/woocommerce/woocommerce-small-screen.css')}}">
  <link rel="stylesheet" href="{{ asset('front/vendors/woocommerce/woocommerce.css')}}">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="{{ asset('front/vendors/owl/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('front/vendors/owl/assets/owl.theme.default.min.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('front/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('front/css/responsive.css')}}">

</head>

<body id="top-header">

  



<!-- Header -->
@include('layouts/front/header')

<!--Contents-->
@yield('content')



<!-- footer -->
@include('layouts/front/footer')

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="{{ asset('front/vendors/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.5 -->
    <script src="{{ asset('front/vendors/bootstrap/bootstrap.js')}}"></script>
    <!-- Counterup -->
    <script src="{{ asset('front/vendors/counterup/waypoint.js')}}"></script>
    <script src="{{ asset('front/vendors/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('front/vendors/jquery.isotope.js')}}"></script>
    <script src="{{ asset('front/vendors/imagesloaded.js')}}"></script>
    <!--  Owlk Carousel-->
    <script src="{{ asset('front/vendors/owl/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('front/js/script.js')}}"></script>

    @yield('script')
  </body>
  </html>
   