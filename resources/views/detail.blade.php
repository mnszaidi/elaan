@extends('layouts.front.layout_detail')

@section('title')
Demo College/LMS by Monis 
@endsection

@section('content')
<main class="site-main woocommerce single single-product page-wrapper">
    <!--shop category start-->
    <section class="space-3">
        <div class="container sm-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12">
                            @if(session('gmsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{ session('gmsg') }}.
                            </div>
                            @elseif(session('bmsg'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{ session('bmsg') }}.
                            </div>
                            @elseif(session('dmsg'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{ session('dmsg') }}.
                            </div>
                            @elseif(session('imsg'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              {{ session('imsg') }}.
                            </div>
                            @endif
                        </div>
                    </div>
                    <div id="product-14" class="post-14 product type-product status-publish has-post-thumbnail product_cat-accessories first instock sale shipping-taxable purchasable product-type-simple">
                        <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" >
                            <a href="#" class="woocommerce-product-gallery__trigger">
                                <img draggable="false" class="emoji" alt="🔍" src="https://s.w.org/images/core/emoji/11/svg/1f50d.svg"></a>
                            <figure class="woocommerce-product-gallery__wrapper">
                                <div data-thumb="/uploads/courses/{{$course->course_image}}" class="woocommerce-product-gallery__image" >
                                    <a href="{{ asset('uploads/courses/'.$course->course_image) }}">
                                        <img width="600" height="600" src="{{ asset('uploads/courses/'.$course->course_image) }}" class="wp-post-image" alt="" title="{{ $course->course_title }}" data-caption="" data-src="/uploads/courses/{{$course->course_image}}" data-large_image="/uploads/courses/{{$course->course_image}}" data-large_image_width="801" data-large_image_height="801" srcset="/uploads/courses/{{$course->course_image}} 600w, /uploads/courses/{{$course->course_image}} 150w, /uploads/courses/{{$course->course_image}} 300w, /uploads/courses/{{$course->course_image}} 768w, /uploads/courses/{{$course->course_image}} 100w, /uploads/courses/{{$course->course_image}} 801w" sizes="(max-width: 600px) 100vw, 600px">
                                    </a>
                                </div>
                            </figure>
                        </div>
                        <div class="summary entry-summary">
                            <h4 class="product_title entry-title">{{ $course->course_title }} </h4>
                            <p class="price"><span class="woocommerce-Price-amount amount"><span
                                    class="woocommerce-Price-currencySymbol"></span>{{ $course->currency->currency_symbol }}{{ $course->course_price }}</span> <span
                                    class="woocommerce-Price-amount amount"></p>
                            <div class="woocommerce-product-details__short-description">
                                <p>{{ $course->course_summary }}</p>
                            </div>
                            @if($exists)
                            <form class="cart grouped_form form-single-submit" action="{{ route('exams.take_exam', $course->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="subscribe_course" value="{{ $course->id }}">
                                <button type="submit" class="single_add_to_cart_button button alt">Take Exam</button>
                            </form>
                            @else
                            <form class="cart grouped_form form-single-submit" action="{{ route('subscribe.course', $course->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="subscribe_course" value="{{ $course->id }}">
                                <button type="submit" class="single_add_to_cart_button button alt">Subscribe Course</button>
                            </form>
                            @endif

                            <div class="product_meta">
                                <span class="sku_wrapper">SKU: <span class="sku">{{ $course->course_code }}</span></span>
                                <span class="posted_in">Category: <a href="#" rel="tag">{{ $course->category->category_name }}</a></span>
                            </div>
                        </div>


                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <ul class="tabs wc-tabs" role="tablist">
                                <li class="description_tab active" id="tab-title-description" role="tab" aria-controls="tab-description">
                                    <a href="#tab-description">Description</a>
                                </li>
                                <li class="additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
                                    <a href="#tab-additional_information">Additional information</a>
                                </li>
                                <li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                                    <a href="#tab-reviews">Reviews (0)</a>
                                </li>
                            </ul>
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="display: block;">

                                <h2>Description</h2>

                                <p>{{ $course->course_description }}</p>
                            </div>
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information" style="display: none;">

                                <h2>Additional information</h2>

                            </div>
                            <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab" id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews" style="display: none;">
                                <div id="reviews" class="woocommerce-Reviews">
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">Reviews</h2>
                                        <p class="woocommerce-noreviews">There are no reviews yet.</p>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--shop category end-->
</main>

@endsection