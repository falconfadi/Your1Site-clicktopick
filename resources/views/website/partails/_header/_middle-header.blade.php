<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0 text-white"> {{__('front.categories')}}</h6>
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
            @if(isset($sliders))
{{--            @if(request()->has('sliders'))--}}
            @if(count($sliders)>0)
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($sliders as $slider)
                    {{-- {{$slider->id==1?'active':''}} --}}
                    <div class="carousel-item {{$slider->sort_order == 1 || count($sliders) == 1 ?'active':''}} " style="height: 410px;">
                        <img class="img-fluid" src="{{storageImage($slider->responsive_image)}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">   {{$slider->title}}</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{$slider->brief}}</h3>
                                <a href="" class="btn btn-light py-2 px-3">
                                    @if (checkCurrentLang())


                                        {{__('front.shop_now')}}
                                    @else
                                        {{__('front.shop_now')}}

                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                @if(count($sliders) > 1)
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                @endif
            </div>
            @endif
            @endif


        </div>
    </div>
</div>
<!-- Navbar End -->
