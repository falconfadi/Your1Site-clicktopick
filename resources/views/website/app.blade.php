<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.base._meta')
    @yield('style')


</head>


<body>
    <div id="global_translations" data-addtocart="{{ __('front.added_to_cart') }}"
        data-viewcart="{{ __('front.viewcart') }}" data-checkout="{{ __('front.checkout') }}"></div>
    @include('website.partails._header')

    @yield('content')

    @include('website.partails._footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary bg-white rounded back-to-top">
        <i class="fa fa-angle-double-up text-primary"></i>
    </a>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('web/js/jquery/jquery.min.js') }}"></script>

    @include('website.base._scripts')

    @yield('scripts')

</body>

</html>
