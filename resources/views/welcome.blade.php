@extends('layouts.front.layout')

@section('title')
Elaan | Social Help, Changing World
@endsection

@section('description')
<meta name="description" content="Help the Poor! Change the World">
@endsection

@section('content')
        <!--== Start Hero Area Wrapper ==-->
        <section class="home-slider-area slider-default">
          <div class="home-slider-content">
            <!-- Start Slide Item -->
            <div class="home-slider-item">
              <div class="slider-content-area">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-7">
                      <div class="content" data-aos="fade-right" data-aos-duration="1000">
                        <div class="subtitle-content">
                          <img src="{{ asset('front/img/icons/1.png') }}" alt="Givest-HasTech">
                          <h6>Change The World.</h6>
                        </div>
                        <div class="tittle-wrp">
                          <h2>Need Your Big Hand For <span>Change</span> The World.</h2>
                        </div>
                        <div class="btn-wrp">
                          <a href="causes.html" class="btn-theme btn-gradient btn-slide btn-style">All Causes <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right2.png') }}" alt="Icon"></a>
                          <a href="#/" class="btn-theme btn-border btn-black btn-style">Donate Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-right-line-dark.png') }}" alt="Icon"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 offset-md-1 col-lg-5 offset-lg-1 col-xl-5 offset-xl-0">
                      <div class="layer-style">
                        <div class="thumb scene">
                          <span class="scene-layer" data-depth="0.20">                     
                            <img class="" src="{{ asset('front/img/slider/1.jpg') }}" alt="Image-Givest">
                          </span>
                          <div class="shape-circle scene">
                            <span class="scene-layer" data-depth="0.10">
                              <img src="{{ asset('front/img/shape/circle1.png') }}" alt="Image-Givest">
                            </span>
                            <span class="scene-layer" data-depth="0.40">                        
                              <img class="circle-img" src="{{ asset('front/img/shape/2.png') }}" alt="Image-Givest">
                            </span>
                          </div>
                        </div>
                        <div class="shape-style1 scene">
                          <span class="scene-layer" data-depth="0.30">
                            <img src="{{ asset('front/img/shape/1.png') }}" alt="Image-Givest">
                          </span>
                        </div>
                        <div class="donate-circle-wrp">
                          <div class="pie-chart-circle" data-size="255" data-line-width="8" data-line-cap="butt" data-track-color="#ffffff54" data-bar-color="#fff" data-percent="68"></div>
                          <div class="donate-content">
                            <div class="raised-amount">$865M</div>
                            <img class="line-shape-img" src="{{ asset('front/img/shape/line-s2.png') }}" alt="Image-Givest">
                            <h5 class="donate-title">Total Raised</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="slider-shape">
                  <div class="shape-style1">
                    <img class="shape-img1" src="{{ asset('front/img/shape/map1.png') }}" alt="Image-Givest">
                  </div>
                  <div class="shape-style2">
                    <img class="shape-img2" src="{{ asset('front/img/shape/map2.png') }}" alt="Image-Givest">
                  </div>
                  <div class="shape-style3">
                    <img class="shape-img3" src="{{ asset('front/img/shape/banner-line1.png') }}" alt="Image-Givest">
                  </div>
                  <div class="shape-style4">
                    <img class="shape-img3" src="{{ asset('front/img/shape/banner-line2.png') }}" alt="Image-Givest">
                  </div>
                </div>
              </div>
            </div>
            <!-- End Slide Item -->
          </div>
        </section>
        <!--== End Hero Area Wrapper ==-->

        <!--== Start Service Area ==-->
        <section class="service-area service-default-area">
          <div class="container">
            <div class="row icon-box-style1" data-aos="fade-up" data-aos-duration="1000">
              <div class="col-md-6 col-lg-4">
                <div class="icon-box-item item-one mb-md-30">
                  <div class="icon-box-top">
                    <div class="icon-box">
                      <img class="icon-img" src="{{ asset('front/img/icons/s1.png') }}" alt="Icon">
                    </div>
                    <h4 class="title">Clean Water</h4>
                  </div>
                  <div class="content">
                    <div class="separator-line">
                      <img src="{{ asset('front/img/shape/line-s1.png') }}" alt="Givest-HasTech">
                    </div>
                    <p>Lorem Ipsum is simply dummy text the printing typesetng industry lorem Ipsum has been industry standard dummy text ever since.</p>
                    <a href="causes-details.html" class="btn-theme btn-white btn-border btn-size-md">View Details <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right.png') }}" alt="Icon"></a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="icon-box-item item-two mb-md-30">
                  <div class="icon-box-top">
                    <div class="icon-box">
                      <img class="icon-img" src="{{ asset('front/img/icons/s2.png') }}" alt="Icon">
                    </div>
                    <h4 class="title">Healthy Food</h4>
                  </div>
                  <div class="content">
                    <div class="separator-line">
                      <img src="{{ asset('front/img/shape/line-s1.png') }}" alt="Givest-HasTech">
                    </div>
                    <p>Lorem Ipsum is simply dummy text the printing typesetng industry lorem Ipsum has been industry standard dummy text ever since.</p>
                    <a href="causes-details.html" class="btn-theme btn-white btn-border btn-size-md">View Details <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right.png') }}" alt="Icon"></a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4">
                <div class="icon-box-item item-three">
                  <div class="icon-box-top">
                    <div class="icon-box">
                      <img class="icon-img" src="{{ asset('front/img/icons/s3.png') }}" alt="Icon">
                    </div>
                    <h4 class="title">Medical Help</h4>
                  </div>
                  <div class="content">
                    <div class="separator-line">
                      <img src="{{ asset('front/img/shape/line-s1.png') }}" alt="Givest-HasTech">
                    </div>
                    <p>Lorem Ipsum is simply dummy text the printing typesetng industry lorem Ipsum has been industry standard dummy text ever since.</p>
                    <a href="causes-details.html" class="btn-theme btn-white btn-border btn-size-md">View Details <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right.png') }}" alt="Icon"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--== End Service Area ==-->

        <!--== Start About Area ==-->
        <section class="about-area about-default-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-9">
                <div class="section-title position-relative z-index-1" data-aos="fade-up" data-aos-duration="1000">
                  <h5 class="subtitle line-theme-color">About Us.</h5>
                  <h2 class="title"><span>Givest</span> is The Non Profitable Organization.</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-xl-7">
                <div class="layer-style" data-aos="fade-up" data-aos-duration="1100">
                  <div class="thumb">
                    <div class="row m-0">
                      <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 p-0 d-none d-sm-block d-lg-none d-xl-block tilt-animation">
                        <img src="{{ asset('front/img/about/1.jpg') }}" alt="Image-Givest">
                      </div>
                      <div class="col-sm-8 col-md-8 col-lg-12 col-xl-8 p-0 tilt-animation">
                        <img class="img-two" src="{{ asset('front/img/about/2.jpg') }}" alt="Image-Givest">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-xl-5">
                <div class="about-content" data-aos="fade-up" data-aos-duration="1100">
                  <p class="text-style">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry standard.</p>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
                  <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
                  <ul class="list-icon-style">
                    <li><img class="icon-img" src="{{ asset('front/img/icons/check-double-line.png') }}" alt="Image-Givest"> Need your simple help <br>for save children.</li>
                    <li class="line-center"></li>
                    <li><img class="icon-img" src="{{ asset('front/img/icons/check-double-line.png') }}" alt="Image-Givest"> Need your simple help <br>for save children.</li>
                  </ul>
                  <a href="#/" class="btn-theme btn-gradient btn-slide">Donate Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right2.png') }}" alt="Icon"></a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--== End About Area ==-->

        <!--== Start Causes Area ==-->
        <section class="causes-area causes-default-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                            <h5 class="subtitle line-theme-color">Check Causes</h5>
                            <h2 class="title title-style">Donate For Poor People. Causes of Givest <img class="img-shape" src="{{ asset('front/img/shape/3.png') }}" alt="Image-Givest"></h2>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-md-6 col-lg-4">
                        <div class="causes-item mb-md-30">
                            <div class="thumb">
                                <img src="{{ asset('front/img/causes/01.jpg') }}" alt="Givest-HasTech">
                            </div>
                            <div class="content">
                                <ul class="donate-info">
                                  <li class="info-item">
                                    <span class="info-title">Goal:</span>
                                    <span class="amount">$ 5,000</span>
                                  </li>
                                  <li class="info-item">
                                    <span class="info-title">Raised:</span>
                                    <span class="amount">$ 2,000</span>
                                  </li>
                                  <li class="info-item">
                                    <span class="info-title">To Go:</span>
                                    <span class="amount">$ 1,000</span>
                                  </li>
                                </ul>
                                <h4 class="title"><a href="causes-details.html">Children Education Needs For Change The World.</a></h4>
                                <p>Lorem Ipsum is simply dummy text of the industry's since the unknown.</p>
                            </div>
                            <div class="causes-footer">
                                <div class="admin">
                                    <h5><a href="causes.html"><span class="icon-img"><img src="{{ asset('front/img/icons/admin1.png') }}" alt="Icon"></span> Kristin Horton</a></h5>
                                </div>
                                    <a class="btn-theme btn-border-gradient gray-border btn-size-md" href="#"><span>Donate Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right-gradient.png') }}" alt="Icon"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="causes-item mb-md-30">
                            <div class="thumb">
                                <img src="{{ asset('front/img/causes/02.jpg') }}" alt="Givest-HasTech">
                            </div>
                            <div class="content">
                                <ul class="donate-info">
                                    <li class="info-item">
                                        <span class="info-title">Goal:</span>
                                        <span class="amount">$ 5,000</span>
                                    </li>
                                    <li class="info-item">
                                        <span class="info-title">Raised:</span>
                                        <span class="amount">$ 2,000</span>
                                    </li>
                                    <li class="info-item">
                                        <span class="info-title">To Go:</span>
                                        <span class="amount">$ 1,000</span>
                                    </li>
                                </ul>
                                <h4 class="title"><a href="causes-details.html">Children Education Needs For Change The World.</a></h4>
                                <p>Lorem Ipsum is simply dummy text of the industry's since the unknown.</p>
                            </div>
                            <div class="causes-footer">
                                <div class="admin">
                                    <h5><a href="causes.html"><span class="icon-img"><img src="{{ asset('front/img/icons/admin1.png') }}" alt="Icon"></span> Kristin Horton</a></h5>
                                </div>
                                    <a class="btn-theme btn-border-gradient gray-border btn-size-md" href="#"><span>Donate Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right-gradient.png') }}" alt="Icon"></span></a>
                            </div>
                        </div>
                    </div>
                  <div class="col-md-6 col-lg-4">
                    <div class="causes-item">
                      <div class="thumb">
                        <img src="{{ asset('front/img/causes/03.jpg') }}" alt="Givest-HasTech">
                      </div>
                      <div class="content">
                        <ul class="donate-info">
                          <li class="info-item">
                            <span class="info-title">Goal:</span>
                            <span class="amount">$ 5,000</span>
                          </li>
                          <li class="info-item">
                            <span class="info-title">Raised:</span>
                            <span class="amount">$ 2,000</span>
                          </li>
                          <li class="info-item">
                            <span class="info-title">To Go:</span>
                            <span class="amount">$ 1,000</span>
                          </li>
                        </ul>
                        <h4 class="title"><a href="causes-details.html">Children Education Needs For Change The World.</a></h4>
                        <p>Lorem Ipsum is simply dummy text of the industry's since the unknown.</p>
                      </div>
                      <div class="causes-footer">
                        <div class="admin">
                          <h5><a href="causes.html"><span class="icon-img"><img src="{{ asset('front/img/icons/admin1.png') }}" alt="Icon"></span> Kristin Horton</a></h5>
                        </div>
                        <a class="btn-theme btn-border-gradient gray-border btn-size-md" href="#"><span>Donate Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right-gradient.png') }}" alt="Icon"></span></a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
        <!--== End Causes Area ==-->

        <!--== Start Donate Area ==-->
        <section class="donate-area donate-default-area bgcolor-theme3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-xxl-7">
                        <div class="content" data-aos="fade-up" data-aos-duration="1000">
                            <div class="section-title">
                                <h5 class="subtitle line-theme-color mb-7">Make A Donation</h5>
                                <h2 class="title title-style text-white">Need Pure Water For Mozambique People. <img class="img-shape" src="{{ asset('front/img/shape/3.png') }}" alt="Image-Givest"></h2>
                            </div>
                            <div class="donate-form">
                                <form action="#">
                                    <div class="amount-info">
                                        <div class="donate-amount">$20</div>
                                        <div class="donate-amount">$50</div>
                                        <div class="donate-amount">$200</div>
                                        <div class="donate-amount donate-custom-amount">
                                          <input class="form-control" type="text" placeholder="Custom">
                                        </div>
                                    </div>
                                    <div class="btn-wrp">
                                        <a href="#/" class="btn-theme btn-gradient btn-slide">Donate Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right2.png') }}" alt="Icon"></a>
                                        <a href="#/" class="btn-theme btn-gradient btn-border">Join Events <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right2-gradient.png') }}" alt="Icon"></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xxl-4 offset-xxl-1">
                        <div class="donners-content">
                            <div class="thumb-bg-layer" data-aos="fade-left" data-aos-duration="1000" data-bg-img="{{ asset('front/img/photos/bg-donate1.jpg') }}"></div>
                            <div class="donners-info" data-aos="fade-up" data-aos-duration="1000">
                                <h3>Great Donners</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry since the 1500s, when an unknown.</p>
                                <div class="donners-item">
                                    <div class="donner-item">
                                        <img src="{{ asset('front/img/photos/donner1.png') }}" alt="Image-Givest">
                                    </div>
                                    <div class="donner-item">
                                        <img src="{{ asset('front/img/photos/donner2.png') }}" alt="Image-Givest">
                                    </div>
                                    <div class="donner-item">
                                        <img src="{{ asset('front/img/photos/donner3.png') }}" alt="Image-Givest">
                                    </div>
                                    <div class="donner-item donner-number">+286</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Donate Area ==-->

        <!--== Start Funfact Area ==-->
        <section class="funfact-area funfact-default-area">
            <div class="container">
                <div class="row row-gutter-0 funfact-items-style1" data-aos="fade-up" data-aos-duration="1000">
                  <div class="col-sm-6 col-md-4 funfact-item">
                    <div class="inner-content">
                      <div class="icon-box">
                        <img class="icon" src="{{ asset('front/img/icons/f1.png') }}" alt="Image-Givest">
                        <img class="shape-img" src="{{ asset('front/img/shape/4.png') }}" alt="Image-Givest">
                      </div>
                      <div class="content">
                        <div class="number">
                          <h2><span class="counter-animate">598</span>K</h2>
                        </div>
                        <img class="line-shape" src="{{ asset('front/img/shape/funfact-line1.png') }}" alt="Image-Givest">
                        <p class="title">// Poor People</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 funfact-item">
                    <div class="inner-content">
                      <div class="icon-box">
                        <img class="icon" src="{{ asset('front/img/icons/f2.png') }}" alt="Image-Givest">
                        <img class="shape-img" src="{{ asset('front/img/shape/4.png') }}" alt="Image-Givest">
                      </div>
                      <div class="content">
                        <div class="number">
                          <h2><span class="counter-animate">897</span>M</h2>
                        </div>
                        <img class="line-shape" src="{{ asset('front/img/shape/funfact-line1.png') }}" alt="Image-Givest">
                        <p class="title">// Fund raised</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4 funfact-item">
                    <div class="inner-content">
                      <div class="icon-box">
                        <img class="icon" src="{{ asset('front/img/icons/f3.png') }}" alt="Image-Givest">
                        <img class="shape-img" src="{{ asset('front/img/shape/4.png') }}" alt="Image-Givest">
                      </div>
                      <div class="content">
                        <div class="number">
                          <h2><span class="counter-animate">998</span>+</h2>
                        </div>
                        <img class="line-shape" src="{{ asset('front/img/shape/funfact-line1.png') }}" alt="Image-Givest">
                        <p class="title">// Active Member</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
        <!--== End Funfact Area ==-->

        <!--== Start Events Area ==-->
        <section class="events-area events-default-area">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                  <h5 class="subtitle line-theme-color mb-7">Recent Events</h5>
                  <h2 class="title title-style">Join Recent Fundraising Event Of Givest. <img class="img-shape" src="{{ asset('front/img/shape/3.png') }}" alt="Image-Givest"></h2>
                </div>
                <div class="events-content events-list" data-aos="fade-up" data-aos-duration="1000">
                  <div class="event-item">
                    <div class="thumb">
                      <img class="thumb-img" src="{{ asset('front/img/events/1.jpg') }}" alt="Image-Givest">
                      <a href="event-details.html" class="btn-theme btn-gradient btn-size-sm">Join Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right.png') }}" alt="Icon"></a>
                    </div>
                    <div class="content">
                      <div class="event-info">15 January 2021  // <span>Education</span></div>
                      <h4 class="event-name"><a href="event-details.html">Need School For Mozambique Children.</a></h4>
                    </div>
                  </div>
                  <div class="event-item">
                    <div class="thumb">
                      <img class="thumb-img" src="{{ asset('front/img/events/2.jpg') }}" alt="Image-Givest">
                      <a href="event-details.html" class="btn-theme btn-gradient btn-size-sm">Join Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right.png') }}" alt="Icon"></a>
                    </div>
                    <div class="content">
                      <div class="event-info">15 January 2021  // <span>Education</span></div>
                      <h4 class="event-name"><a href="event-details.html">Need School For Mozambique Children.</a></h4>
                    </div>
                  </div>
                  <div class="event-item">
                    <div class="thumb">
                      <img class="thumb-img" src="{{ asset('front/img/events/3.jpg') }}" alt="Image-Givest">
                      <a href="event-details.html" class="btn-theme btn-gradient btn-size-sm">Join Now <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right.png') }}" alt="Icon"></a>
                    </div>
                    <div class="content">
                      <div class="event-info">15 January 2021  // <span>Education</span></div>
                      <h4 class="event-name"><a href="event-details.html">Need School For Mozambique Children.</a></h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-8 offset-2 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-4 offset-lg-0">
                <div class="layer-style" data-aos="fade-left" data-aos-duration="1000">
                  <div class="thumb tilt-animation">
                    <img src="{{ asset('front/img/photos/event1.png') }}" alt="Image-Givest">
                    <div class="play-video-btn">
                      <a class="btn-play play-video-popup wave-btn" href="https://player.vimeo.com/video/174392490?dnt=1&amp;app_id=122963"><span></span><span></span><span></span><div class="icon"><img src="{{ asset('front/img/icons/play.png') }}" alt="Icon"></div></a>
                    </div>
                  </div>
                  <div class="shape-style1">
                    <img src="{{ asset('front/img/shape/line1.png') }}" alt="Image-Givest">
                  </div>
                  <div class="shape-style2">
                    <img src="{{ asset('front/img/shape/line2.png') }}" alt="Image-Givest">
                  </div>
                  <div class="shape-style3">
                    <img src="{{ asset('front/img/shape/line3.png') }}" alt="Image-Givest">
                  </div>
                  <div class="shape-style4">
                    <img src="{{ asset('front/img/shape/line4.png') }}" alt="Image-Givest">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--== End Events Area ==-->

        <!--== Start Testimonial Area ==-->
        <section class="testimonial-area testimonial-default-area bgcolor-theme3">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-lg-4 col-xl-5">
                <div class="title-wrp" data-bg-img="{{ asset('front/img/testimonial/bg-testi1.jpg') }}" data-aos="fade-right" data-aos-duration="1000">
                  <div class="section-title">
                    <h5 class="subtitle line-white-color text-white mb-7">Recent Events</h5>
                    <h2 class="title title-style text-white">What People Say About Us. <img class="img-shape" src="{{ asset('front/img/shape/3.png') }}" alt="Image-Givest"></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-7 col-xl-6">
                <div class="testimonial-content" data-aos="fade-up" data-aos-duration="1000">
                  <div class="testimonial-slider-content">
                    <div class="swiper-container testimonial-slider-container">
                      <div class="swiper-wrapper testimonial-slider">
                        <div class="swiper-slide testimonial-single">
                          <div class="client-thumb-wrp">
                            <div class="client-thumb">
                              <img src="{{ asset('front/img/testimonial/1.png') }}" alt="Image-Givest">
                            </div>
                            <div class="quote-icon">“</div>
                          </div>
                          <div class="client-content">
                            <p>The leap into electronic typesetting, essentially unchanged was popularised the release Letraset sheets containing and more recently desktop publishing like Aldus maker including.</p>
                          </div>
                          <div class="client-info">
                            <img class="shape-line-img" src="{{ asset('front/img/shape/line-t1.png') }}" alt="Image-Givest">
                            <h4 class="name">Harvey Harrington</h4>
                            <h6 class="designation">Senior Volunteer</h6>
                          </div>
                        </div>
                        <div class="swiper-slide testimonial-single">
                          <div class="client-thumb-wrp">
                            <div class="client-thumb">
                              <img src="{{ asset('front/img/testimonial/2.png') }}" alt="Image-Givest">
                            </div>
                            <div class="quote-icon">“</div>
                          </div>
                          <div class="client-content">
                            <p>It is long established fact that reader will distract by the readable content a page when looking atten layout. The point of using  and that it has a normal distribution of letters</p>
                          </div>
                          <div class="client-info">
                            <img class="shape-line-img" src="{{ asset('front/img/shape/line-t1.png') }}" alt="Image-Givest">
                            <h4 class="name">Julia Steve</h4>
                            <h6 class="designation">Senior Volunteer</h6>
                          </div>
                        </div>
                      </div>
                      <!-- Add Arrows -->
                      <div class="navigation-wrp">
                        <div class="swiper-button-prev"><img class="icon-img" src="{{ asset('front/img/icons/test-arrow-left.png') }}" alt="Image-Icon"></div>
                        <div class="swiper-button-next"><img class="icon-img" src="{{ asset('front/img/icons/test-arrow-right.png') }}" alt="Image-Icon"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--== End Testimonial Area ==-->

        <!--== Start Blog Area Wrapper ==-->
        <section class="blog-area blog-default-area">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-lg-6 m-auto">
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                  <h5 class="subtitle line-theme-color">Blog Post</h5>
                  <h2 class="title title-style">Latest News From Givest Blog <img class="img-shape" src="{{ asset('front/img/shape/3.png') }}" alt="Image-Givest"></h2>s
                </div>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
              <div class="col-md-6 col-lg-4">
                <!--== Start Blog Post Item ==-->
                <div class="post-item mb-md-150">
                  <div class="thumb">
                    <a href="blog-details.html"><img src="{{ asset('front/img/blog/1.jpg') }}" alt="Givest-Blog"></a>
                    <div class="meta-date">
                      <a href="blog.html"><span>15</span> January</a>
                    </div>
                    <div class="shape-line"></div>
                  </div>
                  <div class="content">
                    <div class="inner-content">
                      <div class="meta">
                        <a class="post-category" href="blog.html">Education</a>
                        <div class="post-share">
                          <a class="icon-share" href="blog.html"><img src="{{ asset('front/img/icons/share-line-gradient.png') }}" alt="Icon"></a>
                          <ul>
                            <li><a class="color-facebook" href="#/"><i class="social_facebook"></i></a></li>
                            <li><a class="color-twitter" href="#/"><i class="social_twitter"></i></a></li>
                            <li><a class="color-dribbble" href="#/"><i class="social_dribbble"></i></a></li>
                            <li><a class="color-pinterest" href="#/"><i class="social_pinterest"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h4 class="title">
                        <a href="blog-details.html">Save Children Life For Future.</a>
                      </h4>
                      <p>Lorem Ipsum is simply dummy text industry since unknown..</p>
                    </div>
                    <div class="post-footer">
                      <a href="blog-details.html" class="btn-theme btn-border-gradient btn-size-xs"><span>Details <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right-gradient.png') }}" alt="Icon"></span></a>
                      <a class="post-author" href="blog.html">By: Robbins</a>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>

              <div class="col-md-6 col-lg-4">
                <!--== Start Blog Post Item ==-->
                <div class="post-item mb-md-150">
                  <div class="thumb">
                    <a href="blog-details.html"><img src="{{ asset('front/img/blog/2.jpg') }}" alt="Givest-Blog"></a>
                    <div class="meta-date">
                      <a href="blog.html"><span>25</span> January</a>
                    </div>
                    <div class="shape-line"></div>
                  </div>
                  <div class="content">
                    <div class="inner-content">
                      <div class="meta">
                        <a class="post-category" href="blog.html">Water</a>
                        <div class="post-share">
                          <a class="icon-share" href="blog.html"><img src="{{ asset('front/img/icons/share-line-gradient.png') }}" alt="Icon"></a>
                          <ul>
                            <li><a class="color-facebook" href="#/"><i class="social_facebook"></i></a></li>
                            <li><a class="color-twitter" href="#/"><i class="social_twitter"></i></a></li>
                            <li><a class="color-dribbble" href="#/"><i class="social_dribbble"></i></a></li>
                            <li><a class="color-pinterest" href="#/"><i class="social_pinterest"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h4 class="title">
                        <a href="blog-details.html">Save Children Life For Future.</a>
                      </h4>
                      <p>Lorem Ipsum is simply dummy text industry since unknown..</p>
                    </div>
                    <div class="post-footer">
                      <a href="blog-details.html" class="btn-theme btn-border-gradient btn-size-xs"><span>Details <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right-gradient.png') }}" alt="Icon"></span></a>
                      <a class="post-author" href="blog.html">By: Robbins</a>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>

              <div class="col-md-6 col-lg-4">
                <!--== Start Blog Post Item ==-->
                <div class="post-item">
                  <div class="thumb">
                    <a href="blog-details.html"><img src="{{ asset('front/img/blog/3.jpg') }}" alt="Givest-Blog"></a>
                    <div class="meta-date">
                      <a href="blog.html"><span>30</span> January</a>
                    </div>
                    <div class="shape-line"></div>
                  </div>
                  <div class="content">
                    <div class="inner-content">
                      <div class="meta">
                        <a class="post-category" href="blog.html">Health</a>
                        <div class="post-share">
                          <a class="icon-share" href="blog.html"><img src="{{ asset('front/img/icons/share-line-gradient.png') }}" alt="Icon"></a>
                          <ul>
                            <li><a class="color-facebook" href="#/"><i class="social_facebook"></i></a></li>
                            <li><a class="color-twitter" href="#/"><i class="social_twitter"></i></a></li>
                            <li><a class="color-dribbble" href="#/"><i class="social_dribbble"></i></a></li>
                            <li><a class="color-pinterest" href="#/"><i class="social_pinterest"></i></a></li>
                          </ul>
                        </div>
                      </div>
                      <h4 class="title">
                        <a href="blog-details.html">Save Children Life For Future.</a>
                      </h4>
                      <p>Lorem Ipsum is simply dummy text industry since unknown..</p>
                    </div>
                    <div class="post-footer">
                      <a href="blog-details.html" class="btn-theme btn-border-gradient btn-size-xs"><span>Details <img class="icon icon-img" src="{{ asset('front/img/icons/arrow-line-right-gradient.png') }}" alt="Icon"></span></a>
                      <a class="post-author" href="blog.html">By: Robbins</a>
                    </div>
                  </div>
                </div>
                <!--== End Blog Post Item ==-->
              </div>
            </div>
          </div>
        </section>
        <!--== End Blog Area Wrapper ==-->

        <!--== Start Brand Logo Area ==-->
        <section class="brand-logo-area brand-logo-default-area">
          <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
              <div class="col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-4 offset-lg-0 col-xl-4">
                <div class="section-title text-center text-lg-start">
                  <h2 class="title title-style mt-xl-30">Our Current Sponsors. <img class="img-shape" src="{{ asset('front/img/shape/3.png') }}" alt="Image-Givest"></h2>
                </div>
              </div>
              <div class="col-lg-8 col-xl-7 offset-xl-1">
                <div class="brand-logo-content">
                  <div class="row row-cols-3 row-cols-sm-5">
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/1.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/2.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/3.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/4.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/5.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/6.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/7.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/8.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/9.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                    <div class="col">
                      <div class="brand-logo-item">
                        <img src="{{ asset('front/img/brand-logo/10.png') }}" alt="Image-Givest">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--== End Brand Logo Area ==-->
@endsection