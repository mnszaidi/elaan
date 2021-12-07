<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title')</title>
    <title>@yield('description')</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ asset('front/img/favicon.ico') }}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,700i" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <!--== Icofont CSS ==-->
    <link href="{{ asset('front/css/icofont.css') }}" rel="stylesheet"/>
    <!--== ElegantIcons CSS ==-->
    <link href="{{ asset('front/css/elegantIcons.css') }}" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="{{ asset('front/css/animate.css') }}" rel="stylesheet"/>
    <!--== Aos CSS ==-->
    <link href="{{ asset('front/css/aos.css') }}" rel="stylesheet"/>
    <!--== FancyBox CSS ==-->
    <link href="{{ asset('front/css/jquery.fancybox.min.css') }}" rel="stylesheet"/>
    <!--== Slicknav CSS ==-->
    <link href="{{ asset('front/css/slicknav.css') }}" rel="stylesheet"/>
    <!--== Swiper CSS ==-->
    <link href="{{ asset('front/css/swiper.min.css') }}" rel="stylesheet"/>
    <!--== Main Style CSS ==-->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet" />

</head>

<body>

    <!--wrapper start-->
    <div class="wrapper home-default-wrapper">

        <!--== Start Preloader Content ==-->
        <div class="preloader-wrap">
            <div class="preloader">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!--== End Preloader Content ==-->

      <!--== Start Header Wrapper ==-->
      @include('layouts/front/header')
      <!--== End Header Wrapper ==-->
      <main class="main-content">
      @yield('content')
      
      </main>
      <!--== Start Footer Area Wrapper ==-->
      @include('layouts/front/footer')
      <!--== End Footer Area Wrapper ==-->

      <!--== Start Side Menu ==-->
      <aside class="off-canvas-wrapper">
          <div class="off-canvas-inner">
              <div class="off-canvas-overlay"></div>
              <!-- Start Off Canvas Content Wrapper -->
              <div class="off-canvas-content">
                  <!-- Off Canvas Header -->
                  <div class="off-canvas-header">
                      <div class="logo-area">
                          <a href="index.html"><img src="{{ asset('front/img/logo.png') }}" alt="Logo" /></a>
                      </div>
                      <div class="close-action">
                          <button class="btn-close"><i class="icofont-close"></i></button>
                      </div>
                  </div>

                <div class="off-canvas-item">
                    <!-- Start Mobile Menu Wrapper -->
                    <div class="res-mobile-menu menu-active-one">
                      <!-- Note Content Auto Generate By Jquery From Main Menu -->
                    </div>
                  <!-- End Mobile Menu Wrapper -->
                </div>
                <!-- Off Canvas Footer -->
                <div class="off-canvas-footer"></div>
              </div>
              <!-- End Off Canvas Content Wrapper -->
          </div>
      </aside>
      <!--== End Side Menu ==-->  
    </div>

    <!--=======================Javascript============================-->

    <!--=== Modernizr Min Js ===-->
    <script src="{{ asset('front/js/modernizr.js') }}"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{ asset('front/js/jquery-3.5.1.min.js') }}"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="{{ asset('front/js/jquery-migrate.js') }}"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <!--=== jquery Appear Js ===-->
    <script src="{{ asset('front/js/jquery.appear.js') }}"></script>
    <!--=== jquery Swiper Min Js ===-->
    <script src="{{ asset('front/js/swiper.min.js') }}"></script>
    <!--=== jquery Fancybox Min Js ===-->
    <script src="{{ asset('front/js/fancybox.min.js') }}"></script>
    <!--=== jquery Aos Min Js ===-->
    <script src="{{ asset('front/js/aos.min.js') }}"></script>
    <!--=== jquery Tilt Animation Js ===-->
    <script src="{{ asset('front/js/tilt-animation.js') }}"></script>
    <!--=== jquery Scene Mouse Move Min Js ===-->
    <script src="{{ asset('front/js/parallax.min.js') }}"></script>
    <!--=== jquery Slicknav Js ===-->
    <script src="{{ asset('front/js/jquery.slicknav.js') }}"></script>
    <!--=== jquery Counterup Js ===-->
    <script src="{{ asset('front/js/counterup.js') }}"></script>
    <!--=== jquery Waypoint Js ===-->
    <script src="{{ asset('front/js/waypoint.js') }}"></script>
    <!--=== jquery Wow Min Js ===-->
    <script src="{{ asset('front/js/wow.min.js') }}"></script>
    <!--=== jQuery EasyPieChart Min Js ===-->
    <script src="{{ asset('front/js/jquery.easypiechart.min.js') }}"></script>

    <!--=== Custom Js ===-->
    <script src="{{ asset('front/js/custom.js') }}"></script>

    @yield('script')
</body>

</html>