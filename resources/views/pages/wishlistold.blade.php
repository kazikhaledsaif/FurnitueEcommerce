<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wishlist</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }} ">
    <!-- CSS
    =========================================== -->
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
                        <li class="active">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====  End of Breadcrumb Area  ======-->


<!--=============================================
=            Wishlist page content         =
=============================================-->
<div  class="container">
    @if(session()->has('success_message'))
        <div class="alert alert-success">
            <h4> {{session()->get('success_message')}}</h4>
        </div><br><br>
    @endif
    @if(count($errors)>0)
        <div class=" alert alert-danger">
            <ul>
                @foreach($errors->all as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div><br><br>
    @endif
</div>
@if(Cart::instance('wishlist')->count()>0)
    <div  class="container">
        <h4>{{Cart::instance('wishlist')->count()}} item(s) in Wishlist</h4><br><br>
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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::instance('wishlist')->content() as $item)
                                <tr>
                                    <td class="pro-thumbnail"><a href="{{ route('shop.show',$item->model->slug) }}"><img src="{{ asset('storage/'.$item->model->product_image)  }} " class="img-fluid" alt="Product"></a></td>
                                    <td class="pro-title"><a href="{{ route('shop.show',$item->model->slug) }}">{{$item->model->name}}</a></td>
                                    <td class="pro-price"><span>${{$item->model->present_price}}</span></td>

                                    <td class="pro-subtotal"><span>{{$item->qty}}</span></td>
                                    <td class="pro-subtotal"><span>${{($item->qty)*($item->model->present_price)}}</span></td>

                                    <td class="pro-remove"><a href="{{route('wishlist.destroy', $item->rowId)}}"><i class="fa fa-trash-o"></i></a></td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!--=======  End of cart table  =======-->



            </div>
        </div>
    </div>
</div>

<!--=====  End of Wishlist page content  ======-->
@else

    <div  class="container">
        <h4>No items in Wishlist!</h4><br><br>
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