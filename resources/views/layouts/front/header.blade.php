<div class="top-bar background-gray">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block"><span class="__cf_email__" data-cfemail="afc6c1c9c0efd6c0daddcbc0c2cec6c181ccc0c2">[email&#160;protected]</span></span></a>
                    <span class="mx-md-2 d-inline-block"></span>
                    <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">+44 (208) 1234567</span></a>
                    <div class="float-right">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    @if(Auth::user()->hasRole('SuperAdmin|Admin'))
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Dashboard</a>
                                        @elseif(Auth::user()->hasRole('Management'))
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Dashboard</a>
                                        @elseif(Auth::user()->hasRole('Accounts'))
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Manage Accounts</a>
                                        @elseif(Auth::user()->hasRole('Assisstant'))
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Manage Accounts</a>
                                        @elseif(Auth::user()->hasRole('SalesMarketing'))
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Sales Dashboard</a>
                                        @elseif(Auth::user()->hasRole('FrontDesk'))
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Manage Front Desk</a>
                                        @elseif(Auth::user()->hasRole('DataEntry'))
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Data Managment</a>
                                        @elseif(Auth::user()->hasRole('Employee'))
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-settings m-r-5 m-l-5"></i> My Profile</a>
                                        @elseif(Auth::user()->hasRole('Dealer'))
                                        <a class="dropdown-item" href="#">
                                            <i class="ti-settings m-r-5 m-l-5"></i> My dashboard</a>
                                        @elseif(Auth::user()->hasRole('Customer'))
                                        <a class="dropdown-item" href="{{ route('customer') }}">
                                            <i class="ti-settings m-r-5 m-l-5"></i> My Shipments</a>
                                        @endif
                                    @else
                                        <div class="float-right">
                                            <a href="{{ route('login') }}" class=""><i class="mdi mdi-account-check"></i></span> <span class="d-none d-md-inline-block">Login</span></a>
                                                <span class="mx-md-2 d-inline-block"></span>
                                            <a href="{{ route('register') }}" class=""><i class="mdi mdi-account-check"></i></span> <span class="d-none d-md-inline-block">Register</span></a>
                                        </div>
                                @endauth
                            </div>
                        @endif
                    </div>
                
            </div>
        </div>
    </div>
</div>
<!--== Start Header Wrapper ==-->
  <header class="header-area header-default sticky-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 pr-0">
          <div class="header-logo-area">
            <a href="index.html">
              <img class="logo-main" src="{{ asset('front/img/logo.png') }}" alt="Logo" />
              <img class="logo-light" src="{{ asset('front/img/logo.png') }}" alt="Logo" />
            </a>
          </div>
        </div>
        <div class="col-9 col-sm-10 col-md-10 col-lg-10">
          <div class="header-align">
            <div class="header-navigation-area">
              <ul class="main-menu nav justify-content-center">
                <li class="active"><a href="{{ route('welcome')}}">Home</a></li>
                <li><a href="{{ route('about')}}">About Us</a></li>
                <li class="has-submenu"><a href="#">Causes</a>
                  <ul class="submenu-nav">
                    <li><a href="{{ route('causes')}}">Causes</a></li>
                  </ul>
                </li>
                <li class="has-submenu"><a href="#">Pages</a>
                  <ul class="submenu-nav">
                    <li><a href="{{ route('blogs')}}">Blogs</a></li>
                    <li><a href="{{ route('faqs')}}">FAQs</a></li>
                    <li><a href="{{ route('sponsers')}}">Sponsers</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('developer')}}">Developers</a></li>
                <li><a href="{{ route('contact')}}">Contact Us</a></li>
              </ul>
            </div>
            <div class="header-action-area">
              <button class="btn-menu d-xl-none">
                <span></span>
                <span></span>
                <span></span>
              </button>
              <a href="{{ route('donate')}}" class="btn-theme btn-gradient btn-slide btn-style">Give Support <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right2.png') }}" alt="Icon"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->