<div class="container">
    <div class="inner-wrap justify-content-between">
        <div class="header-left ">
            <div class="dropdown category-dropdown all-categories {{request()->is('/')?'show-dropdown':''}}"
                 data-visible="true">
                <a href="#" class="text-white category-toggle" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                    <i class="w-icon-category"></i>
                    <span style="text-transform: uppercase;">{{__('front.all_category')}}</span>
                </a>
                @if(count(getMainCategories())>0)
                    <div class="dropdown-box" style="max-height: 512px;">
                        <ul class="menu vertical-menu category-menu">
                            @foreach(getMainCategories() as $category)
                                <li>
                                    
                                    <a href="#">
{{--                                        <i class="{{$category->icon?$category->icon:'w-icon-tshirt2'}}"></i>--}}
                                        {{$category->name}}
                                    </a>
                                    @if(count($category->subcategories)>0)
                                        <ul class="megamenu">
                                            <li>
                                                <h4 class="menu-title">{{$category->name}}</h4>
                                                <hr class="divider">
                                                <ul>
                                                @foreach($category->subcategories as $item)
                                                        @if($loop->index < 8)
                                                            <li>
                                                                <a href="{{route('user.products.index',['category'=>$item->id])}}">{{$item->name}}</a>
                                                            </li>
                                                        @endif
                                                @endforeach
                                                </ul>
                                            </li>
                                            @if(count($category->subcategories) > 7)
                                            <li>
                                                <h4 class="menu-title">&nbsp;</h4>
                                                <hr class="divider">
                                                <ul>
                                                    @foreach($category->subcategories as $item)
                                                            @if($loop->index > 7 && $loop->index < 15)

                                                                <li>
                                                                    <a href="{{route('user.products.index',['category'=>$item->id])}}">{{$item->name}}</a>
                                                                </li>
                                                            @endif
                                                    @endforeach
                                                    <li>
                                                        <a href="{{route('user.product-main-category',$category->slug)}}">{{__('front.Show_more')}}</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            @endif
                                            <li>

                                                <div class="menu-banner banner-fixed menu-banner4">

                                                    <figure>
                                                        <img
                                                            src="{{storageImage($category->image)}}"
                                                            alt="Menu Banner"/>
                                                    </figure>
                                                </div>
                                            </li>
                                        </ul>
                                    @endif
                                </li>

                            @endforeach
                            <li>
                                <a href="{{route('user.categories')}}" class="font-weight-bold text-uppercase ls-25">
                                  {{__('front.view_all_categories')}}
                                  @if (checkCurrentLang())

                                  <i class="w-icon-angle-left"></i>

                                  @else

                                      <i class="w-icon-angle-right"></i>
                                  @endif

                                </a>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>

        </div>
        <div class="header-right w-75">
            <form method="get" action="{{route('user.products.index')}}"
                  class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                <input type="text" class="form-control" name="search" id="search" value="{{request('search')}}"
                       placeholder=""
                       required/>
                <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                </button>
            </form>

            <a class="wishlist label-down link mx-4 d-xs-show p-3 rounded-50" href="{{route('user.user-account')}}">
                <i class="w-icon-user"></i>
            </a>
            {{-- <a class="wishlist label-down link mx-4 d-xs-show p-3 rounded-50" href="{{route('user.wishlist')}}">
                <i class="w-icon-heartbeat" id="icon-wishlist-count">
                    @auth('user')
                        <span class="cart-count" id="cart-wishlist-item">{{getCountWishlistItems()}}</span>
                    @endauth
                </i>
            </a> --}}
            <div class="dropdown cart-dropdown mx-4 fav " >
                <div class="cart-overlay"></div>
                <a href="{{route('user.wishlist')}}" class="cart-toggle label-down link">
                    <i class="w-icon-heartbeat" id="icon-wishlist-count">
                        @auth('user')
                            <span class="cart-count" id="cart-wishlist-item" style="left:unset;right: 11px;bottom: -8px">{{getCountWishlistItems()}}</span>
                        @endauth
                    </i>

                </a>
            </div>

            <div class="dropdown cart-dropdown cart-offcanvaslabel-down link mx-4 d-xs-show p-3 rounded-50">
                <div class="cart-overlay"></div>
                <a href="{{route('cart')}}" class="cart-toggle label-down link">
                    <i class="w-icon-cart" id="icon-cart-count">
                        @auth('user')
                            <span class="cart-count" id="cart-count-item">{{getCountCartItems()}}</span>
                        @endauth

                    </i>
                </a>
            </div>
            <!-- End of Dropdown Box -->
        </div>

    </div>

</div>
