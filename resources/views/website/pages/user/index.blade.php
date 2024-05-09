@extends('website.app')
@section('title')
    {{$user->name}}
@endsection
@section('style')
    <style type="text/css">
        body{
            background: #f7f7ff;
            margin-top:20px;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: .25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }
        .me-2 {
            margin-right: .5rem!important;
        }

        .imgUp {
            margin-bottom: 15px;
            padding: 0px !important;
        }

        .imagePreview {
            width: 133px;
            height: 133px;
            position: relative;
            background-position: center center;
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            box-shadow: 1px 2px rgba(0, 0, 0, 0.2);
            border-radius: 50%;
            margin: auto;
        }

    </style>
@endsection
@section('content')
    <div class="container mt-4">

{{--    start tab--}}
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{__('front.profile')}}</button>
{{--                <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>--}}
{{--                <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>--}}
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <form class="form account-details-form" action="{{route('user.user-update',$user)}}"
                      method="POST" id="form_update_acoount" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="main-body m-2">

                    <div class="row">

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div class="imgUp">
                                            <div class="imagePreview" id="imagePreview_user"
                                                 style="background-image: url({{storageImage($user->avatar)}}) ,url(../web/images/no-image.jpg)">
                                                <i class="fas fa-2x fa-plus-circle round" id="uploadButton" onclick="upload()"
                                                   style="cursor: pointer;position: absolute;left: 8px;    right: unset;top: 101px;"></i>

                                                <input type="file" class="uploadFile img" id="upload_impage_user"
                                                       name='avatar' value="Upload Photo"
                                                       onchange="onFileSelected(event)"
                                                       hidden style="cursor:pointer; margin-top: 65px;" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <h4>{{$user->name}}</h4>
                                            <p class=" mb-1">{{$user->address}}</p>
                                            <p class="text-muted font-size-sm">{{$user->email}}</p>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
{{--                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">--}}
{{--                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>--}}
{{--                                            <span class="text-secondary">https://bootdey.com</span>--}}
{{--                                        </li>--}}
{{--                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">--}}
{{--                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>--}}
{{--                                            <span class="text-secondary">bootdey</span>--}}
{{--                                        </li>--}}
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                            <span class="text-secondary">@bootdey</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                            <span class="text-secondary">bootdey</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                            <span class="text-secondary">bootdey</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                        @include('website.base._error')
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('front.first_name')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" id="display-name" name="first_name"
                                                   placeholder="{{$user->first_name}}"
                                                   value="{{old('first_name' , $user->first_name)}}"
                                                   class="form-control  @error('first_name') is-invalid @enderror ">
                                        </div>
                                    </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">{{__('front.last_name')}}</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" id="display-name" name="last_name"
                                                       placeholder="{{$user->last_name}}"
                                                       value="{{old('last_name' , $user->last_name)}}"
                                                       class="form-control ">
                                            </div>
                                        </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('front.email')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" id="email_1" name="email"
                                                   placeholder="{{$user->email??''}}"
                                                   value="{{old('email' , $user->email)}}"
                                                   class="form-control ">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('front.phone')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="tel"
                                                   name="phone_number" id="phone_number2" placeholder="{{__('front.phone')}}"
                                                   required
                                                   value="{{old('phone_number',$user->phone_number) ?? '+966'}}"
                                                   class="form-control @error('phone_number') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('front.change_password')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control "
                                                   id="new-old_password" name="old_password">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">{{__('front.blank_password')}}</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control "
                                                   id="new_password" name="password" placeholder="leave blank to leave unchanged">

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">{{__('front.password_confirm')}}</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="password" class="form-control "
                                                       id="conf-password" name="password_confirmation">

                                            </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="{{__('front.send')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <div class="card">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h5 class="d-flex align-items-center mb-3">Project Status</h5>--}}
{{--                                            <p>Web Design</p>--}}
{{--                                            <div class="progress mb-3" style="height: 5px">--}}
{{--                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                            <p>Website Markup</p>--}}
{{--                                            <div class="progress mb-3" style="height: 5px">--}}
{{--                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                            <p>One Page</p>--}}
{{--                                            <div class="progress mb-3" style="height: 5px">--}}
{{--                                                <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                            <p>Mobile Template</p>--}}
{{--                                            <div class="progress mb-3" style="height: 5px">--}}
{{--                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                            <p>Backend API</p>--}}
{{--                                            <div class="progress" style="height: 5px">--}}
{{--                                                <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                    </div>

                </div>
                </form>

            </div>
{{--            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>--}}
{{--            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>--}}
        </div>
{{--    end tab--}}





    </div>
@endsection
@section('scripts')
    <script src="{{ asset('custom/js/jquery.validate.min.js') }}"></script>
    <script>

        let countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone_number"),
            input2 = document.querySelector("#phone_number2"),
            addressDropdown = document.querySelector("#address-country");

        // init plugin
        var iti = window.intlTelInput(input, {
            utilsScript: "{{asset('web/js/utils.js')}}", // just for formatting/placeholders etc
        });
        var iti2 = window.intlTelInput(input2 , {
            utilsScript: "{{asset('web/js/utils.js')}}", // just for formatting/placeholders etc
        });

        jQuery(document).ready(function () {
            // get the country data from the plugin
            $.validator.addMethod( "notEqualToValue", function( value, element, param ) {
                return value != param;
            }, "Please select a valid value" );

            let $registerForm = $('#form_update_acoount');
            if ($registerForm.length) {
                $registerForm.validate({
                    rules: {
                        name: {
                            nullable: true
                        },
                        email: {
                            email: true,
                        },
                        password: {
                            nullable: true,
                        },
                        password_confirmation: {
                            // required: true,
                            equal: '#new_password'
                        },
                    },
                    messages:{

                        phone_number: {
                            required:"{{__('front.requiredMessage')}}",
                            minlength: "{{__("front.minFive")}}",
                        },

                    },


            });
        }
        let $Form = $('#shipping_form');
        if ($Form.length) {
            $Form.validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    email: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    post_code: {
                        required: true
                    },
                    phone_number: {
                        required: true,
                        minlength: 5,
                    },
                    city_id: {
                        required: true,
                        notEqualToValue: 0
                    },
                    address: {
                        required: true,
                    },
                },
                messages:{
                    address:{
                        required:"{{__('front.requiredMessage')}}"
                    },
                    first_name: {
                        required:"{{__('front.requiredMessage')}}"
                    },
                    email: {
                        required:"{{__('front.requiredMessage')}}"
                    },
                    last_name: {
                        required:"{{__('front.requiredMessage')}}"
                    },
                    post_code: {
                        required:"{{__('front.requiredMessage')}}"
                    },
                    phone_number: {
                        required:"{{__('front.requiredMessage')}}",
                        minlength: "{{__("front.minFive")}}",
                    },
                    city_id: {
                        required:"{{__('front.requiredMessage')}}",
                        notEqualToValue: 0
                    },

                },
            });
        }
        });
    </script>
@endsection