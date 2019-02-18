<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Cart </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }} ">

    <!-- CSS
    ============================================ -->

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/linear-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/helper.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}">

    <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>


</head>

<body>

@include('includes.header')


<!--=============================================
    =            Breadcrumb Area         =
    =============================================-->

<div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-container">
                    <ul>
                        <li><a href="{{ route('page.index') }}">Home</a> <span class="separator">/</span></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====  End of Breadcrumb Area  ======-->
@if(session()->has('success_message'))
    <div class="alert alert-success">
        <h4> {{session()->get('success_message')}}</h4>
    </div><br><br>

@elseif(session()->has('error_massage'))
    <div class="alert alert-danger">
        <h4> {{session()->get('error_massage')}}</h4>
    </div><br><br>
@elseif(session()->has('alert_massage'))
    <div class="alert alert-info">
        <h4> {{session()->get('alert_massage')}}</h4>
    </div><br><br>
@endif

<!--=============================================
=            Cart page content         =
=============================================-->
<div  class="container">


</div>
@if(Cart::instance('default')->count()>0)
    <div  class="container">
        <h4>{{Cart::instance('default')->count()}} item(s) in Shopping Cart</h4><br><br>
    </div>
    <div class="page-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!--=======  cart table  =======-->

                    <div class="cart-table table-responsive mb-40">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                                <th class="pro-remove">Update</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::instance('default')->content() as $item)

                                <tr>
                                    <form action="{{route('cart.update', $item->rowId)}}" method="POST">
                                        {!! csrf_field() !!}
                                       {{-- <span id="stock{{$item->model->id}}" > {{$item->model->stock }}</span>--}}
                                        <td class="pro-thumbnail"><a href="{{ route('shop.show',$item->model->slug) }}"><img src="{{ asset('storage/'.$item->model->product_image)  }} " class="img-fluid" alt="Product"></a></td>
                                        <td class="pro-title"><a href="{{ route('shop.show',$item->model->slug) }}">{{$item->model->name}}</a></td>


                                        @if( $item->model->discount_price == 0 )


                                            <td class="pro-price"><span>${{$item->model->present_price}}</span></td>
                                        @else
                                            <td class="pro-price"><span>${{$item->model->discount_price}}</span></td>

                                        @endif


                                        <td class="pro-quantity"><div class="pro-qty">
                                                <input type="text" name="quantity" id="quantity" max="{{$item->model->stock}}" value="{{$item->qty}}" >
                                            </div></td>


                                        {{--<td class="pro-subtotal"><span>{{$item->qty}}</span></td>--}}



                                        @if( $item->model->discount_price == 0 )


                                            <td class="pro-subtotal"><span>${{($item->qty)*$item->model->present_price}}</span></td>
                                        @else

                                            <td class="pro-subtotal"><span>${{($item->qty)*$item->model->discount_price}}</span></td>

                                        @endif


                                        <input name="id" type="hidden" value="{{$item->rowId}}">


                                        <td class="pro-remove"><a href="{{route('cart.destroy', $item->rowId)}}"><i class="fa fa-trash-o"></i></a></td>
                                        <td class="pro-remove">
                                            <button type="submit" class="">  <i class="fa fa-repeat"></i> </button>
                                        </td>
                                    </form>

                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!--=======  End of cart table  =======-->


                    </form>

                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <!--=======  Calculate Shipping  =======-->

                            <div class="calculate-shipping">
                                <h4>Calculate Shipping</h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>China</option>
                                                <option>country</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="nice-select">
                                                <option>Dhaka</option>
                                                <option>Barisal</option>
                                                <option>Khulna</option>
                                                <option>Comilla</option>
                                                <option>Chittagong</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="text" placeholder="Postcode / Zip">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="submit" value="Estimate">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--=======  End of Calculate Shipping  =======-->

                            <!--=======  Discount coupon  =======-->

                            @if(!session()->has('coupon'))
                                <div class="discount-coupon">
                                    <h4>Discount Coupon Code</h4>
                                    <form action="{{ route('coupon.store') }}" method="POST">
                                        <div class="row">
                                            {{ csrf_field() }}
                                            <div class="col-md-6 col-12 mb-25">
                                                <input type="text" name="coupon_code" id="coupon_code" placeholder="Coupon Code" required>
                                          {{--      <input type="hidden" name="total" value="{{ Cart::instance('default')->total() }}">--}}
                                            </div>
                                            <div class="col-md-6 col-12 mb-25">
                                                <input type="submit" value="Apply Code">
                                            </div>
                                        </div>
                                    </form>


                                </div>
                        @endif

                        <!--=======  End of Discount coupon  =======-->

                        </div>


                        <div class="col-lg-6 col-12 d-flex">
                            <!--=======  Cart summery  =======-->

                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4>Cart Summary</h4>
                                    <p>Sub Total <span>${{Cart::instance('default')->total()}}</span></p>
                                    <p>Shipping Cost <span>$00.00</span></p>
                                    @if(session()->has('coupon'))

                                        <p>Discount  [ {{ session()->get('coupon')['name'] }} ]

                                            <span>-${{ session()->get('coupon')['amount'] }}</span></p>
                                        <form action="{{ route('coupon.destroy') }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" style="background: black; color: white; border: none; margin-bottom: 2px;">Remove coupon</button>
                                        </form>

                                    @endif

                                    <h2>Grand Total <span>$<?php
                                            $num1= (Cart::instance('default')->total());
                                            $num2= (session()->get('coupon')['amount']);
                                            $res =  (double)str_replace(',','',$num1)-
                                                (double)str_replace(',','',$num2);
                                            echo $res;

                                            ?> </span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    {{--<button>  <a href="{{route('checkout.index')}}"  class="checkout-btn">Checkout</a>  </button>--}}
                                    <a class="floating-cart-btn" href="{{route('checkout.index')}}">Checkout</a>
                                    {{--   <button class="update-btn pl-5">Update Cart</button>--}}
                                </div>
                            </div>

                            <!--=======  End of Cart summery  =======-->

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--=====  End of Cart page content  ======-->
@else

    <div  class="container">
        <h4>No items in Cart!</h4><br><br>
    </div>

@endif


@include('includes.footer')

<!--=====  End of Top selling product section  ======--><a href="#" class="scroll-top"></a>
<!-- end of scroll to top -->

<!-- JS
============================================ -->
<!-- Popper JS -->
<script src="{{ asset('frontend/js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>


</body>

</html>