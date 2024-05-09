@extends('website.app')
@section('title')
    {{$product->name}}
@endsection
@section('content')

    <!-- Start of Page Content -->
{{--    <div class="page-content">--}}
{{--        <div class="container mt-2">--}}
{{--            <div class="row gutter-lg">--}}
{{--                <div class="main-content col-md-9">--}}
{{--                    <div class="product product-single row">--}}
{{--                        <div class="col-md-6 mb-4 mb-md-8">--}}
{{--                            <div class="product-gallery product-gallery-sticky">--}}

{{--                                <div--}}
{{--                                    class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">--}}
{{--                                    <figure class="product-image">--}}
{{--                                        <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  src="{{storageImage($product->featured_image)}}"--}}
{{--                                             data-zoom-image="{{storageImage($product->featured_image)}}"--}}
{{--                                             alt="" style="height: 600px">--}}
{{--                                    </figure>--}}
{{--                                    @foreach($product->images as $item)--}}
{{--                                        <figure class="product-image">--}}
{{--                                            <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  src="{{storageImage($item)}}"--}}
{{--                                                 data-zoom-image="{{storageImage($item)}}"--}}
{{--                                                 alt="Electronics Black Wrist Watch" style="height: 600px">--}}
{{--                                        </figure>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}

{{--                                <div class="product-thumbs-wrap">--}}
{{--                                    <div class="product-thumbs row cols-4 gutter-sm">--}}
{{--                                        <div class="product-thumb active">--}}
{{--                                            <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  src="{{storageImage($product->featured_image)}}"--}}
{{--                                                 alt="Product Thumb" style="height: 110px">--}}
{{--                                        </div>--}}
{{--                                        @foreach($product->images as $item)--}}
{{--                                            <div class="product-thumb">--}}
{{--                                                <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  src="{{storageImage($item)}}"--}}
{{--                                                     alt="Product Thumb" style="height: 110px">--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                    <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>--}}
{{--                                    <button class="thumb-down disabled"><i--}}
{{--                                            class="w-icon-angle-right"></i></button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 mb-6 mb-md-8">--}}
{{--                            <div class="product-details" data-sticky-options="{'minWidth': 767}">--}}
{{--                                <h1 class="product-title">{{$product->name}}</h1>--}}
{{--                                <div class="product-bm-wrapper">--}}
{{--                                    @if($product->owner->cover_image)--}}
{{--                                        <figure class="brand">--}}
{{--                                            <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  src="{{(storageImage($product->owner->cover_image))}}" alt="Brand"--}}
{{--                                                 width="105" style="height: 100px;"/>--}}
{{--                                        </figure>--}}
{{--                                    @endif--}}
{{--                                    <div class="product-meta">--}}
{{--                                        <div class="product-categories">--}}
{{--                                            {{__('front.category')}}:--}}
{{--                                            <span class="product-category">{{$product->category->name}}</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-sku">--}}
{{--                                            {{__('front.vendor_name')}} <span>{{$product->owner->company_name}}</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <hr class="product-divider">--}}
{{--                                <div class="product-price">--}}
{{--                                    <ins class="new-price">--}}
{{--                                        <bdi>{{$product->price ." ".getAppCurrency()->symbol}}</bdi>--}}
{{--                                    </ins>--}}
{{--                                </div>--}}
{{--                                <div class="product-short-desc">--}}
{{--                                    <ul class="list-type-check list-style-none">--}}
{{--                                        {!! $product->description !!}--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <div class="fix-bottom product-sticky-content sticky-content ">--}}
{{--                                    <div class="product-form container">--}}
{{--                                        <div class="product-qty-form">--}}
{{--                                            <div class="input-group">--}}
{{--                                                <input class="quantity form-control text-center" value="1" id="quantity" type="number" min="1"--}}
{{--                                                       max="10000000">--}}
{{--                                                <button class="quantity-plus w-icon-plus"></button>--}}
{{--                                                <button class="quantity-minus w-icon-minus"></button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <button class="btn btn-primary {{auth('user')->check()?'btn-cart':''}} add-to-cart"--}}
{{--                                                data-product="{{$product->id}}">--}}
{{--                                            <i class="w-icon-cart"></i>--}}
{{--                                            <span>{{__('front.add_cart')}}</span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="social-links-wrapper">--}}
{{--                                    <div class="social-links">--}}
{{--                                        @if($product->owner->facebook or $product->owner->twitter or $product->owner->whatsapp or $product->owner->linkedin)--}}
{{--                                            <div class="social-icons social-no-color border-thin">--}}
{{--                                                @if($product->owner->facebook)--}}
{{--                                                    <a href="{{$product->owner->facebook}}"--}}
{{--                                                       class="social-icon social-facebook w-icon-facebook"></a>--}}
{{--                                                @endif--}}
{{--                                                @if($product->owner->twitter)--}}
{{--                                                    <a href="{{$product->owner->twitter}}"--}}
{{--                                                       class="social-icon social-twitter w-icon-twitter"></a>--}}
{{--                                                @endif--}}

{{--                                                @if($product->owner->whatsapp)--}}
{{--                                                    <a href="{{$product->owner->whatsapp}}"--}}
{{--                                                       class="social-icon social-whatsapp fab fa-whatsapp"></a>--}}
{{--                                                @endif--}}
{{--                                                @if($product->owner->linkedin)--}}
{{--                                                    <a href="{{$product->owner->linkedin}}"--}}
{{--                                                       class="social-icon social-youtube fab fa-linkedin-in"></a>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        @endif--}}

{{--                                    </div>--}}
{{--                                    <span class="divider d-xs-show"></span>--}}
{{--                                    <div class="product-link-wrapper d-flex">--}}
{{--                                        <a href="#"--}}
{{--                                           class="btn-product-icon {{auth('user')->check()?'btn-wishlist':''}} add-to-wishlist--}}
{{--                                            {{auth('user')->check()?$product->isLikedBy(auth('user')->user()) ? 'w-icon-heart-full' : 'w-icon-heart':'w-icon-heart'}}"--}}
{{--                                           data-product="{{$product->id}}"><span></span></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                <!-- End of Main Content -->--}}

{{--            <!-- End of Sidebar -->--}}
{{--            </div>--}}
{{--                <div class="col-lg-3 mb-4">--}}
{{--                    @if($listProduct)--}}
{{--                        <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">--}}
{{--                            <div class="sidebar-overlay"></div>--}}
{{--                            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>--}}
{{--                            <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>--}}
{{--                            <div class="sidebar-content scrollable">--}}
{{--                                <div class="sticky-sidebar">--}}
{{--                                    <div class="widget widget-products">--}}
{{--                                        <div class="title-link-wrapper mb-2">--}}
{{--                                            <h4 class="title title-link font-weight-bold">{{__('front.more_products')}}</h4>--}}
{{--                                        </div>--}}

{{--                                        <div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{--}}
{{--                                            @if(checkCurrentLang())--}}
{{--                                            'rtl': true,--}}
{{--                                            @endif--}}
{{--                                            'nav': true,--}}
{{--                                            'dots': false,--}}
{{--                                            'items': 1,--}}
{{--                                            'margin': 20--}}
{{--                                        }">--}}
{{--                                            <div class="widget-col">--}}
{{--                                                @foreach($listProduct as $product)--}}
{{--                                                    @if($loop->index <4)--}}
{{--                                                        <div class="product product-widget">--}}
{{--                                                            <figure class="product-media">--}}
{{--                                                                <a href="{{route('user.products.show' , $product)}}">--}}
{{--                                                                    <img--}}
{{--                                                                        onerror="this.src='{{asset('web/images/no-image.jpg')}}';"--}}
{{--                                                                        src="{{storageImage($product->featured_image)}}"--}}
{{--                                                                        alt="Product"--}}
{{--                                                                        style="height: 100px !important;"/>--}}
{{--                                                                </a>--}}
{{--                                                            </figure>--}}
{{--                                                            <div class="product-details">--}}
{{--                                                                <h4 class="product-name">--}}
{{--                                                                    <a href="{{route('user.products.show' , $product)}}">{{$product->name}}</a>--}}
{{--                                                                </h4>--}}
{{--                                                                <div--}}
{{--                                                                    class="product-price"> &nbsp;{{$product->price . ' ' . getAppCurrency()->symbol}}&nbsp; </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}

{{--                                            </div>--}}
{{--                                            <div class="widget-col">--}}
{{--                                                @foreach($listProduct as $product)--}}

{{--                                                    @if($loop->index >3)--}}
{{--                                                        <div class="product product-widget">--}}
{{--                                                            <figure class="product-media">--}}
{{--                                                                <a href="{{route('user.products.show' , $product)}}">--}}
{{--                                                                    <img--}}
{{--                                                                        onerror="this.src='{{asset('web/images/no-image.jpg')}}';"--}}
{{--                                                                        src="{{storageImage($product->featured_image)}}"--}}
{{--                                                                        alt="Product"--}}
{{--                                                                        style="height: 100px !important;"/>--}}
{{--                                                                </a>--}}
{{--                                                            </figure>--}}
{{--                                                            <div class="product-details">--}}
{{--                                                                <h4 class="product-name">--}}
{{--                                                                    <a href="{{route('user.products.show' , $product)}}">{{$product->name}}</a>--}}
{{--                                                                </h4>--}}
{{--                                                                <div--}}
{{--                                                                    class="product-price">{{$product->price . ' ' . getAppCurrency()->symbol}}</div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </aside>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End of Page Content -->--}}


        <!-- Shop Detail Start -->
        <div class="container-fluid py-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border">

                            @foreach($product->images as $key=> $item)
                                <div class="carousel-item {{$key == 0 ? 'active':""}}">
                                    <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  src="{{storageImage($item)}}"
                                         data-zoom-image="{{storageImage($item)}}"
                                         alt="Electronics Black Wrist Watch" class="w-100 " style="max-height: 500px">
                                </div>
                            @endforeach



                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-7 pb-5">
                    <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
{{--                    <div class="d-flex mb-3">--}}
{{--                        <div class="text-primary mr-2">--}}
{{--                            <small class="fas fa-star"></small>--}}
{{--                            <small class="fas fa-star"></small>--}}
{{--                            <small class="fas fa-star"></small>--}}
{{--                            <small class="fas fa-star-half-alt"></small>--}}
{{--                            <small class="far fa-star"></small>--}}
{{--                        </div>--}}
{{--                        <small class="pt-1">(50 Reviews)</small>--}}
{{--                    </div>--}}
                    <h3 class="font-weight-semi-bold mb-4">{{$product->price}}</h3>
                    <p class="mb-4">   {!! $product->description !!}</p>
{{--                    <div class="d-flex mb-3">--}}
{{--                        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>--}}
{{--                        <form>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="size-1" name="size">--}}
{{--                                <label class="custom-control-label" for="size-1">XS</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="size-2" name="size">--}}
{{--                                <label class="custom-control-label" for="size-2">S</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="size-3" name="size">--}}
{{--                                <label class="custom-control-label" for="size-3">M</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="size-4" name="size">--}}
{{--                                <label class="custom-control-label" for="size-4">L</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="size-5" name="size">--}}
{{--                                <label class="custom-control-label" for="size-5">XL</label>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex mb-4">--}}
{{--                        <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>--}}
{{--                        <form>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="color-1" name="color">--}}
{{--                                <label class="custom-control-label" for="color-1">Black</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="color-2" name="color">--}}
{{--                                <label class="custom-control-label" for="color-2">White</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="color-3" name="color">--}}
{{--                                <label class="custom-control-label" for="color-3">Red</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="color-4" name="color">--}}
{{--                                <label class="custom-control-label" for="color-4">Blue</label>--}}
{{--                            </div>--}}
{{--                            <div class="custom-control custom-radio custom-control-inline">--}}
{{--                                <input type="radio" class="custom-control-input" id="color-5" name="color">--}}
{{--                                <label class="custom-control-label" for="color-5">Green</label>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus" style="height: 37px;
    padding-top: 7px;">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control bg-secondary text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus" style="height: 37px;
    padding-top: 7px;">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <button class="btn btn-primary px-3 {{auth('user')->check()?'btn-cart' :''}} add-to-cart" data-product="{{$product->id}}" ><i class="fa fa-shopping-cart mr-1"></i> {{__('front.add_cart')}}</button>
                    </div>
                    <div class="d-flex pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="row px-xl-5">--}}
{{--                <div class="col">--}}
{{--                    <div class="nav nav-tabs justify-content-center border-secondary mb-4">--}}
{{--                        <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>--}}
{{--                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>--}}
{{--                        <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>--}}
{{--                    </div>--}}
{{--                    <div class="tab-content">--}}
{{--                        <div class="tab-pane fade show active" id="tab-pane-1">--}}
{{--                            <h4 class="mb-3">Product Description</h4>--}}
{{--                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>--}}
{{--                            <p>Dolore magna est eirmod sanctus dolor, amet diam et eirmod et ipsum. Amet dolore tempor consetetur sed lorem dolor sit lorem tempor. Gubergren amet amet labore sadipscing clita clita diam clita. Sea amet et sed ipsum lorem elitr et, amet et labore voluptua sit rebum. Ea erat sed et diam takimata sed justo. Magna takimata justo et amet magna et.</p>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="tab-pane-2">--}}
{{--                            <h4 class="mb-3">Additional Information</h4>--}}
{{--                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <ul class="list-group list-group-flush">--}}
{{--                                        <li class="list-group-item px-0">--}}
{{--                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.--}}
{{--                                        </li>--}}
{{--                                        <li class="list-group-item px-0">--}}
{{--                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.--}}
{{--                                        </li>--}}
{{--                                        <li class="list-group-item px-0">--}}
{{--                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.--}}
{{--                                        </li>--}}
{{--                                        <li class="list-group-item px-0">--}}
{{--                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <ul class="list-group list-group-flush">--}}
{{--                                        <li class="list-group-item px-0">--}}
{{--                                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.--}}
{{--                                        </li>--}}
{{--                                        <li class="list-group-item px-0">--}}
{{--                                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.--}}
{{--                                        </li>--}}
{{--                                        <li class="list-group-item px-0">--}}
{{--                                            Duo amet accusam eirmod nonumy stet et et stet eirmod.--}}
{{--                                        </li>--}}
{{--                                        <li class="list-group-item px-0">--}}
{{--                                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="tab-pane-3">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <h4 class="mb-4">1 review for "Colorful Stylish Shirt"</h4>--}}
{{--                                    <div class="media mb-4">--}}
{{--                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">--}}
{{--                                        <div class="media-body">--}}
{{--                                            <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>--}}
{{--                                            <div class="text-primary mb-2">--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star"></i>--}}
{{--                                                <i class="fas fa-star-half-alt"></i>--}}
{{--                                                <i class="far fa-star"></i>--}}
{{--                                            </div>--}}
{{--                                            <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <h4 class="mb-4">Leave a review</h4>--}}
{{--                                    <small>Your email address will not be published. Required fields are marked *</small>--}}
{{--                                    <div class="d-flex my-3">--}}
{{--                                        <p class="mb-0 mr-2">Your Rating * :</p>--}}
{{--                                        <div class="text-primary">--}}
{{--                                            <i class="far fa-star"></i>--}}
{{--                                            <i class="far fa-star"></i>--}}
{{--                                            <i class="far fa-star"></i>--}}
{{--                                            <i class="far fa-star"></i>--}}
{{--                                            <i class="far fa-star"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <form>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="message">Your Review *</label>--}}
{{--                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="name">Your Name *</label>--}}
{{--                                            <input type="text" class="form-control" id="name">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="email">Your Email *</label>--}}
{{--                                            <input type="email" class="form-control" id="email">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group mb-0">--}}
{{--                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <!-- Shop Detail End -->


        <!-- Products Start -->
        <div class="container-fluid py-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">{{__('front.you_may_also_like')}}</span></h2>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel">
                        @if($listProduct)
                            @foreach($listProduct as $product)
                                                @if($loop->index <4)
                        <div class="card product-item border-0">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100"
                                     onerror="this.src='{{asset('web/images/no-image.jpg')}}';"
                                     src="{{storageImage($product->featured_image)}}"
                                     alt="Product"
                                     width="150px"
                                     height="150px"
                                    >
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>$123.00</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{route('user.products.show' , $product)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" data-product="{{$product->id}}" class="btn btn-sm text-dark p-0 {{auth('user')->check()?'btn-cart' :''}} add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1 "></i>{{__('front.add_cart')}}</a>

                            </div>
                        </div>
                                    @endif
                                    @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <!-- Products End -->

@endsection

