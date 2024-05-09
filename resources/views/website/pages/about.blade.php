{{--@extends('website.app')--}}
@section('title')
    {{__('front.about')}}
@endsection
<html lang="en">

<head>
    @include('website.base._meta')
    @yield('style')


</head>
<body>

@include('website.partails._header._top-header')

<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        {{-- <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0"> {{__('front.categories')}}</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @if(count(getMainCategories())>0)
                        @foreach(getMainCategories() as $category)

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">{{$category->name}} <i class="fa fa-angle-down float-right mt-1"></i></a>
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
        </div> --}}
        <div class="col-12 ">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="{{route('user.index')}}" class="text-decoration-none d-block d-lg-none">
                    <img src="{{asset('web/img/logo-1.png')}}" alt="logo" 
                        style="
                            width: 160px;
                            margin: 0px 60px;
                            height: 50px;"
                    />
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('user.index')}}" class="nav-item nav-link {{request()->is('/')?'active':''}}">{{__('front.home')}}</a>
                        {{--                        <a href="shop.html" class="nav-item nav-link">Shop</a>--}}
                        <a href="{{route('user.products.index')}}"  class="nav-item nav-link {{request()->routeIs('user.products.*')?'active':''}}">{{__('front.shop')}}</a>
                        {{--                        <a href="{{route('user.products.show')}}" class="nav-item nav-link">Shop Detail</a>--}}

                        <a href="{{route('user.categories')}}" class="nav-item nav-link  {{request()->routeIs('user.categories')?'active':''}}">{{__('front.categories')}}</a>

                        <a href="{{route('user.contact')}}" class="nav-item nav-link {{request()->routeIs('user.contact')?'active':''}} "> {{__('front.contact')}}</a>
                        <a href="{{route('user.about')}}" class="nav-item nav-link {{request()->routeIs('user.about')?'active':''}}"> {{__('front.about')}}</a>

                    </div>
                    @guest('user')

                        <div class="navbar-nav ml-auto py-0">
                            <a href="{{route('user.login')}}" class="nav-item nav-link"> {{__('front.login')}}</a>
                            <a href="{{route('user.register')}}" class="nav-item nav-link">{{__('front.register')}}</a>
                        </div>
                    @endguest()
                    @auth('user')
                        <div class="dropdown">
                            <button class="btn btn-default btn-sm dropdown-toggle" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               {{__('front.hello')}} {{auth('user')->user()->first_name}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <a class="dropdown-item" href="#">{{__('front.profile')}}</a>
                                <a href="{{route('user.logout')}}" class="dropdown-item">{{__('front.logout')}}</a>
                            </div>
                            
                        </div>

                    @endauth
                </div>

            </nav>
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner mb-3">

                                <div class="carousel-item active " style="height: 410px;">
                                    <img class="img-fluid" src="{{asset('web/img/pink-bg.png')}}" alt="Image">
                                </div>

                        </div>

                        <div class="w-100  text-center"><h3>About Us</h3></div>
                        <div class="row text-center" >
                          Click to Pick is an all-in-one portal supplying high-quality medical injectables and supplies. Our website give you the chance to browse, compare, and obtain the most popular products on the market hassle-free. We aim to deliver the best service to medical clinics and spas worldwide.
We offer premium medical products to health professionals, plastic surgeons, dermatologists, licensed estheticians, and other specialists. Choose from genuine, brand name dermal fillers, mesotherapy treatments, orthopedic solutions, and many other genuine, brand name products to improve your patient’s quality of life. As well, you can find reviews for all of our products left by specialists like you can even leave your own.

                        </div>
                        <div class="w-100 text-center  " ><h3>Vision </h3></div>
                        <div class="row text-center">
                            <div class="col-12" style="word-wrap: break-word">
                                As we move forward towards our goal of being the premier orthopedic and cosmetic supplier, helping people enjoy life with offering an affordable solution to health care, we intend to provide our customers with the best possible shopping experience. From the welcome page to the moment your order reaches your doorstep, by virtue of a smart, searchable website, easy-to-follow instructions, and a friendly and helpful customer service team, we guarantee a fast, quality order experience with a clear and secure variety of payment methods.
                            </div>
                        </div >
                        <div class="w-100 text-center"><h3>Mission</h3></div>
                        <div class="row text-center" >
                            <div class="col-12" style="word-wrap: break-word ">
                               Click-to-pick.com is medical company offering a wide variety of professional cosmetic and orthopedic solutions for health-care professionals around the world. We are dedicated to ensuring our customers get the high quality products at competitive wholesale prices from Europe. We want to help you make the most of your medical business by providing you with the authentic, brand name dermal fillers and other products at the guaranteed lowest price. Our team strives to ensure that our products and services meet are first-rate 

                            </div>
                        </div>

                    </div>


        </div>
    </div>
</div>
<!-- Navbar End -->

@include('website.partails._footer')
@include('website.base._scripts')
@yield('scripts')

</body>

</html>
