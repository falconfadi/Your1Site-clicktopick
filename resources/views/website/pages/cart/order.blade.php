@extends('website.app')
@section('title')
    {{__('front.order')}}
@endsection
@section('content')
    <!-- Start of Breadcrumb -->
    @if(session()->has('message'))
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="passed"><a href="{{route('cart')}}">{{__('front.shopping')}}</a></li>
                    <li class="passed"><a href="{{route('checkout')}}">{{__('front.checkout')}}</a></li>
                    <li class="active"><a
                            href="{{route('user.order.show',$order->code)}}">{{__('front.order_complete')}}</a></li>
                </ul>
            </div>
        </nav>
    @endif
    <!-- End of Breadcrumb -->
    <!-- Start of PageContent -->
    <div class="mt-5 mb-10 pb-2">
        <div class="container ">
            @if(session()->has('success'))
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    {{__('front.thanks_for_ordering')}}
                </div>
            @endif
        <!-- End of Order Success -->
            @if($order)
                <ul class="order-view list-style-none">
                    <li>
                        <label>{{__('front.order_code')}}</label>
                        <strong>{{$order->code}}</strong>
                    </li>
                    <li>
                        <label>{{__('front.status')}}</label>
                        <strong>{{$order->statusName}}</strong>
                    </li>
                    <li>
                        <label>{{__('front.date')}}</label>
                        <strong>{{$order->date}}</strong>
                    </li>
                    <li>
                        <label>{{__('front.total')}}</label>
                        <strong>{{$order->total_price ." " .getAppCurrency()->symbol }}</strong>
                    </li>
                </ul>
                <!-- End of Order View -->

                <div class="order-details-wrapper mb-5">
                    <h4 class="title text-uppercase ls-25 mb-5">{{__('front.order_details')}}</h4>
                    <table class="order-table">
                        <thead>
                        <tr>
                            <th class="text-dark">{{__('front.product')}}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($order->cart)
                            @foreach($order->cart->items as $item)
                                <tr>
                                    <td>
                                        <a href="{{route('user.products.show', $item->product)}}">{{$item->product->name}}</a>&nbsp;<strong>x {{$item->qty}}</strong><br>
                                    </td>
                                    <td>{{$item->product->price." " .getAppCurrency()->symbol}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__('front.coupon_amount')}}:</th>
                            <td>{{$order->discount_on_coupon ." " ."%" }}</td>
                        </tr>
                        <tr>
                            <th>{{__('front.subtotal')}}:</th>
                            <td>{{$order->total_price ." " .getAppCurrency()->symbol }}</td>
                        </tr>
                        <tr>
                            <th>{{__('front.shipping_fess')}}:</th>
                            <td>{{$order->cart->calculateShippingPrice() . " ". getAppCurrency()->symbol}}</td>
                        </tr>
                        <tr class="total">
                            <th class="border-no">{{__('front.total')}}:</th>
                            <td>{{getTotalPrice($order->total_price , $order->cart->calculateShippingPrice()) .' ' .getAppCurrency()->symbol}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- End of Order Details -->
                @if(count($user->orders) > 1 )
                    <div class="sub-orders mb-10">
                        <h4 class="title mb-5 font-weight-bold ls-25">{{__('front.expired_orders')}}</h4>
                        <div class="alert alert-icon alert-inline mb-5">
                            <i class="w-icon-exclamation-triangle"></i>
                            <strong>{{__('front.note')}}: </strong>{{__('front.note_info')}}
                        </div>
                        <table class="order-subtable">
                            <thead>
                            <tr>
                                <th class="px-3 order">{{__('front.order')}}</th>
                                <th class="px-3 date">{{__('front.date')}}</th>
                                <th class="px-3 status">{{__('front.status')}}</th>
                                <th class="px-3 total">{{__('front.total')}}</th>
                                <th class="px-3 action"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->orders as $item)
                                @if($item->id != $order->id)
                                    <tr>
                                        <td class="px-3 order">{{$item->code}}</td>
                                        <td class="px-3 date">{{$item->date}}</td>
                                        <td class="px-3 status">{{$item->statusName}}</td>
                                        <td class="px-3 total">{{$item->total_price ." " .getAppCurrency()->symbol }}</td>
                                        <td class="px-3 action"><a href="{{route('user.order.show',$item->code)}}"
                                                              class="btn btn-rounded">{{__('front.view')}}</a></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            <!-- End of Sub Orders-->
                <div id="account-addresses">
                    <div class="row">
                        <div class="col-sm-6 mb-8">
                            <div class="ecommerce-address shipping-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">{{__('front.shipping_details')}}</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                        <tr>
                                            <td>{{__('front.first_name')}}
                                                : {{$order->orderDetail->shippingDetails->first_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('front.last_name')}}
                                                : {{$order->orderDetail->shippingDetails->last_name}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('front.address')}}
                                                : {{$order->orderDetail->shippingDetails->address}}</td>
                                        </tr>
{{--                                        <tr>--}}
{{--                                            <td>{{__('front.city')}}--}}
{{--                                                : {{$order->orderDetail->shippingDetails->city->name}}</td>--}}
{{--                                        </tr>--}}
                                        <tr>
                                            <td>{{__('front.post_code')}} : {{$order->orderDetail->shippingDetails->post_code}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{__('front.phone')}}
                                                : {{$order->orderDetail->shippingDetails->phone_number}}</td>
                                        </tr>
                                        <tr class="email">
                                            <td>{{__('front.email')}}
                                                : {{$order->orderDetail->shippingDetails->email}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End of Account Address -->
            @endif
            <a href="{{route('user.index')}}" class="btn btn-primary btn-rounded btn-icon-left btn-back mt-6">
                <i class="w-icon-long-arrow-left"></i>{{__('front.back_to_list')}}</a>
        </div>
    </div>
    <!-- End of PageContent -->
@endsection
