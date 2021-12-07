<header>
    <!-- Main Menu Start -->
    <div class="site-navigation main_menu menu-2" id="mainmenu-area">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('welcome')}}">
                    <img src="{{ asset('front/images/logo-dark.png')}}" alt="Edutim" class="img-fluid">
                </a>

                <!-- Toggler -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">

                    <div class="category-menu d-none d-lg-block">
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-grip-horizontal"></i>Categoris
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbar3">
                                @foreach($categories as $category)
                                    <a class="dropdown-item " href="#">
                                        {{ $category->category_name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Home
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link js-scroll-trigger">
                                About
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Courses<i class="fa fa-angle-down"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shop<i class="fa fa-angle-down"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages<i class="fa fa-angle-down"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbar3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog<i class="fa fa-angle-down"></i>
                            </a>
                        </li>
                        
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                @if(Auth::user()->hasRole('Admin'))
                                    <a href="{{route('dashboard')}}" class="btn header-btn btn-main btn-small"><i class="fa fa-sign-in-alt"></i>Dashboard</a>
                                @elseif(Auth::user()->hasRole('Teacher'))
                                    <a href="{{route('teacher')}}" class="btn header-btn btn-main btn-small"><i class="fa fa-sign-in-alt"></i>Teacher's Panel</a>
                                @elseif(Auth::user()->hasRole('User'))
                                    <a href="{{route('home')}}" class="btn header-btn btn-main btn-small"><i class="fa fa-sign-in-alt"></i>Student's Panel</a>
                                @endif
                            @else
                                <a href="{{route('login')}}" class="btn header-btn btn-main btn-small"><i class="fa fa-sign-in-alt"></i>Login</a>

                                @if (Route::has('register'))
                                    <a href="{{route('register')}}" class="btn header-btn btn-main btn-small"><i class="fa fa-sign-in-alt ten-l"></i>Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    <div>
                    </div>
                   
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>
</header>