@extends('website.app')
@section('title',__('front.contact'))
@section('content')
<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">{{__('front.contact_us')}}</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            @include('website.base._error')
            <div class="contact-form">
                <div id="success"></div>
                <form name="sentMessage" id="formId" action="{{route('user.contactUs')}}" method="post" >
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{__('front.name')}}"
                               required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{__('front.email')}}"
                               required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>

                    <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" name="message" placeholder="{{__('front.message')}}"
                                      required="required"
                                      data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" >{{__('front.send')}}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <h5 class="font-weight-semi-bold mb-3">{{__('front.get_in_touch')}}</h5>
            <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>

            <div class="d-flex flex-column">
                {{-- <h5 class="font-weight-semi-bold mb-3">Store 2</h5> --}}
              <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>
               {{getSetting('site_address')}}

            </p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>
                {{getSetting('site_email')}}

                </p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>
                {{ getSetting('site_phone')}}

                </p>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

@endsection
@section('scripts')
    <script src="{{ asset('custom/js/jquery.validate.min.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            let $registerForm = $('#formId');
            if ($registerForm.length) {
                $registerForm.validate({
                    rules: {
                        name: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        message: {
                            required: true,
                        },
                    },
                });
            }
        });
    </script>
@endsection
