@extends('website.app')
@section('title', __('front.home'))
@section('content')

    <!-- Featured Start -->
    <div class="container-fluid  my-5 py-4">
        <div class="text-center my-4 py-4">
            <h2 class="section-title px-5"><span class="px-2">{{ __('front.features') }}</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">{{ __('front.Quality_Product') }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">{{ __('front.Free_Shipping') }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0"> {{ __('front.Day_Return') }} </h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0"> {{ __('front.Support') }} </h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
    <hr>

    <!-- Categories Start -->
    @if (count($subCategories) > 0)
        <div class="container-fluid my-5 py-4">
            <div class="text-center my-4 py-4">
                <h2 class="section-title px-5"><span class="px-2">{{ __('front.categories') }}</span></h2>
            </div>
            <div class="row px-xl-5 pb-3">
                @foreach ($subCategories as $sub)
                    @if($sub->product_count > 0)
                        <div class="col-lg-3 col-md-6 pb-1">
                            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                                <a href="{{ route('user.products.index', ['category' => $sub->id]) }}"
                                    class="cat-img position-relative overflow-hidden mb-3">
                                    <p class="text-right">
                                        {{ $sub->product_count . ' ' . __('front.products') }}
                                    </p>
                                    @if(!is_null($sub->image))
                                        <img class="img-fluid w-100" src="{{ asset($sub->image) }}" 
                                            style="height: 220px" onerror="this.src='{{storageImage($sub->image)}}'">
                                    @endif
                                </a>
                                <h5 class="font-weight-semi-bold m-0">{{ $sub->name }}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
        <hr>
    @endif
    <!-- Categories End -->
    <!-- Offer Start -->
    <div class="container-fluid offer  my-5 py-4">
        <div class="text-center my-4 py-4">
            <h2 class="section-title px-5">
                <span class="px-2">
                    {{ __('front.offers') }}
                </span>
            </h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-primary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="{{ asset('web/img/offer-1.png') }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-white mb-3">
                            {{ __('front.sales') }} 20% {{ __('front.of_all_orders') }}
                        </h5>
                        @if(checkCurrentLang() == 'ar')
                            <h1 class="mb-4 text-white font-weight-semi-bold">
                                {{ __('front.collection') }} {{ __('front.summer') }}                                
                            </h1>
                        @else
                            <h1 class="mb-4 text-white font-weight-semi-bold">
                                {{ __('front.summer') }} {{ __('front.collection') }}
                            </h1>
                        @endif
                        <a class="btn btn-outline-primary text-white py-md-2 px-md-3">
                            {{ __('front.shop_now') }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 pb-4">
                <div class="position-relative bg-primary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="{{ asset('web/img/offer-2.png') }}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-white mb-3">
                            {{ __('front.sales') }} 20% {{ __('front.of_all_orders') }}
                        </h5>
                        @if(checkCurrentLang() == 'ar')
                            <h1 class="mb-4 text-white font-weight-semi-bold">
                                {{ __('front.collection') }} {{ __('front.winter') }}
                            </h1>
                        @else
                            <h1 class="mb-4 text-white font-weight-semi-bold">
                                {{ __('front.winter') }} {{ __('front.collection') }}
                            </h1>
                        @endif
                        <a class="btn btn-outline-primary text-white py-md-2 px-md-3">
                            {{ __('front.shop_now') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->
    <hr>
    <!-- Subscribe Start -->
    <div class="container-fluid my-5 py-4">
        <div class="py-3 px-xl-5">
            <div class="bg-primary row justify-content-md-center">
                <div class="col-md-6 col-12 py-3">
                    <div class="text-center mb-4">
                        <h2 class="section-title px-5 ">
                            <span class="px-2 text-white bg-primary">{{ __('front.stay_updated') }}</span>
                        </h2>
                    </div>
                    <p class="text-white text-center">
                        Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo
                        labore labore.
                    </p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-4" placeholder="{{ __('front.email') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary text-white px-4">{{ __('front.subscribe') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->
    <hr>
    <!-- Products Start -->
    <div class="container-fluid my-5 py-4 ">
        <div class="text-center my-4 py-4">
            <h2 class="section-title px-5">
                <span class="px-2">
                    {{ __('front.trandy_products') }}
                </span>
            </h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ storageImage($product->featured_image) }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $product->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ $product->price_before_discount }}</h6>
                                <h6 class="text-muted ml-2">
                                    <del>{{ $product->price }}</del>
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('user.products.show', $product) }}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary mr-1"></i>
                                {{ __('front.view_details') }}
                            </a>
                            <a href=""  data-product="{{ $product->id }}"
                                class="btn btn-sm text-dark p-0 {{ auth('user')->check() ? 'btn-cart' : '' }} add-to-cart">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>
                                {{ __('front.add_cart') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->
    <hr>
    <!-- Products Start -->
    <div class="container-fluid my-5 py-4">
        <div class="text-center my-4 py-4">
            <h2 class="section-title px-5">
                <span class="px-2">
                    {{ __('front.just_arrived') }}
                </span>
            </h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ storageImage( $product->featured_image) }}"
                                alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">
                                {{ $product->name }}
                            </h6>
                            <div class="d-flex justify-content-center">
                                <h6>
                                    {{ $product->price_before_discount }}
                                </h6>
                                <h6 class="text-muted ml-2">
                                    <del>{{ $product->price }}</del>
                                </h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ route('user.products.show', $product) }}" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-eye text-primary mr-1"></i>
                                {{ __('front.view_details') }}
                            </a>
                            <a href="#" data-product="{{ $product->id }}"
                                class="btn btn-sm text-dark p-0 {{ auth('user')->check() ? 'btn-cart' : '' }} add-to-cart">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>
                                {{ __('front.add_cart') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Products End -->
    <hr>
    <!-- Vendor Start -->
    @if ( count($products) > 0)
        <div class="container-fluid my-5 py-4">
            <div class="text-center mb-4">
                <h2 class="section-title px-5">
                    <span class="px-2">
                        {{ __('front.products') }}
                    </span>
                </h2>
            </div>
            <div class="row px-xl-5" style="direction: ltr !important">
                <div class="owl-carousel vendor-carousel">
                    @forelse($products as $product)
                        @if($loop->index < 5)
                            <div class="vendor-item border p-2" stylex="max-height:150px;max-width:300px">
                                <a href="{{route('user.products.show',$product->id)}}" class="btn btn-sm text-dark" >
                                    <img classx="img-fluid w-100 h-100" alt="{{$product->id}}"
                                    src="{{storageImage($product->featured_image)}}">
                                    <h6>{{$product->name}}</h6>
                                </a>
                            </div>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    @endif
    <!-- Vendor End -->
@endsection
