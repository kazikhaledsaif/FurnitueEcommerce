<!--=============================================
=            Footer         =
=============================================-->

<div class="footer-container pt-60 pb-60">
    <!--=======  footer navigation container  =======-->

    <div class="footer-navigation-container mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-20 mb-lg-0 mb-xl-0 mb-md-35 mb-sm-35">
                    <!--=======  single footer  =======-->

                    <div class="single-footer">
                        <!--=======  Single block  =======-->

                        <div class="single-block mb-35">
                            <h3 class="footer-title">Need Help?</h3>
                            <p>Call: +1 972-230-0511</p>
                        </div>

                        <!--=======  End of Single block  =======-->
                        <!--=======  Single block  =======-->

                        <div class="single-block mb-35">
                            <h3 class="footer-title">Products & Sales</h3>
                            <p>Call: +1 972-230-0511</p>
                        </div>

                        <!--=======  End of Single block  =======-->
                        <!--=======  Single block  =======-->



                        <!--=======  End of Single block  =======-->
                    </div>

                    <!--=======  End of single footer  =======-->

                </div>

                <div class="col-12 col-lg-2 col-md-6 col-sm-6 mb-20 mb-lg-0 mb-xl-0 mb-md-35 mb-sm-35">
                    <!--=======  single footer  =======-->

                    <div class="single-footer">
                        <h3 class="footer-title mb-20">Products</h3>
                        <ul>
                            <li><a href="/shop">New Products</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="my-account">My Account</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single footer  =======-->
                </div>

                <div class="col-12 col-lg-2 col-md-6 col-sm-6 mb-20 mb-xs-35 mb-lg-0 mb-xl-0">
                    <!--=======  single footer  =======-->

                    <div class="single-footer">
                        <h3 class="footer-title mb-20">Our Company</h3>
                        <ul>
                            <li><a href="/deliverypolicy">Delivery</a></li>
          <!--                  <li><a href="/legalnotice">Legal Notice</a></li>    -->
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                    </div>

                    <!--=======  End of single footer  =======-->
                </div>

                <div class="col-12 col-lg-4 col-md-6 col-sm-6">
                    <!--=======  single footer  =======-->

                    <div class="single-footer mb-35">
                        <h3 class="footer-title mb-20">Newsletter</h3>

                        <div class="newsletter-form mb-20">
                            <form action="{{ route('mail.subscribe') }}" class="mc-form subscribe-form" method="post">
                                {{csrf_field() }}
                                <input type="email" name="mail" placeholder="Your email address">
                                <button type="submit" value="submit"><i class="lnr lnr-envelope"></i></button>
                            </form>
                        </div>
                        <!-- mailchimp-alerts Start -->
                    {{-- <div class="mailchimp-alerts mb-20">
                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                    </div> --}}<!-- mailchimp-alerts end -->

                    </div>

                    <!--=======  End of single footer  =======-->

                    <!--=======  single footer  =======-->

                    <div class="single-footer">
                        <h3 class="footer-title mb-20">Address</h3>
                        <p>845 I-35E, DeSoto, TX-75115, USA     </p>
                        <p>+1 972-230-0511</p>
                    </div>

                    <!--=======  End of single footer  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of footer navigation container  =======-->
    <!--=======  footer social link container  =======-->

    <div class="footer-social-link-container pt-15 pb-15 mb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 col-md-7 mb-sm-15 text-left text-sm-center text-lg-left">
                    <!--=======  app download area  =======-->

                {{--<div class="app-download-area">--}}
                {{--<span class="title">Free App:</span>--}}
                {{--<a target="_blank" href="#" class="app-download-btn apple-store"><i class="fa fa-apple"></i> Apple Store</a>--}}
                {{--<a target="_blank" href="#" class="app-download-btn google-play"><i class="fa fa-android"></i> Google play</a>--}}
                {{--</div>--}}

                <!--=======  End of app download area  =======-->
                </div>
                <div class="col-12 col-lg-6 col-md-5 text-left text-sm-center text-md-right">
                    <div class="social-link">
                        <span class="title">Follow Us:</span>
                        <ul>
                            <li><a target="_blank" href="https://www.facebook.com/furniturevilletexas/"><i class="fa fa-facebook"></i></a></li>
                            <li><a target="_blank" href="//www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                            <li><a target="_blank" href="//www.rss.com"><i class="fa fa-rss"></i></a></li>
                            <li><a target="_blank" href="//plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                            <li><a target="_blank" href="//www.youtube.com"><i class="fa fa-youtube"></i></a></li>
                            <li><a target="_blank" href="//www.instagram.com"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of footer social link container  =======-->

    <!--=======  footer bottom navigation  =======-->

    <div class="footer-bottom-navigation text-center mb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  navigation-container  =======-->

                    <div class="navigation-container">
                        <ul>
                            <li><a href="/about">About Us</a> <span class="separator">|</span></li>
                            <li><a href="/blog">Blog</a> <span class="separator">|</span></li>
                            <li><a href="/my-account">My Account</a> <span class="separator">-</span></li>
                            <li><a href="/order-status">Order Status</a> <span class="separator">-</span></li>
                            <li><a href="/shipping">Shipping &amp; Returns</a> <span class="separator">-</span></li>
                            <li><a href="/privacypolicy">Privacy Policy</a> <span class="separator">-</span></li>
                            <li><a href="/termsandcondition">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>

                    <!--=======  End of navigation-container  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of footer bottom navigation  =======-->

    <!--=======  copyright section  =======-->

    <div class="copyright-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  Copyright text  =======-->

                    <p class="copyright-text">Copyright @ 2019 <a href="/">FurnitureVilleTexas</a>. All Rights Reserved | Designed & Managed by <a href="https://www.radyanit.com/">Radyan-IT Inc.</a> Texas, USA</p>


                    <!--=======  End of Copyright text  =======-->
                </div>
            </div>
        </div>
    </div>

    <!--=======  End of copyright section  =======-->
</div>

<!--=====  End of Footer  ======-->