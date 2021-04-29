<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Citytours - Premium site template for city tours agencies, transfers and tickets.">
    <meta name="author" content="Ansonika">
    <title>@yield('title')</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{URL::asset('main/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{URL::asset('main/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{URL::asset('main/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{URL::asset('main/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{URL::asset('main/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- COMMON CSS -->
	<link href="{{URL::asset('main/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('main/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('main/css/style-rtl.css')}}" rel="stylesheet">
	<link href="{{URL::asset('main/css/vendors.css')}}" rel="stylesheet">

	<!-- CUSTOM CSS -->
    <link href="{{URL::asset('main/css/custom.css')}}" rel="stylesheet">
    <!-- JQuery Library -->
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> --}}

    @yield('token')


    {{--  --}}

</head>

<body class="rtl">

    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
    <!-- End Preload -->





        <div class="layer"></div>
        <!-- Mobile menu overlay mask -->

        <!-- Header Plain:  add the id plain to header and change logo.png to logo_sticky.png ======================= -->
        <header id="plain">
            <div id="top_line">
                <div class="container">
                    <div class="row">
                        <div class="col-6"><i class="icon-phone"></i><strong>798406304 00962 </strong></div>
                        <div class="col-6">
                            <ul id="top_links">
                            @guest
                                    <li>
                                         <a href="{{ route('login') }}" >الدخول</a>
                                    </li>
                                @if (Route::has('register'))
                                    <li>
                                         <a href="{{ route('register') }}">التسجيل</a>
                                    </li>


                                @endif


                            @else


                                <li class="nav-item dropdown">
                                    <a  id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{-- id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre --}}
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="/profile">
                                         الملف الشخصي
                                     </a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                    </div>
                                </li>
                            @endguest

                                <li><a href="" >انستجرام</a></li>
                                <li><a href="">فسيبوك</a></li>
                            </ul>
                        </div>
                    </div><!-- End row -->
                </div><!-- End container-->
            </div><!-- End top line-->

            <div class="container">
                <div class="row">
                    <div class="col-3">
                        {{-- <div id="logo_home">
                            <h1><a href="index.html" title="City tours travel template">أكزيمتي</a></h1>
                        </div> --}}
                        <div id="logo_home">
                            <a href="/community" title="City tours travel template">
                                <img src="{{URL::asset('fedash/assets/media/image/five.png')}}" alt="logo" height='95' width="250">

                            </a>
                        </div>
                    </div>
                    <nav class="col-9">




                                        <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                        <div class="main-menu">
                            <div id="header_menu">
                                <img src="img/logo_sticky.png" width="160" height="34" alt="City tours">
                            </div>
                            <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                           <ul>

                                {{-- <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Living with Eczema <i class="icon-down-open-mini"></i></a>
                                    <ul>
                                        <li><a href="all_tours_list.html">All tours list</a></li>

                                            <ul>
                                                <li><a href="single_tour_fixed_sidebar.html">Single tour fixed sidebar</a></li>

                                            </ul>
                                        </li>
                                        <li><a href="single_tour_working_booking.php">Single tour working booking</a></li>

                                    </ul>
                                </li> --}}
                                 <li class="submenu">
                                    <a href="/community" class="show-submenu">المجتمع </a><ul>
                                        {{-- <li><a href="/community">المجتمع</a></li> --}}
                                        {{-- <li><a href="">قصص التشافي</a></li> --}}

                                    </ul>
                                </li>

                                <li class="submenu">
                                    <a href="/start" class="show-submenu">ابدأ مناقشتك من هنا</a>
                                    {{-- <ul>
                                        <li><a href="index.html">Owl Carousel Slider</a></li> javascript:void(0);

                                        </li>
                                        <li><a href="index_12.html">Layer slider</a></li>

                                    </ul> --}}
                                </li>
                                {{-- <li class="submenu">
                                    <a href="/about" class="show-submenu">من نحن</a>

                                </li> --}}

                            </ul>
                        </div><!-- End main-menu -->
                         <ul id="top_tools">
                            <li><h6>اسأل مجرب واستفيد </h6>

                                {{-- <a href="javascript:void(0);" class="search-overlay-menu-btn"><i class="icon_search"></i></a> --}}
                            </li>

                        </ul>

                    </nav>
                </div>
            </div><!-- container -->
        </header><!-- End Header -->
          @yield('slider')


        <main>
            {{-- <div class="container margin_60"> --}}

            {{-- <div class="main_title">
                <h2>Paris <span>Top</span> Tours</h2>
                <p>Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.</p>
            </div> --}}



        {{-- </div><!-- End container --> --}}

        <div class="container margin_60">

                <div class="row">

                </div>
                <!-- End row -->

            </div>


                          @yield('main')

                </div>
                <!-- End container -->
        </div>
            <!-- End white_bg -->


            <div class="container margin_60">

                <div class="row">

                </div>
                <!-- End row -->

            </div>
            {{-- <section class="promo_full">
                <div class="promo_full_wp magnific">
                    <div>
                        <h3>BELONG ANYWHERE</h3>
                        <p>
                            Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.
                        </p>
                        <a href="https://www.youtube.com/watch?v=Zz5cu72Gv5Y" class="video"><i class="icon-play-circled2-1"></i></a>
                    </div>
                </div>
            </section> --}}
            <!-- End section -->

            {{-- <div class="container margin_60">

                <div class="row">

                </div>
                <!-- End row -->

            </div> --}}
            <!-- End container -->
        </main>
        <!-- End main -->
        <!--Footer-->
        <footer class="revealed">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-md-4">
                        <h3>Need help?</h3>
                        <a href="tel://004542344599" id="phone">+45 423 445 99</a>
                        <a href="mailto:help@citytours.com" id="email_footer">help@citytours.com</a>
                    </div>
                    <div class="col-md-3">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                             <li><a href="#">Terms and condition</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3>Discover</h3>
                        <ul>
                            <li><a href="#">Community blog</a></li>
                            <li><a href="#">Tour guide</a></li>
                            <li><a href="#">Wishlist</a></li>
                             <li><a href="#">Gallery</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h3>Settings</h3>
                        <div class="styled-select">
                            <select name="lang" id="lang">
                                <option value="English" selected>English</option>
                                <option value="French">French</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Russian">Russian</option>
                            </select>
                        </div>
                        <div class="styled-select">
                            <select name="currency" id="currency">
                                <option value="USD" selected>USD</option>
                                <option value="EUR">EUR</option>
                                <option value="GBP">GBP</option>
                                <option value="RUB">RUB</option>
                            </select>
                        </div>
                    </div>
                </div><!-- End row --> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div id="social_footer">
                            {{-- <ul>
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-google"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                                <li><a href="#"><i class="icon-pinterest"></i></a></li>
                                <li><a href="#"><i class="icon-vimeo"></i></a></li>
                                <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                            </ul> --}}
                            <p><strong> </strong>أكزيمتي 2020 ©</p>
                        </div>
                    </div>
                </div><!-- End row -->
            </div><!-- End container -->
        </footer><!-- End footer -->

        <div id="toTop"></div><!-- Back to top button -->

        <!-- Search Menu -->
        {{-- <div class="search-overlay-menu">
            <span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
            <form role="search" id="searchform" method="get">
                <input value="" name="q" type="search" placeholder="Search..." />
                <button type="submit"><i class="icon_set_1_icon-78"></i>
                </button>
            </form>
        </div><!-- End Search Menu --> --}}

        <!-- Sign In Popup -->
        <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
            <div class="small-dialog-header">
                <h3>Sign In</h3>
            </div>
            <form>
                <div class="sign-in-wrapper">
                    <a href="#0" class="social_bt facebook">Login with Facebook</a>
                    <a href="#0" class="social_bt google">Login with Google</a>
                    <div class="divider"><span>Or</span></div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                        <i class="icon_lock_alt"></i>
                    </div>
                    <div class="clearfix add_bottom_15">
                        <div class="checkboxes float-left">
                            <input id="remember-me" type="checkbox" name="check">
                            <label for="remember-me">Remember Me</label>
                        </div>
                        <div class="float-right"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
                    </div>
                    <div class="text-center"><input type="submit" value="Log In" class="btn_login"></div>
                    <div class="text-center">
                        Don’t have an account? <a href="javascript:void(0);">Sign up</a>
                    </div>
                    <div id="forgot_pw">
                        <div class="form-group">
                            <label>Please confirm login email below</label>
                            <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                            <i class="icon_mail_alt"></i>
                        </div>
                        <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                        <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                    </div>
                </div>
            </form>
            <!--form -->
        </div>
        <!-- /Sign In Popup -->





    <!-- Common scripts -->
    <script src="{{URL::asset('main/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{URL::asset('main/js/common_scripts_min_rtl.js')}}"></script>
    <script src="{{URL::asset('main/js/functions_rtl.js')}}"></script>

	{{-- <!-- NOTIFY BUBBLES  -->
	<script src="{{URL::asset('main/js/notify_func.js')}}"></script> --}}

</body>

</html>
