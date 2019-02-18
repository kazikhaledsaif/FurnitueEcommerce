<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
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
                        <li class="active"><a >Search result: </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====  End of Breadcrumb Area  ======-->


<!--=============================================
=            shop page content         =
=============================================-->

<div class="shop-page-content mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <!--=======  sidebar  =======-->

                <div class="sidebar-container shop-sidebar-container">
                    <!--=======  single widget  =======-->



                    <!--=======  End of single widget  =======-->

                    <!--=======  single widget  =======-->

                    <div class="single-sidebar-widget">
                        <h3 class="sidebar-title mb-30">Filter By</h3>

                        <div class="sub-widget mb-30">
                            <h3 class="sidebar-title">Price</h3>
                            <div class="category-container mb-30">
                                <ul>
                                    <li>
                                        <label class="radio-container">
                                            <a href="shop-left-sidebar.html"> $11.00 - $12.00 (1)</a>
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="radio-container">
                                            <a href="shop-left-sidebar.html"> $45.00 - $48.00 (16)</a>
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="radio-container">
                                            <a href="shop-left-sidebar.html"> $50.00 - $66.00 (10)</a>
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="radio-container">
                                            <a href="shop-left-sidebar.html"> $70.00 - $80.00 (9)</a>
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!--=======  End of single widget  =======-->
                </div>

                <!--=======  End of sidebar  =======-->
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <!--=======  shop header  =======-->

                <div class="shop-header mb-20">

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-20 d-flex align-items-center">
                            <!--=======  view mode  =======-->

                            <div class="view-mode-icons">
                                <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                <a href="#" data-target="list"><i class="fa fa-list"></i></a>
                            </div>


                            <!--=======  End of view mode  =======-->

                        </div>

                    </div>
                </div>

                <!--=======  End of shop header  =======-->

                <!--=======  shop product wrap   =======-->

                <div class="shop-product-wrap grid row">

                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <!--=======  grid view product  =======-->

                            <div class="ptk-product shop-grid-view-product">
                                <div class="image">
                                    <a href="{{route('shop.show',$product->slug)}}">
                                        <img  height="360" width="300" src="{{ asset('storage/'.$product->product_image)  }}" class="img-fluid" alt="{{ $product->name }}">
                                    </a>
                                    <!--=======  hover icons  =======-->
                                    <a class="hover-icon" href="#" data-toggle = "modal" data-target="#quick-view-modal-container{{ $product->id }}"><i class="lnr lnr-eye"></i></a>
                                    <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a>
                                    <a class="hover-icon" href="#"><i class="lnr lnr-cart"></i></a>

                                    <!--=======  End of hover icons  =======-->

                                    <!--=======  badge  =======-->

                                    <div class="product-badge">
                                        <span class="new-badge">NEW</span>
                                        <span class="discount-badge">-8%</span>
                                    </div>

                                    <!--=======  End of badge  =======-->

                                </div>
                                <div class="content">
                                    <p class="product-title"><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></p>
                                    <p class="product-price">
                                        @if( $product->discount_price == 0 )
                                            <span class="main-price"> ${{ $product->present_price }}</span>
                                        @else
                                            <span class="main-price discounted">${{ $product->present_price }}</span>
                                            <span class="discounted-price"> ${{ $product->discount_price }}</span>
                                        @endif

                                    </p>
                                </div>
                                <div class="rating">
                                    <i class="lnr lnr-star active"></i>
                                    <i class="lnr lnr-star active"></i>
                                    <i class="lnr lnr-star active"></i>
                                    <i class="lnr lnr-star active"></i>
                                    <i class="lnr lnr-star"></i>
                                </div>
                            </div>

                            <!--=======  End of grid view product  =======-->

                            <!--=======  product list view  =======-->

                            <div class="ptk-product shop-list-view-product">
                                <div class="image">
                                    <a href="{{route('shop.show',$product->slug)}}">
                                        <img src="{{ asset('storage/'.$product->product_image)  }}" class="img-fluid" alt="">
                                    </a>

                                    <!--=======  badge  =======-->

                                    <div class="product-badge">
                                        <span class="new-badge">NEW</span>
                                        <span class="discount-badge">-8%</span>
                                    </div>

                                    <!--=======  End of badge  =======-->

                                </div>
                                <div class="content">
                                    <p class="product-title"><a href="{{route('shop.show',$product->slug)}}">{{$product->name}}</a></p>
                                    <div class="rating ">
                                        <i class="lnr lnr-star active"></i>
                                        <i class="lnr lnr-star active"></i>
                                        <i class="lnr lnr-star active"></i>
                                        <i class="lnr lnr-star active"></i>
                                        <i class="lnr lnr-star"></i>
                                    </div>
                                    <p class="product-price">
                                        @if( $product->discount_price == 0 )
                                            <span class="main-price"> ${{ $product->present_price }}</span>
                                        @else
                                            <span class="main-price discounted">${{ $product->present_price }}</span>
                                            <span class="discounted-price"> ${{ $product->discount_price }}</span>
                                        @endif

                                    </p>
                                    <p class="product-description">{{$product->details}}</p>
                                    <!--=======  hover icons  =======-->
                                    <div class="hover-icons">

                                        <a class="hover-icon" href="#" data-toggle = "modal" data-target="#quick-view-modal-container{{ $product->id }}"><i class="lnr lnr-eye"></i></a>
                                        <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a>
                                        <a class="hover-icon" href="#"><i class="lnr lnr-cart"></i></a>
                                    </div>
                                    <!--=======  End of hover icons  =======-->
                                </div>

                            </div>

                            <!--=======  End of product list view  =======-->
                        </div>
                    @endforeach


                </div>
            {{ $products->links() }}

            <!--=======  End of shop product wrap    =======-->


            </div>
        </div>
    </div>
</div>

<!--=====  End of shop page content  ======-->

<div id="dynamic-content"></div>


<!--=============================================
=            Quick view modal         =
=============================================-->
@foreach($products as $product)
    <div class="modal fade quick-view-modal-container" id="quick-view-modal-container{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <!-- product quickview image gallery -->
                            <div class="product-image-slider quickview-product-image-slider flex-row-reverse">
                                <!--Modal Tab Content Start-->
                                <div class="tab-content product-large-image-list quickview-product-large-image-list">
                                    <div class="tab-pane fade show active" id="single-slide-quick-1" role="tabpanel" aria-labelledby="single-slide-tab-quick-1">
                                        <!--Single Product Image Start-->
                                        <div class="single-product-img img-full">
                                            <img src="{{ asset('storage/'.$product->product_image)  }}"
                                                 class="img-fluid" alt="{{ $product->name }}">
                                        </div>
                                        <!--Single Product Image End-->
                                    </div>
                                </div>
                                <!--Modal Content End-->
                                <!--Modal Tab Menu Start-->
                                <!--Modal Tab Menu End-->
                            </div>
                            <!-- end of product quickview image gallery -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <!-- product quick view description -->
                            <div class="product-feature-details">
                                <h2 class="product-title mb-15">{{ $product->name }}</h2>

                                <h2 class="product-price mb-15">
                                    @if( $product->discount_price == 0 )
                                        <span class="main-price"> ${{ $product->present_price }}</span>
                                    @else
                                        <span class="main-price discounted">${{ $product->present_price }}</span>
                                        <span class="discounted-price"> ${{ $product->discount_price }}</span>
                                    @endif

                                    <span class="discount-percentage">Save 8%</span>
                                </h2>

                                <p class="product-description mb-20">
                                    {{ $product->details }}
                                </p>


                                <div class="cart-buttons mb-20">
                                    <div class="pro-qty mr-10">
                                        <input type="text" value="1">
                                    </div>
                                    <div class="add-to-cart-btn">
                                        <a href="#" class="pataku-btn"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>


                                <div class="social-share-buttons">
                                    <h3>share this product</h3>
                                    <ul>
                                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end of product quick view description -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--=====  End of Quick view modal  ======-->
@endforeach



<!--=============================================
=            Footer         =
=============================================-->


@include('includes.footer')




<!-- scroll to top  -->
<a href="#" class="scroll-top"></a>
<!-- end of scroll to top -->

<!-- JS
============================================ -->
<!-- jQuery JS -->
<script src="{{ asset('frontend/js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>