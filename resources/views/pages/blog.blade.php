<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Blog == FurnitureVilla-Texas || Luxury starts here </title>
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

<!--=============================================
=            Header One         =
=============================================-->
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
                        <li><a href="index.html">Home</a> <span class="separator">/</span></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====  End of Breadcrumb Area  ======-->


<!--=============================================
    =            Blog Page Container         =
    =============================================-->

<div class="blog-page-container mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  blog post container  =======-->

                <div class="blog-post-container mb-15">

                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-lg-4 col-md-6">
                            <!--=======  single blog post  =======-->

                            <div class="single-blog-post mb-35">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single-blog-post-media mb-20">
                                            <div class="image">
                                                <a href="{{route('blog.post',$post->slug)}}"><img src="{{ Voyager::image( $post->image ) }}" class="img-fluid" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single-blog-post-content">
                                            <h3 class="post-title"> <a href="{{route('blog.post',$post->slug)}}">{{ $post->title }}</a></h3>
                                            <div class="post-meta">
                                                <p><span><i class="fa fa-calendar"></i> {{ $post->created_at->format('d/m/Y') }}</span></p>
                                            </div>

                                            <p class="post-excerpt">

                                                    {{ $post->excerpt }}

                                            </p>
                                            <a href="{{route('blog.post',$post->slug)}}" class="blog-readmore-btn">continue <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--=======  End of single blog post  =======-->
                        </div>
                        @endforeach


                    </div>
                </div>

                <!--=======  End of blog post container  =======-->

                <!--=======  Pagination container  =======-->

 

                <!--=======  End of Pagination container  =======-->
            </div>
        </div>
    </div>
</div>

<!--=====  End of Blog Page Container  ======-->


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