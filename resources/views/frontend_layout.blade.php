<?php
    $settings = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ env('APP_NAME') }}</title>
        {{-- <meta name="description" content="{{ $settings[4]->value ?? '' }}">
        <meta name="author" content="{{ $settings[5]->value ?? '' }}">
        <meta name="keyword" content="{{ $settings[6]->value ?? '' }}">
        <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>


        {{-- message css --}}

        <link rel="stylesheet" href="{{ ('Frontend/assets/message/css/style.css') }}">


        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="{{ asset('Frontend/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('Frontend/favicon.ico') }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/normalize.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/fontello.css')}}">
        <link href="{{ asset('Frontend/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css')}}" rel="stylesheet">
        <link href="{{ asset('Frontend/assets/fonts/icon-7-stroke/css/helper.css')}}" rel="stylesheet">
        <link href="{{ asset('Frontend/assets/css/animate.css')}}" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap-select.min.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/icheck.min_all.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/price-range.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.transitions.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/wizard.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/lightslider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('Frontend/assets/css/responsive.css')}}">



        {{-- toastr css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


    {{-- ajax --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>
    <body>

        <?php
        function currencySysbol() {
            return 'Rs';
        }
        ?>




        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset($settings[3]->value ?? 'Frontend/assets/img/logo.png') }}" style="width: 180px" alt="">
                        {{-- <h3>{{ env('APP_NAME') }}</h3> --}}
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right" style="margin-top:12px">
                        @if(!empty(Auth::user()))
                            <a href="{{ url('sell-item') }}" class="navbar-btn nav-button wow fadeInRight">Sell an Item</a>
                            <a class="navbar-btn nav-button wow bounceInRight login" href="{{ url('logout') }}">Logout</a>
                        @else
                            <a class="navbar-btn nav-button wow bounceInRight login" href="{{ url('login') }}">Login</a>
                            <a class="navbar-btn nav-button wow bounceInRight" href="{{ url('register') }}">Register</a>
                        @endif
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">
                        <li class="dropdown ymm-sw ">
                            <a href="{{ url('/') }}">Home</a>

                        </li>

                        <li class="wow"><a class="" href="{{ url('products') }}">Products</a></li>

                        <li class="dropdown yamm-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">My Account <b class="caret"></b></a>
                            <ul class="dropdown-menu"  style="border: 2px solid">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5>Selling</h5>
                                                <ul>
                                                    <li>
                                                        <a href="#">Sell an Item</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('my-items') }}">My Items</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('my-items?type=sold') }}">Sold Items</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('my-items?type=unsold') }}">Unsold Items</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Payments</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                                <h5>Buyer</h5>
                                                <ul>
                                                    <li><a href="{{ url('bids') }}">Bids</a>  </li>
                                                    <li><a href="{{ url('recently-viewed') }}">Rcently Viewed</a>  </li>
                                                    <li><a href="{{ url('saved-items') }}">Saved</a>  </li>
                                                    <li><a href="{{ url('purchase-history') }}">Purchase History</a>  </li>
                                                    <li><a href="#">My Returns</a> </li>
                                                    <li><a href="#">Rating & Reviews</a> </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-4">
                                                <h5>Account</h5>
                                                <ul>
                                                    <li><a href="{{ url('messages') }}">Messages</a> </li>
                                                    <li><a href="{{ url('profile') }}">Profile</a> </li>
                                                    <li><a href="{{ url('setting') }}">Setting</a> </li>
                                                    <li><a href="{{ url('membership') }}">Membership</a> </li>
                                                    <li><a href="{{ url('change-password') }}">Change Password</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>

                        {{-- <li class="wow fadeInDown"><a class="" href="{{ url('plans') }}">Plans</a></li> --}}

                        {{-- <li class="wow fadeInDown"><a class="" href="{{ url('about-us') }}">About us</a></li> --}}
                        @if(!empty(Auth::user()))
                            <li><a  href="{{ url('cart') }}">Cart</a></li>
                        @endif


                        {{-- <li class="wow fadeInDown" data-wow-delay="0.5s"><a href="#">About us</a></li> --}}
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        @yield('content')


        <!-- Footer area-->
        <div class="footer-area">

            <div class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-4 col-lg-4 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About us </h4>
                                <div class="footer-title-line"></div>

                                {{-- <h3>{{ env('APP_NAME') }}</h3> --}}
                                {{-- <img src="{{ asset('Frontend/assets/img/logo.png') }}" style="width: 180px" alt=""> --}}
                                <img src="{{ asset($settings[3]->value ?? 'Frontend/assets/img/logo.png') }}" alt="" class="wow pulse" data-wow-delay="1s">
                                <p>{{ $settings[8]->value ?? '' }}</p>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> {{ $settings[0]->value ?? '' }}</li>
                                    <li><i class="pe-7s-mail strong"> </i> {{ $settings[2]->value ?? '' }}</li>
                                    <li><i class="pe-7s-call strong"> </i> {{ $settings[1]->value ?? '' }} </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Quick links </h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-menu">
                                    <li><a href="{{ url('/') }}">Home</a>  </li>
                                    <li><a href="{{ url('about-us') }}">About us</a>  </li>
                                    <li><a href="{{ url('create-ad?type=free') }}">Submit Free Ad </a></li>
                                    {{-- <li><a href="#">fqa</a>  </li> --}}
                                    <li><a href="{{ url('terms') }}">Terms</a> </li>
                                    <li><a href="{{ url('privacy') }}">Privacy </a> </li>
                                </ul>
                            </div>
                        </div>
                                {{-- <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                                    <div class="single-footer">
                                        <h4>Last News</h4>
                                        <div class="footer-title-line"></div>
                                        <ul class="footer-blog">
                                            <li>
                                                <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                                    <a href="single.html">
                                                        <img src="assets/img/demo/small-proerty-2.jpg">
                                                    </a>
                                                    <span class="blg-date">12-12-2016</span>

                                                </div>
                                                <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                                    <h6> <a href="single.html">Add news functions </a></h6>
                                                    <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                                    <a href="single.html">
                                                        <img src="assets/img/demo/small-proerty-2.jpg">
                                                    </a>
                                                    <span class="blg-date">12-12-2016</span>

                                                </div>
                                                <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                                    <h6> <a href="single.html">Add news functions </a></h6>
                                                    <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                                    <a href="single.html">
                                                        <img src="assets/img/demo/small-proerty-2.jpg">
                                                    </a>
                                                    <span class="blg-date">12-12-2016</span>

                                                </div>
                                                <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                                    <h6> <a href="single.html">Add news functions </a></h6>
                                                    <p style="line-height: 17px; padding: 8px 2px;">Lorem ipsum dolor sit amet, nulla ...</p>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                </div> --}}
                        <div class="col-md-4 col-lg-4 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer news-letter">
                                <h4>Stay in touch</h4>
                                <div class="footer-title-line"></div>
                                <p>Keep your finger on the pulse of all things BudgetRoom by subscribing to our newsletter.</p>

                                <form>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="E-mail ... ">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary subscribe" type="button"><i class="pe-7s-paper-plane pe-2x"></i></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </form>

                                <div class="social pull-right">
                                    <ul>
                                        <li><a class="wow fadeInUp" href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="wow fadeInUp" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="wow fadeInUp" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a class="wow fadeInUp" href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a class="wow fadeInUp" href="#"><i class="fa fa-dribbble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
          var wa_btnSetting = {"btnColor":"#29db3e","ctaText":"","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"923081312527","welcomeMessage":"Aslam o Alaikum","zIndex":999999,"btnColorScheme":"light"};
          window.onload = () => {
            _waEmbed(wa_btnSetting);
          };
        </script>

{{-- <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
<script>
  var wa_btnSetting = {"btnColor":"#ec18e5","ctaText":"","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"923081312527","welcomeMessage":"Aslam o Alaikum","zIndex":999999,"btnColorScheme":"light"};
  var wa_widgetSetting = {"title":"BudgetRoom","subTitle":"Typically replies in a day","headerBackgroundColor":"#FBFFC8","headerColorScheme":"dark","greetingText":"Hi there! \nHow can I help you?","ctaText":"Start Chat","btnColor":"#1A1A1A","cornerRadius":40,"welcomeMessage":"Hello","btnColorScheme":"light","brandImage":"https://budgetroom.deliverers.uk/public/Frontend/assets/img/logo.png","darkHeaderColorScheme":{"title":"#333333","subTitle":"#4F4F4F"}};
  window.onload = () => {
    _waEmbed(wa_btnSetting, wa_widgetSetting);
  };
</script> --}}




        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{  asset('Frontend/assets/js/custom.js') }}"></script>

        <script src="{{ asset('Frontend/assets/js/modernizr-2.6.2.min.js') }}"></script>

        <script src="{{ asset('Frontend/assets/js/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ asset('Frontend/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/bootstrap-hover-dropdown.js') }}"></script>

        <script src="{{ asset('Frontend/assets/js/easypiechart.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/jquery.easypiechart.min.js') }}"></script>

        <script src="{{ asset('Frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/wow.js') }}"></script>

        <script src="{{ asset('Frontend/assets/js/icheck.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/price-range.js') }}"></script>

        <script src="{{ asset('Frontend/assets/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
        <script src="{{ asset('Frontend/assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('Frontend/assets/js/wizard.js') }}"></script>

        <script type="text/javascript" src="{{ ('frontend/assets/js/lightslider.min.js') }}"></script>
        <script src="{{ asset('Frontend/assets/js/main.js') }}"></script>

        {{-- table js --}}

        {{-- <script src="{{asset ('Frontend/assets/table/js/jquery.min.js') }}"></script>
        <script src="{{asset ('Frontend/assets/table/js/popper.js') }}"></script>
        <script src="{{asset ('Frontend/assets/table/js/bootstrap.min.js') }}"></script>
        <script src="{{asset ('Frontend/assets/table/js/main.js') }}"></script> --}}

        {{-- message js --}}

        <script  src="{{ ('Frontend/assets/message/js/script.js') }}"></script>



        <script>
            $(document).ready(function () {

                $('#image-gallery').lightSlider({
                    gallery: true,
                    item: 1,
                    thumbItem: 9,
                    slideMargin: 0,
                    speed: 500,
                    auto: true,
                    loop: true,
                    onSliderLoad: function () {
                        $('#image-gallery').removeClass('cS-hidden');
                    }
                });
            });
        </script>


    </body>
</html>
