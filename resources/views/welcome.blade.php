@extends('layouts.front.layout')

@section('title')
Demo College/LMS by Monis 
@endsection

@section('content')
<section class="section-padding popular-course pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span class="subheading">Top Trending Courses</span>
                    <h3>Our Popular Online Courses</h3>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="course-btn text-lg-right"><a href="#" class="btn btn-main"><i class="fa fa-store mr-2"></i>All Courses</a></div>
            </div>
        </div>
        <div class="row">
        @foreach($featured_courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="course-block">
                    <div class="course-img">
                        <img src="{{ asset('uploads/courses/'.$course->course_image) }}" class="img-fluid">
                        <span class="course-label">{{ $course->tag->tag_code }}</span>
                    </div>
                    
                    <div class="course-content">
                        <div class="course-price ">{{ $course->currency->currency_symbol }}{{ $course->course_price }}</div>   
                        
                        <h4><a href="{{ route('show.course', $course->id) }}">{{ $course->course_title }}</a></h4>  
                        <p>{{ $course->course_summary }}</p>

                        <div class="course-footer d-lg-flex align-items-center justify-content-between">
                            <div class="course-meta">
                                <span class="course-student"><i class="bi bi-group"></i>340</span>
                                <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                            </div> 
                           
                            <div class="buy-btn"><a href="{{ route('show.course', $course->id) }}" class="btn btn-main-2 btn-small">Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
<section class="about-section section-padding about-2">
    <div class="container">
        <div class="row align-items-center">
             <div class="col-lg-6 col-md-12">
               <div class="about-img2">
                   <img src="{{ asset('front/images/bg/choose.jpg')}}" alt="" class="img-fluid">
               </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="section-heading">
                    <span class="subheading">Top Categories</span>
                    <h3>Learn new skills to go ahead for your career</h3>
                </div>

                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores excepturi explicabo esse nisi molestias molestiae magni porro magnam, 
                    iusto sunt aliquid necessitatibus optio quod iste facilis similique eos voluptatum sint?</p>

                <a href="#" class="btn btn-main"><i class="fa fa-check mr-2"></i>Learn More</a>
                
            </div>
        </div>
    </div>
</section> 
<section class="feature-2">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-badge2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Expert Teacher</h4>
                        <p>Behind the word mountains, far from the countries</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-article"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Quality Education</h4>
                        <p>Behind the word mountains, far from the countries </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Life Time Support</h4>
                        <p>Behind the word mountains, far from the countries</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-item feature-style-2">
                    <div class="feature-icon">
                        <i class="bi bi-rocket2"></i>
                    </div>
                    <div class="feature-text">
                        <h4>HD Video</h4>
                        <p>Behind the word mountains, far from the countries</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--course section start-->
    <section class="section-padding course-grid" >
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="section-heading center-heading">
                        <span class="subheading">Top Trending Courses</span>
                        <h3>Over 200+ New Online Courses</h3>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <ul class="course-filter">
                    <li class="active"><a href="#" data-filter="*"> All</a></li>
                    <li><a href="#" data-filter=".cat1">printing</a></li>
                    <li><a href="#" data-filter=".cat2">Web</a></li>
                    <li><a href="#" data-filter=".cat3">illustration</a></li>
                    <li><a href="#" data-filter=".cat4">media</a></li>
                    <li><a href="#" data-filter=".cat5">crafts</a></li>
                </ul>
            </div>

            <div class="row course-gallery ">
                @foreach($courses as $course)
                <div class="course-item cat1 cat3 col-lg-4 col-md-6">
                    <div class="course-block">
                        <div class="course-img">
                            <img src="{{ asset('uploads/courses/'.$course->course_image) }}" class="img-fluid">
                            <span class="course-label">{{ $course->tag->tag_code }}</span>
                        </div>
                        
                        <div class="course-content">
                            <div class="course-price ">{{ $course->currency->currency_symbol }}{{ $course->course_price }} <span class="del">{{ $course->currency->currency_symbol }}{{ $course->course_price + 30 }}</span></div>   
                            
                            <h4><a href="{{ route('show.course', $course->id) }}">{{ $course->course_title }}</a></h4>
                            <p>{{ $course->course_summary }}</p>

                            <div class="course-footer d-lg-flex align-items-center justify-content-between">
                                <div class="course-meta">
                                    <span class="course-student"><i class="bi bi-group"></i>340</span>
                                    <span class="course-duration"><i class="bi bi-badge3"></i>82 Lessons</span>
                                </div> 
                            
                                <div class="buy-btn"><a href="{{ route('show.course', $course->id) }}" class="btn btn-main-2 btn-small">Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--course-->
    </section>
    <!--course section end-->
<section class="counter-wrap section-padding counter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-desktop"></i>
                    <div class="count">
                        <span class="counter h2">90</span>
                    </div>
                    <p>Expert Instructors</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-agenda"></i>
                    <div class="count">
                        <span class="counter h2">1450</span>
                    </div>
                    <p>Total Courses</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">         
                <div class="counter-item">
                    <i class="ti-heart"></i>
                    <div class="count">
                        <span class="counter h2">5697</span>
                    </div>
                    <p>Happy Students</p>
                </div>
            </div>
        
            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <i class="ti-microphone-alt"></i>
                    <div class="count">
                        <span class="counter h2">24</span>
                    </div>
                    <p>Creative Events</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team section-padding bg-grey">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <span class="subheading">Best Expert Teachers</span>
                    <h3>Our Professional Teachers</h3>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="course-btn text-lg-right"><a href="#" class="btn btn-main"><i class="fa fa-user mr-2"></i>Join With us</a></div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <img src="{{ asset('front/images/team/team-4.jpg')}}" alt="" class="img-fluid">
                    <div class="team-info">
                        <h4>Harish Ham</h4>
                        <p>CEO, Developer</p>

                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <img src="{{ asset('front/images/team/team-1.jpg')}}" alt="" class="img-fluid">
                    <div class="team-info">
                        <h4>Tanvir Hasan</h4>
                        <p>Market Researcher</p>
                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <img src="{{ asset('front/images/team/team-2.jpg')}}" alt="" class="img-fluid">
                    <div class="team-info">
                        <h4>Mikele John</h4>
                        <p>Content Writter</p>
                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item">
                    <img src="{{ asset('front/images/team/team-3.jpg')}}" alt="" class="img-fluid">
                    <div class="team-info">
                        <h4>Mikele John</h4>
                        <p>Content Writter</p>
                        <ul class="team-socials list-inline">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection