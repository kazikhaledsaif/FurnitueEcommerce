<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ $post->title }} </title>
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
    <style>
        .display-comment .display-comment {
            margin-left: 40px !important;
        }
        .pataku-btn-reply{

            text-align: center !important;
            display: inline-block !important;
            border: 1px solid #cea45f  !important;
            color: #cea45f !important;
            padding: 5px 15px !important;
            font-weight: 500  !important;
            border-radius: 50px !important;
            vertical-align:middle !important;
            font-size: 13px !important;
        }
        .pataku-btn:hover, .pataku-btn:active, .pataku-btn:focus {
            background-color: #cea45f  !important;
            color: #ffffff !important;

        }

        textarea#commentMessage2 {
            height: 60px !important;
        }

        input.reply-btn.pataku-btn.pataku-btn-reply {
            height: 43px!important;
            line-height: 36px!important;
        }
    </style>

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
                        <li><a href="/">Home</a> <span class="separator">/</span></li>
                        <li class="active">Blog Post</li>
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
            <div class="col-lg-3 order-2 order-lg-1">
                <!--=======  sidebar  =======-->

                <div class="sidebar-container shop-sidebar-container">
                    <!--=======  single widget  =======-->



                    <!--=======  End of single widget  =======-->

                    <!--=======  single widget  =======-->



                    <!--=======  End of single widget  =======-->

                    <!--=======  single widget  =======-->

                    <div class="single-sidebar-widget mb-30">
                        <h3 class="sidebar-title">Recent Posts</h3>
                        <!--=======  block container  =======-->

                        <div class="block-container">
                        @foreach($related_post as $related)
                            <!--=======  single block  =======-->

                                <div class="single-block d-flex">
                                    <div class="image">
                                        <a href="{{route('blog.post',$related->slug)}}">
                                            <img src="{{ Voyager::image( $related->image ) }}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <p><a href="{{route('blog.post',$related->slug)}}">{{ $related->title }}</a> <span>{{ $related->created_at->format('F j, Y') }}</span></p>
                                    </div>
                                </div>

                                <!--=======  End of single block  =======-->
                            @endforeach


                        </div>

                        <!--=======  End of block container  =======-->
                    </div>

                    <!--=======  End of single widget  =======-->

                    <!--=======  single widget  =======-->


                    <!--=======  End of single widget  =======-->


                    <!--=======  single widget  =======-->


                    <!--=======  End of single widget  =======-->

                </div>

                <!--=======  End of sidebar  =======-->
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <!--=======  blog post container  =======-->

                <div class="blog-single-post-container mb-80">

                    <!--=======  post title  =======-->


                    <h3 class="post-title">{{ $post->title }}</h3>

                    <!--=======  End of post title  =======-->


                    <!--=======  Post meta  =======-->
                    <div class="post-meta">
                        <p> <span><i class="fa fa-calendar"></i> Posted On:{{ $post->created_at->format('F j, Y') }}</span></p>
                    </div>

                    <!--=======  End of Post meta  =======-->

                    <!--=======  Post media  =======-->

                    <div class="single-blog-post-media mb-xs-20">
                        <div class="image">
                            <img src="{{ Voyager::image( $post->image ) }}" class="img-fluid" alt="">
                        </div>
                    </div>

                    <!--=======  End of Post media  =======-->

                    <!--=======  Post content  =======-->

                    <div class="post-content mb-40">
                        {!! $post->body !!}
                    </div>

                    <!--=======  End of Post content  =======-->

                    <!--=======  Tags area  =======-->

                {{--<div class="tag-area mb-40">--}}
                {{--<span>Tags: </span>--}}
                {{--<ul>--}}
                {{--<li><a href="#">Image</a>,</li>--}}
                {{--<li><a href="#">Furniture</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}

                <!--=======  End of Tags area  =======-->


                    <!--=======  Share post area  =======-->

                    <div class="social-share-buttons mb-40">
                        <h3>share this post</h3>
                        <ul>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                    <!--=====  End of Share post area  ======-->

                    <!--=======  related post  =======-->

                    <div class="related-post-container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="related-post-title mb-30">RELATED POSTS</h3>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($related_post as $related)

                                <div class="col-lg-4 col-md-4 mb-sm-20">
                                    <!--=======  single related post  =======-->

                                    <div class="single-related-post">
                                        <div class="image">
                                            <a href="{{route('blog.post',$related->slug)}}">
                                                <img src="{{ Voyager::image( $related->image ) }}" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h3 class="related-post-title">
                                                <a href="{{route('blog.post',$related->slug)}}">{{ $related->title }}</a>
                                                <span>{{ $related->created_at->format('F j, Y') }}</span>
                                            </h3>
                                        </div>
                                    </div>

                                    <!--=======  End of single related post  =======-->
                                </div>

                            @endforeach

                        </div>



                    </div>

                    <!--=======  End of related post  =======-->

                </div>

                <!--=======  End of blog post container  =======-->

                <!--=============================================
                =            Comment section         =
                =============================================-->

                <div class="comment-section mb-md-80 mb-sm-80">
                    <h3 class="comment-counter">COMMENTS</h3>

                    <!--=======  comment container  =======-->

                    @guest
                        <div class="comment-form-container">
                            <h3 class="comment-form-title">Please Log in to Comment</h3>
                        </div>
                    @else



                        <div class="comment-container mb-40">


                            @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])


                        </div>

                        <!--=======  End of comment container  =======-->

                        <!--=======  comment form container  =======-->


                        <div class="comment-form-container">
                            <h3 class="comment-form-title">LEAVE A COMMENT</h3>


                            <!--=======  comment form  =======-->

                            <div class="comment-form">
                                <form method="post" action="{{ route('comment.add') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Write here</label>
                                                <textarea name="comment_body" id="commentMessage"  required="required"></textarea>
                                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <button type="submit" class="pataku-btn" name="submit">post comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--=======  End of comment form  =======-->
                        </div>

                        <!--=======  End of comment form container  =======-->


                    @endguest
                </div>


                <!--=====  End of Comment section  ======-->

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