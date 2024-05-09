<div class="site-footer bg-white py-1 ">
    <div class="footer-contacts">
        <div class="container">
            <div class="d-flex flex-row flex-wrap justify-content-between border-bottom py-1">
                <div class="site-phone">
                    <div class="phone-icon mx-4"><i class="w-icon-phone"></i></div>
                    <div class="phone-detail">
                        <h4 class="entry-title mb-2">{{getSetting('site_phone')}}</h4> 
                        {{-- <span>{{setting('hour-work' , 'text')}}</span> --}}
                    </div>
                </div>
                <div class="app-content">
                    <h6 class="entry-title">{{__('front.download_mobile')}}</h6> <span></span>
                </div>
                <div class="app-buttons ">
                    <a href="" class="google-play">
                        <img src="{{asset('web/images/app.png')}} " style="width: 116px; height:38px" alt="app">
                    </a>
                    <a href="" class="google-play">
                        <img src="{{asset('web/images/google.png')}} " style="width: 116px; height:38px" alt="app">
                    </a>
                </div>
                <div class="site-social">
                    <ul class="list-unstyled d-flex">
                        <li class="m-2"><a href="" class="border rounded-50 " style="padding: 10px;" target="_blank"><i class="w-icon-facebook"></i></a></li>
                        <li class="m-2"><a href="" class="border rounded-50 " style="padding: 10px;" target="_blank"><i class="w-icon-twitter"></i></a></li>
                        <li class="m-2"><a href="" class="border rounded-50 " style="padding: 10px;" target="_blank"><i class="w-icon-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

