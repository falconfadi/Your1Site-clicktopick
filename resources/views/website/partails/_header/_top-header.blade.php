<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-primary py-2 px-xl-5">
        {{-- <div class="col-lg-6 d-none d-lg-block">
        </div> --}}
        <div class="col-lg-12 text-center text-lg-center">
            <div class="d-inline-flex align-items-center">
                <a class="text-white px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-white px-2" href="https://www.x.com/">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-white px-2" href="https://www.linkedin.com/feed/">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-white px-2" href="https://www.instagram.com/">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-white pl-2" href="https://www.youtube.com/">
                    <i class="fab fa-youtube"></i>
                </a>

                <div class="ml-3 mr-1 text-white">|</div>

                @if (checkCurrentLang() or app()->getLocale() == 'ar')
                    <a href="{{ route('change-lang', ['lang' => 'en']) }}"
                        class="btn btn-icon btn-sm btn-clean btn-text-white-75">
                        <span class="svg-icon svg-icon-xl text-white">
                            {{-- <i class="fa fa-language"> EN</i>  --}}
                            <i class="fa"> EN</i>
                        </span>
                    </a>
                @else
                    <a href="{{ route('change-lang', ['lang' => 'ar']) }}"
                        class="btn btn-icon btn-sm btn-clean btn-text-white-75">
                        <span class="svg-icon svg-icon-xl text-white">
                            {{-- <i class="fa fa-language"> AR</i>  --}}
                            <i class="fa"> AR</i>
                        </span>
                    </a>
                @endif

                {{-- <div class="input-group">
                    <select onchange="location = this.value;" class="w-25 text-dark pl-2 mx-2 form-control">
                        <option value="{{ route('change-lang', ['lang' => 'en']) }}"
                            {{ !checkCurrentLang() and (session()->get('lang') == 'en' ? 'selected' : '') }}> English
                            (United States)
                        </option>
                        <option value="{{ route('change-lang', ['lang' => 'ar']) }}"
                            {{ checkCurrentLang() ? 'selected' : '' }}>عربي
                        </option>
                    </select>
                </div> --}}
            </div>
            <div>

            </div>
        </div>
    </div>
    <div class="row align-items-center py-1 px-xl-5" id="sticky_nav">
        <div class="col-lg-3 d-none d-lg-block">
            <div>
                <a href="{{ route('user.index') }}" class="text-decoration-none">
                    <img src="{{ asset('web/img/logo-1.png') }}" alt="logo" class="mx-5"
                        style="width: 10rem; height: 3rem;" />

                </a>
            </div>

        </div>
        <div class="col-lg-6 col-6 text-left">
            <form method="get" action="{{ route('user.products.index') }}" class="mb-0">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search"
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="input-group-text bg-transparent text-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-center">
            <a href="{{ route('user.wishlist') }}" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">{{ getCountWishlistItems() }}</span>
            </a>
            <a href="{{ route('cart') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">{{ getCountCartItems() }}</span>
            </a>
        </div>
    </div>
</div>

<style>
    .sticky{
        position: fixed;
        top: 0%;
        width:100vw;
        background-color: #ffe0ff;
        z-index: 10;
    }
</style>
<!-- Topbar End -->
<script>
    window.onscroll = function() {fixNav()};

    let nav = document.getElementById('sticky_nav')

    let sticky = nav.offsetTop

    function fixNav(){
        if (window.pageYOffset >= sticky) {
            nav.classList.add("sticky")
        } else {
            nav.classList.remove("sticky");
        }
    }

</script>