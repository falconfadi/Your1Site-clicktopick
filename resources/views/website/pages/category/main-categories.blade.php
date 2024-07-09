{{--@extends('website.app')--}}
@section('title')
    {{__('front.category')}}
@endsection
<html lang="en">

<head>
    @include('website.base._meta')
    @yield('style')
</head>
<body>

@include('website.partails._header._top-header')

<!-- End of Page Header -->

    <!-- Start of Page Content -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" 
            style="height: 50px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0"> {{__('front.categories')}}</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @if(count(getMainCategories())>0)
                        @foreach(getMainCategories() as $category)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">{{$category->name}} 
                                <i class="fa fa-angle-down float-right mt-1"></i>
                                </a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                    @foreach($category->subcategories as $item)
                                        <a class="dropdown-item" href="{{route('user.products.index',['category'=>$item->id])}}">{{$item->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="{{route('user.index')}}" class="text-decoration-none d-block d-lg-none">
                    <img src="{{asset('web/img/logo-1.png')}}" alt="logo" style="
    width: 160px;
    margin: 0px 60px;
    height: 50px;
"/>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('user.index')}}" class="nav-item nav-link {{request()->is('/')?'active':''}}">{{__('front.home')}}</a>
                        <a href="{{route('user.products.index')}}"  class="nav-item nav-link {{request()->routeIs('user.products.*')?'active':''}}">{{__('front.shop')}}</a>
                        <a href="{{route('user.categories')}}" class="nav-item nav-link  {{request()->routeIs('user.categories')?'active':''}}">{{__('front.categories')}}</a>
                        <a href="{{route('user.contact')}}" class="nav-item nav-link {{request()->routeIs('user.contact')?'active':''}} "> {{__('front.contact')}}</a>
                        <a href="{{route('user.about')}}" class="nav-item nav-link {{request()->routeIs('user.about')?'active':''}}"> {{__('front.about')}}</a>
                    </div>
                    @guest('user')
                        <div class="navbar-nav ml-auto py-0">
                            <a href="{{route('user.login')}}" class="nav-item nav-link"> {{__('front.login')}}</a>
                            <a href="{{route('user.register')}}" class="nav-item nav-link">{{__('front.register')}}</a>
                        </div>
                    @endguest
                    @auth('user')
                        <div class="dropdown">
                            <button class="btn btn-default btn-sm dropdown-toggle" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               {{__('front.hello')}} {{auth('user')->user()->first_name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <!--<a class="dropdown-item" href="#">{{__('front.profile')}}</a>-->
                                <a href="{{route('user.logout')}}" class="dropdown-item">{{__('front.logout')}}</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner mb-3">

                    <div class="carousel-item active " style="height: 410px;">
                        <img class="img-fluid" src="{{asset('web/images/makeup.jpg')}}" alt="Image">
                    </div>

                </div>
                <div class="page-content">
                    @if(count(getMainProductCategories())>0)
                        <div class="">
                            <div class="rowx grid cols-lg-4 cols-md-2 m-0 p-0 mb-10" data-grid-options="{
                        'layoutMode': 'fitRows'
                    }">
                                @foreach(getMainProductCategories() as $item)
                                    @include('website.section._single-sub-category',['item'=>$item ])
                                @endforeach
                            </div>
                            {{getMainProductCategories()->links('website.pages.pagination')}}
                        </div>
                    @else
                        <div class="row grid cols-lg-3 cols-md-2 mb-2" data-grid-options="{
                        'layoutMode': 'fitRows'
                    }">
                            <div class="w-50 text-center" style="margin: 108px auto; ">
                                <!--<img onerror="this.src='{{asset('assets/images/icons/Search engines-bro.png')}}';"  -->
                                <!--src="{{asset('assets/images/no-product.png')}}" >-->
                                <p style="margin-top: 21px;font-weight: bold;" class="text-dark">
                                    {{__('front.no_category')}}</p>
                                <a href="{{route('user.index')}}"
                                   class="btn btn-primary btn-rounded btn-icon-right slide-animate"
                                   data-animation-options="{
                                    'name': 'fadeInUpShorter', 'duration': '1s'
                                }">
                                    @if (checkCurrentLang())
                                        <i class="w-icon-long-arrow-left"></i>
                                        {{__('front.home')}}
                                    @else
                                        {{__('front.home')}}
                                        <i class="w-icon-long-arrow-right"></i>
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

            </div>


        </div>
    </div>
</div>
    <!-- End of Page Content -->

@include('website.partails._footer')
@include('website.base._scripts')
@yield('scripts')

</body>

</html>
