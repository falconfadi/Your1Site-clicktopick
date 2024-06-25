@extends('website.app')
@section('title')
    {{ __('front.products') }}
@endsection
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid mb-5 py-2 px-5">
        <div class="d-flex flex-column align-items-center justify-content-center" 
        style="min-height: 300px ;
            background-image:url('{{asset('web/img/pink-bg.png')}}');
            background-size:contain;
            background-position-x: center;
        ">
            <h1 class="font-weight-semi-bold text-white text-uppercase mb-3">{{ __('front.Our_Shop') }}</h1>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="/">{{ __('front.home') }}</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0"><a class="text-white" href="{{ route('user.products.index') }}">{{ __('front.shop') }}</a></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex">
                                <form action="/products" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="{{ __('front.search_by_name') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="input-group-text bg-transparent text-primary">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <p class="m-2">{{__('front.Filter')}}</p>
                                <div class="dropdown">
                                    <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('front.Price')}}
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right px-1" aria-labelledby="triggerId">
                                        <form method="get" action="/products">
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-transparent text-primary">
                                                        <i class="fa fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="number" min="1" class="form-control" name="min_price"
                                                placeholder="{{ __('front.From') }}" value="{{old('min_price')}}">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-transparent text-primary">
                                                        <i class="fa fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="number" min="1" class="form-control" name="max_price"
                                                    placeholder="{{ __('front.To') }}" value="{{old('max_price')}}">
                                            </div>
                                            <div class="input-group p-1">
                                                <button type="submit" class="btn btn-primary btn-sm mx-auto rounded">
                                                    <i class="fa fa-search"></i>
                                                    {{__('front.Search')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <p class="m-2">{{__('front.Sort')}}</p>
                                <div class="dropdown">
                                    <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('front.Sort by')}}
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="?sort_by[price]=asc">{{__('front.Price')}}: {{__('front.Lth')}}</a>
                                        <a class="dropdown-item" href="?sort_by[price]=desc">{{__('front.Price')}}: {{__('front.Htl')}}</a>
                                        <a class="dropdown-item" href="?sort_by[created_at]=asc">{{__('front.Date')}}: {{__('front.Otn')}}</a>
                                        <a class="dropdown-item" href="?sort_by[created_at]=desc">{{__('front.Date')}}: {{__('front.Nto')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="min-width:5rem;">
                                <a href="/products" class="">
                                    <button class="btn btn-sm btn-outline-primary rounded w-100">
                                        {{__('front.Reset')}}
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    @forelse ($products as $product)
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent text-center border p-0">
                                    @if(!is_null($product->featured_image))
                                        <img class="img-fluid" style="height:300px!important"
                                            src="{{ storageImage($product->featured_image) }}" alt="" >
                                    @elseif( count($product->images) )
                                        <img class="img-fluid" style="height:300px!important"
                                            src="{{ storageImage( $product->images[0]) }}" alt="" >
                                    @else
                                        <img class="img-fluid" style="height:300px!important"
                                            src="{{ asset('web/images/no-image.jpg') }}" alt="" >
                                    @endif
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">
                                        {{ $product->name }}
                                    </h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>
                                            {{ $product->price }}
                                        </h6>
                                        <h6 class="text-muted ml-2">
                                            <del>{{ $product->price_before_discount }}</del>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="{{ route('user.products.show', $product) }}"
                                        class="btn btn-sm text-dark p-0">
                                        <i class="fas fa-eye text-primary mr-1"></i>
                                        {{ __('front.view_details') }}
                                    </a>
                                    <a data-product="{{ $product->id }}"
                                        class="btn btn-sm text-dark p-0 {{ auth('user')->check() ? 'btn-cart' : '' }} add-to-cart">
                                        <i class="fas fa-shopping-cart text-primary mr-1 "></i>
                                        {{ __('front.add_cart') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card-header border p-0 w-100">
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">No products Yet</h6>
                            </div>
                        </div>
                    @endforelse
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection

