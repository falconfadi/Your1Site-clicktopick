@extends('website.app')
@section('title')
    {{$product->name}}
@endsection
@section('content')
    <div class="container-fluid py-2">
        <div class="row px-xl-5">
            <div class="col-lg-4 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border px-2">
                        @php
                            $product->images = [...$product->images,$product->featured_image];
                        @endphp
                        @forelse($product->images as $key=> $item)
                            <div class="carousel-item {{$key == 0 ? 'active':""}}">
                                <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  src="{{storageImage($item)}}"
                                     data-zoom-image="{{storageImage($item)}}"
                                     alt="Electronics Black Wrist Watch" class="w-100" height="300px">
                            </div>
                        @empty
                            <div class="carousel-item active">
                                <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  
                                    src="{{storageImage($product->featured_image)}}"
                                    alt="Electronics Black Wrist Watch" class="w-100" height="300px">
                            </div>
                        @endforelse
                    </div>
                    @if(isset($product->images) && count($product->images)>1)
                        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-8 pb-5">
                <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
                <h3 class="font-weight-semi-bold mb-4">{{$product->price}}</h3>
                <p class="mb-4">   {!! $product->description !!}</p>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" style="height: 37px;padding-top: 7px;">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus" style="height: 37px;padding-top: 7px;">
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
    </div>
    <!--<div class="container-fluid py-5">-->
    <!--    <div class="text-center mb-4">-->
    <!--        <h2 class="section-title px-5"><span class="px-2">{{__('front.you_may_also_like')}}</span></h2>-->
    <!--    </div>-->
    <!--    <div class="row px-xl-5">-->
    <!--        <div class="col">-->
    <!--            <div class="owl-carousel related-carousel">-->
    <!--                @forelse($listProduct as $product)-->
    <!--                    @if($loop->index <4)-->
    <!--                        <div class="card product-item border-0">-->
    <!--                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">-->
    <!--                                <img class="img-fluid w-100"-->
    <!--                                     onerror="this.src='{{asset('web/images/no-image.jpg')}}'"-->
    <!--                                     src="{{storageImage($product->featured_image)}}"-->
    <!--                                     alt="Product"-->
    <!--                                     width="150px"-->
    <!--                                     height="150px"-->
    <!--                                    />-->
    <!--                            </div>-->
    <!--                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">-->
    <!--                                <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>-->
    <!--                                <div class="d-flex justify-content-center">-->
    <!--                                    <h6>$123.00</h6>-->
    <!--                                    <h6 class="text-muted ml-2">-->
    <!--                                        <del>$123.00</del>-->
    <!--                                    </h6>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="card-footer d-flex justify-content-between bg-light border">-->
    <!--                                <a href="{{route('user.products.show' , $product)}}" class="btn btn-sm text-dark p-0">-->
    <!--                                    <i class="fas fa-eye text-primary mr-1"></i> View Detail-->
    <!--                                </a>-->
    <!--                                <a href="" data-product="{{$product->id}}" class="btn btn-sm text-dark p-0 {{auth('user')->check()?'btn-cart' :''}} add-to-cart">-->
    <!--                                    <i class="fas fa-shopping-cart text-primary mr-1 "></i>{{__('front.add_cart')}}-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    @endif-->
    <!--                @empty    -->
    <!--                @endforelse-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

@endsection

