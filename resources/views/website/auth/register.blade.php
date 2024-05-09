<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('web/auth/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('web/auth/css/style.css')}}">
    <link href="{{asset('icons/icon.png')}}" rel="icon">

    <style>

        /*body {*/
        /*    margin:0px;*/
        /*    height:100vh;*/
        /*    background: #1283da;*/
        /*}*/
        .center {
            height:100%;
            display:flex;
            align-items:center;
            justify-content:center;

        }
        .form-input {
            width:350px;
            padding:20px;
            background:#fff;
            box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
            3px 3px 7px rgba(94, 104, 121, 0.377);
        }
        .form-input input {
            display:none;

        }
        .form-input label {
            display:block;
            width:45%;
            height:45px;
            margin-left: 25%;
            line-height:50px;
            text-align:center;


            color:#cbbbbb;
            font-size:15px;
            font-family:"Open Sans",sans-serif;
            text-transform:Uppercase;
            font-weight:600;
            border-radius:5px;
            cursor:pointer;
        }

        .form-input img {
            width:100%;
            display:none;

            margin-bottom:30px;
        }
        .type1 {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 1px solid;
        }

    </style>

</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{route('user.register.post')}}" id="form-login">
                            @csrf
                            <div class="form-group center type1">
                                <div class="imgUp">
                                    <div class="form-input">
                                        <div class="preview">
                                            <img id="file-ip-1-preview">
                                        </div>
                                        <label for="file-ip-1">+upload</label>
                                        <input type="file"  name='avatar' id="file-ip-1" accept="image/*" onchange="showPreview(event);">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                @include('website.base._error')
                            </div>
                            <div class="form-group mb-5">
                                <label for="first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text"
                                       class=" @error('first_name') is-invalid @enderror"
                                       name="first_name" id="first-name"
                                       placeholder="{{__('front.first_name')}}"
                                       autocomplete="first_name" autofocus>
                            </div>
                            @error('first_name')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <i style="color:#BD362F;!important">{{ $message }}</i>
                                    </span>
                            @enderror
                            <div class="form-group mb-5">
                                <label for="last_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text"
                                       placeholder="{{__('front.last_name')}}"
                                       class="@error('last_name') is-invalid @enderror"
                                       name="last_name" id="last-name"
                                       autocomplete="last_name" autofocus>
                            </div>
                            @error('last_name')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <i style="color:#BD362F;!important">{{ $message }}</i>
                                    </span>
                            @enderror


                            <div class="form-group mb-5">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" placeholder="{{__('front.email')}}"
                                       class="@error('email') is-invalid @enderror"
                                       name="email" id="email_1" autocomplete="email" autofocus>
                            </div>
                            @error('email')
                            <span class="invalid-feedback " role="alert">
                                    <i class="alert-danger"
                                       style="color:#BD362F;!important">{{ $message }}</i>
                                    </span>
                            @enderror
                            <div class="form-group mb-5">
                                <label for="phone_number"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number"
                                       name="phone_number" id="phone_number" placeholder="{{__('front.phone')}}"
                                       required
                                       class=" left-padding-phone px-4 @error('phone_number') is-invalid @enderror"
                                       value="+966" >
                            </div>
                            @error('phone_number')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <i style="color:#BD362F;!important">{{ $message }}</i>
                                     </span>
                            @enderror
                            <div class="form-group mb-5">
                                <label for="{{__('front.password')}}"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" class=" " name="password" id="password_1"
                                       placeholder="{{__('front.password')}}"
                                       required>
                            </div>
                            @error('password')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <i style="color:#BD362F;!important">{{ $message }}</i>
                                     </span>
                            @enderror
                            <div class="form-group mb-5">
                                <label for="{{__('front.password_confirm')}}"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" class=" " name="password_confirmation"
                                       placeholder="{{__('front.password_confirm')}}"    id="password_1" required>
                            </div>
                            @error('password_confirmation')
                            <span class="invalid-feedback text-danger" role="alert">
                                    <i style="color:#BD362F;!important">{{ $message }}</i>
                                    </span>
                    @enderror

                <div class="form-group form-button">
                    {{-- <button type="submit" class="btn btn-primary">{{__('front.sign_up')}}</button> --}}
                    <button type="submit" class="btn btn-primary btn-sm w-100 ">{{__('front.sign_up')}}</button>

                </div>


                </form>

                </div>


                <div class="signup-image">


                    <figure><img src="{{asset('web/auth/images/signup-image.jpg')}}" alt="sing up image"></figure>
                    <div class="d-flex flex-row" style=" gap: 20px 5px;">
                        <a href="{{route('user.login')}}" class="signup-image-link" >{{__('front.login')}}</a>

                        <a href="{{route('user.index')}}" class="signup-image-link">{{__('front.home')}}</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="{{asset('web/js/main.js')}}"></script>

<script src="{{asset('web/auth/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('web/auth/js/main.js')}}"></script>
<script type="text/javascript">
    function showPreview(event){
        if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script>

    <script>

        $('[data-toggle="datepicker"]').datepicker({
        format: 'yyyy-MM-dd',
        startDate: new Date(),
        autoHide: true,
    });

        function addToWishlist(id, e) {
        e.preventDefault();
        let  wishlistCount  = $('#icon-wishlist-count')
        let url = "{{route('user.add-wishlist')}}" + "/" + id;
        $.ajax({
        type: "GET",
        url: url,
        success: function (data) {
        wishlistCount.find('#cart-wishlist-item').html(data.countItems);
        if (data.deleted === 1) {
        $('#data-item-wishlist-'+id).fadeOut();
    }
        if (data.countItems ===0){
        window.location.href = "{{ route('user.index')}}";
    }
    },
        error: function () {
        Swal.fire({
        text: '{{__('front.you_are_not_auth')}}',
        icon: "warning",
        buttonsStyling: false,
        confirmButtonText: "<i class='la la-thumbs-o-up'></i> OK!",
        showCancelButton: false,
        customClass: {
        confirmButton: "btn btn-success",
    }
    });
    }
    });
    }


        function removeItem(id, cartId, productId) {
        $('#remove-product-' + id).fadeOut();
        let countCartId = $('#icon-cart-count');
        let url = "{{route('user.remove-products')}}";
        $.ajax({
        type: "POST",
        url: url,
        data: {
        _token: '{{csrf_token()}}',
        'product_id': productId,
        'cart_id': cartId,
    },
        success: function (data) {
        countCartId.find('#cart-count-item').html(data.countItems);
        if (data.countItems ===0){
        window.location.href = "{{ route('user.index')}}";
    }
    }
    });
    }

        function expand_filter(e) {
        e.preventDefault();
        let filter = document.getElementById("service_form");
        filter.classList.toggle("expand-service");
    }

        function upload() {
        $("#upload_impage_user").click();
    }

        function onFileSelected(event) {
        this.selectedFile = event.target.files;
        var file = this.selectedFile[0];
        var reader = new FileReader();

        reader.onloadend = function () {
        $("#imagePreview_user").css(
        "background-image",
        'url("' + reader.result + '")'
        );
    };
        if (file) {
        reader.readAsDataURL(file);
    } else {
        $("#imagePreview_user").css(
        "background-image",
        'url("../web/images/no-image.jpg")'
        );
    }
    }


</script>

</body>
</html>
{{------------------------------------------------------------------------------------------------------------------}}
{{--@extends('website.app')--}}
{{--@section('title')--}}
{{--    {{__('front.login')}}--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <!-- Start of Page Header -->--}}
{{--    <div class="page-header">--}}
{{--        <div class="container">--}}
{{--            <h1 class="page-title mb-0">{{__('front.my_account')}}</h1>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End of Page Header -->--}}

{{--    <!-- Start of Breadcrumb -->--}}
{{--    <nav class="breadcrumb-nav">--}}
{{--        <div class="container">--}}
{{--            <ul class="breadcrumb">--}}
{{--                <li><a href="{{route('user.index')}}">{{__('front.home')}}</a></li>--}}
{{--                <li>{{__('front.my_account')}}</li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    <!-- End of Breadcrumb -->--}}
{{--    <div class="page-content">--}}
{{--        <div class="container">--}}
{{--            <div class="login-popup login-popup-center" >--}}
{{--                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">--}}
{{--                    <ul class="nav nav-tabs text-uppercase" role="tablist">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#sign-in"--}}
{{--                               class="nav-link active">{{__('front.sign_in')}}</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#sign-up"--}}
{{--                               class="nav-link ">{{__('front.sign_up')}}</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    @include('website.base._error')--}}
{{--                    <div class="tab-content">--}}
{{--                        <div class="tab-pane active" id="sign-in">--}}
{{--                            <form method="POST" action="{{route('user.login.post')}}" id="form-login">--}}
{{--                                @csrf--}}
{{--                                <div class="w-75 pt-2 text-center" style="height: 166px; margin: 10px auto;">--}}
{{--                                    <a href="">--}}
{{--                                        <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"  src="{{asset('web/images/new/logo.png')}}" class="" style="width: 100%;height: 71%;" alt="">--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="form-group" style="height: 73px;width:100%">--}}
{{--                                    <label>{{__('front.phone')}} <span style="color: red">*</span></label>--}}
{{--                                    <input type="tel"--}}
{{--                                           name="phone_number" id="phone_number2" placeholder="{{__('front.phone')}}"--}}
{{--                                           required--}}
{{--                                           value="{{old('phone_number') ?? '+968'}}"--}}
{{--                                           class="form-control w-100 left-padding-phone px-4 @error('phone_number') is-invalid @enderror">--}}
{{--                                </div>--}}
{{--                                <div class="form-group mb-0">--}}
{{--                                    <label>{{__('front.password')}} <span style="color: red">*</span></label>--}}
{{--                                    <input type="password" class="form-control text-right" name="password" id="password" required>--}}
{{--                                </div>--}}
{{--                                <div class="form-checkbox d-flex align-items-center justify-content-between">--}}
{{--                                    <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1"--}}
{{--                                    >--}}
{{--                                    <label for="remember1">{{__('front.remember')}}</label>--}}
{{--                                    <a href="{{route('user.forget-password')}}">{{ __('front.forget_your_password') }}</a>--}}
{{--                                </div>--}}
{{--                                <button type="submit" class="btn btn-primary">{{__('front.sign_in')}}</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}


{{--                        <div class="tab-pane" id="sign-up">--}}
{{--                            <form method="POST" action="{{route('user.register.post')}}" id="form-register"--}}
{{--                                  enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                <div class="checkbox-content login-vendor">--}}
{{--                                    <div class="imgUp">--}}
{{--                                        <div class="imagePreview" id="imagePreview_user"--}}
{{--                                             style="background-image: url(../web/images/no-image.jpg)">--}}
{{--                                            <i class="fas fa-2x fa-plus-circle round" id="uploadButton"--}}
{{--                                               onclick="upload()" style="cursor: pointer;"></i>--}}

{{--                                            <input type="file" class="uploadFile img" id="upload_impage_user"--}}
{{--                                                   name='avatar'--}}
{{--                                                   onchange="onFileSelected(event)"--}}
{{--                                                   hidden style="cursor:pointer; margin-top: 65px;" autocomplete="off">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group mb-5">--}}
{{--                                        <label>{{__('front.first_name')}} <span--}}
{{--                                                style="color:#BD362F;!important"><span style="color: red">*</span></span></label>--}}
{{--                                        <input type="text"--}}
{{--                                               class="form-control  @error('first_name') is-invalid @enderror"--}}
{{--                                               name="first_name" id="first-name"--}}
{{--                                               placeholder="{{__('front.first_name')}}"--}}
{{--                                               autocomplete="first_name" autofocus>--}}
{{--                                    </div>--}}
{{--                                    @error('first_name')--}}
{{--                                    <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <i style="color:#BD362F;!important">{{ $message }}</i>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                    <div class="form-group mb-5">--}}
{{--                                        <label>{{__('front.last_name')}} <span style="color:#BD362F;!important"><span style="color: red">*</span></span></label>--}}
{{--                                        <input type="text"--}}
{{--                                               placeholder="{{__('front.last_name')}}"--}}
{{--                                               class="form-control  @error('last_name') is-invalid @enderror"--}}
{{--                                               name="last_name" id="last-name"--}}
{{--                                               autocomplete="last_name" autofocus>--}}
{{--                                    </div>--}}
{{--                                    @error('last_name')--}}
{{--                                    <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <i style="color:#BD362F;!important">{{ $message }}</i>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>{{__('front.email')}} <span style="color: red">*</span></label>--}}
{{--                                        <input type="email" placeholder="{{__('front.email')}}"--}}
{{--                                               class="form-control @error('email') is-invalid @enderror"--}}
{{--                                               name="email" id="email_1" autocomplete="email" autofocus>--}}
{{--                                    </div>--}}
{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback " role="alert">--}}
{{--                                    <i class="alert-danger"--}}
{{--                                       style="color:#BD362F;!important">{{ $message }}</i>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                    <div class="form-group mb-5">--}}
{{--                                        <label>{{__('front.phone')}} <span style="color: red">*</span></label>--}}
{{--                                        <input type="tel"--}}
{{--                                               name="phone_number" id="phone_number" placeholder="{{__('front.phone')}}"--}}
{{--                                               required--}}
{{--                                               class="form-control left-padding-phone px-4 @error('phone_number') is-invalid @enderror"--}}
{{--                                               value="+966" >--}}
{{--                                    </div>--}}
{{--                                    @error('phone_number')--}}
{{--                                    <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <i style="color:#BD362F;!important">{{ $message }}</i>--}}
{{--                                     </span>--}}
{{--                                    @enderror--}}
{{--                                    <div class="form-group mb-5">--}}
{{--                                        <label>{{__('front.city')}} <span style="color: red">*</span></label>--}}
{{--                                        <select name="city_id" class="form-control form-control-md">--}}
{{--                                            <option value="0"--}}
{{--                                                    selected="selected">{{__('front.select_city')}}</option>--}}
{{--                                            @foreach(getCities() as $city)--}}
{{--                                                <option value="{{$city->id}}">{{$city->name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    @error('city_id')--}}
{{--                                    <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <i style="color:#BD362F;!important">{{ $message }}</i>--}}
{{--                                     </span>--}}
{{--                                    @enderror--}}
{{--                                    <div class="form-group mb-5">--}}
{{--                                        <label>{{__('front.password')}} <span style="color: red">*</span></label>--}}
{{--                                        <input type="password" class="form-control text-right" name="password" id="password_1"--}}
{{--                                               required>--}}
{{--                                    </div>--}}
{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <i style="color:#BD362F;!important">{{ $message }}</i>--}}
{{--                                     </span>--}}
{{--                                    @enderror--}}
{{--                                    <div class="form-group mb-5">--}}
{{--                                        <label>{{__('front.password_confirm')}} <span style="color: red">*</span></label>--}}
{{--                                        <input type="password" class="form-control text-right" name="password_confirmation"--}}
{{--                                               id="password_1" required>--}}
{{--                                    </div>--}}
{{--                                    @error('password_confirmation')--}}
{{--                                    <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <i style="color:#BD362F;!important">{{ $message }}</i>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}

{{--                                <button type="submit" class="btn btn-primary">{{__('front.sign_up')}}</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('scripts')--}}
{{--    <script src="{{ asset('custom/js/jquery.validate.min.js') }}"></script>--}}
{{--    <script>--}}

{{--        let countryData = window.intlTelInputGlobals.getCountryData(),--}}
{{--            input = document.querySelector("#phone_number"),--}}
{{--            input2 = document.querySelector("#phone_number2"),--}}
{{--            addressDropdown = document.querySelector("#address-country");--}}

{{--        // init plugin--}}
{{--        var iti = window.intlTelInput(input, {--}}
{{--            utilsScript: "{{asset('web/js/utils.js')}}", // just for formatting/placeholders etc--}}
{{--        });--}}
{{--        var iti2 = window.intlTelInput(input2 , {--}}
{{--            utilsScript: "{{asset('web/js/utils.js')}}", // just for formatting/placeholders etc--}}
{{--        });--}}
{{--        jQuery(document).ready(function () {--}}
{{--            let $registerForm = $('#form-login');--}}
{{--            if ($registerForm.length) {--}}
{{--                $registerForm.validate({--}}
{{--                    rules: {--}}
{{--                        phone_number: {--}}
{{--                            required: true,--}}
{{--                            minlength: 5,--}}
{{--                        },--}}
{{--                        password: {--}}
{{--                            required: true,--}}
{{--                        },--}}
{{--                    },--}}
{{--                    messages:{--}}
{{--                        phone_number: {--}}
{{--                            required:"{{__('front.requiredMessage')}}",--}}
{{--                            minlength: "{{__("front.minFive")}}",--}}
{{--                        },--}}
{{--                        password: {--}}
{{--                            required:"{{__('front.requiredMessage')}}",--}}

{{--                        },--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}

{{--        let $registerForm = $('#form-register');--}}
{{--        $.validator.addMethod( "notEqualToValue", function( value, element, param ) {--}}
{{--            return value != param;--}}
{{--        }, "Please select a valid value" );--}}

{{--        if ($registerForm.length) {--}}
{{--            $registerForm.validate({--}}
{{--                rules: {--}}
{{--                    first_name: {--}}
{{--                        required: true--}}
{{--                    },--}}
{{--                    last_name: {--}}
{{--                        required: true--}}
{{--                    },--}}
{{--                    city_id: {--}}
{{--                        required: true,--}}
{{--                        notEqualToValue: 0--}}
{{--                    },--}}
{{--                    email: {--}}
{{--                        required: true--}}
{{--                    },--}}
{{--                    phone_number: {--}}
{{--                        required: true,--}}
{{--                        minlength: 5,--}}
{{--                    },--}}
{{--                    password: {--}}
{{--                        required: true,--}}
{{--                        minlength: 5--}}
{{--                    },--}}
{{--                    password_confirmation: {--}}
{{--                        required: true,--}}
{{--                        equalTo: "#password_1"--}}
{{--                    },--}}
{{--                },--}}
{{--            });--}}
{{--        }--}}

{{--    </script>--}}
{{--@endsection--}}
