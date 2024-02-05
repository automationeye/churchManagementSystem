<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->




<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon">
    <!--Title-->
    <title>Newbreed chapel</title> <!-- CSS -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="web/css/bootstrap.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="web/css/font-awesome.min.css"> <!-- Simple Line Icons -->
    <link rel="stylesheet" href="web/css/simple-line-icons.min.css"> <!-- Themify Icons -->
    <link rel="stylesheet" href="web/css/themify-icons.css"> <!-- Owl Slider -->
    <link rel="stylesheet" href="web/css/themify-icons.css"> <!-- Owl Slider -->
    <link rel="stylesheet" href="web/css/owl.carousel.min.css">
    <link rel="stylesheet" href="web/css/owl.theme.default.min.css"> <!-- Magnific Popup -->
    <link rel="stylesheet" href="web/css/magnific-popup.css"> <!-- Revolution Slider -->
    <link rel="stylesheet" type="text/css" href="web/rs-plugin/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="web/rs-plugin/css/settings.css">
    <link rel="stylesheet" type="text/css" href="web/rs-plugin/css/main-slider/rs6.css"> <!-- Color Panel -->
    <link href="web/css/color_panel.css" rel="stylesheet" type="text/css" /> <!-- Color Panel -->
    <link href="web/css/color_panel.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="web/css/color-schemes/red.css" id="changeable-colors"> <!-- Main Style -->
    <link rel="stylesheet" href="web/css/style.css" class="main-style">
    <style>
        #rev_slider_6_1_wrapper .tp-loader.spinner1 {
            background-color: #FFFFFF !important;
        }
    </style>
    <style>
        .rs-layer.Concept-Content a,
        .rs-layer.Concept-Content a:visited {
            color: #fff !important;
            border-bottom: 1px solid #fff !important;
            font-weight: 700 !important
        }

        .rs-layer.Concept-Content a:hover {
            border-bottom: 1px solid transparent !important
        }

        .rs-layer.Concept-Content-Dark a,
        .rs-layer.Concept-Content-Dark a:visited {
            color: #000 !important;
            border-bottom: 1px solid #000 !important;
            font-weight: 700 !important
        }

        .rs-layer.Concept-Content-Dark a:hover {
            border-bottom: 1px solid transparent !important
        }

        @media only screen and (max-width:575px) {
            rs-layer.res-slide-btn {
                padding: 7px 16px !important;
                font-size: 13px !important
            }
        }

        #rev_slider_1_1_wrapper .zeus.tparrows {
            cursor: pointer;
            min-width: 60px;
            min-height: 60px;
            position: absolute;
            display: block;
            z-index: 1000;
            border-radius: 50%;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.38)
        }

        #rev_slider_1_1_wrapper .zeus.tparrows:before {
            font-family: 'revicons';
            font-size: 17px;
            color: #ffffff;
            display: block;
            line-height: 60px;
            text-align: center;
            z-index: 2;
            position: relative
        }

        #rev_slider_1_1_wrapper .zeus.tparrows.tp-leftarrow:before {
            content: '\e824'
        }

        #rev_slider_1_1_wrapper .zeus.tparrows.tp-rightarrow:before {
            content: '\e825'
        }

        #rev_slider_1_1_wrapper .zeus .tp-title-wrap {
            background: rgba(0, 0, 0, 0.5);
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            position: absolute;
            opacity: 0;
            transform: scale(0);
            -webkit-transform: scale(0);
            transition: all 0.3s;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            border-radius: 50%
        }

        #rev_slider_1_1_wrapper .zeus .tp-arr-imgholder {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0px;
            left: 0px;
            background-position: center center;
            background-size: cover;
            border-radius: 50%;
            transform: translatex(-100%);
            -webkit-transform: translatex(-100%);
            transition: all 0.3s;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s
        }

        #rev_slider_1_1_wrapper .zeus.tp-rightarrow .tp-arr-imgholder {
            transform: translatex(100%);
            -webkit-transform: translatex(100%)
        }

        #rev_slider_1_1_wrapper .zeus.tparrows.rs-touchhover .tp-arr-imgholder {
            transform: translatex(0);
            -webkit-transform: translatex(0);
            opacity: 1
        }

        #rev_slider_1_1_wrapper .zeus.tparrows.rs-touchhover .tp-title-wrap {
            transform: scale(1);
            -webkit-transform: scale(1);
            opacity: 1
        }

        #rev_slider_1_1[data-slideactive="rs-1"] .zeus.tparrows {
            min-width: 60px !important;
            min-height: 60px !important;
            background: rgba(0, 0, 0, 0.38) !important
        }

        #rev_slider_1_1[data-slideactive="rs-1"] .zeus.tparrows:before {
            line-height: 60px !important;
            font-size: 17px !important
        }

        #rev_slider_1_1[data-slideactive="rs-2"] .zeus.tparrows {
            min-width: 60px !important;
            min-height: 60px !important;
            background: rgba(0, 0, 0, 0.38) !important
        }

        #rev_slider_1_1[data-slideactive="rs-2"] .zeus.tparrows:before {
            line-height: 60px !important;
            color: #ffffff !important;
            font-size: 17px !important
        }

        #rev_slider_1_1[data-slideactive="rs-3"] .zeus.tparrows {
            min-width: 60px !important;
            min-height: 60px !important;
            background: rgba(0, 0, 0, 0.38) !important
        }

        #rev_slider_1_1[data-slideactive="rs-3"] .zeus.tparrows:before {
            line-height: 60px !important;
            font-size: 17px !important
        }
    </style>
</head>
<!--Body Start-->

<body data-res-from="1025">
    <!--Page Loader-->
    <div class="page-loader"></div>
    <!--Zmm Wrapper-->
    <div class="zmm-wrapper"> <a href="index.html#" class="zmm-close close"></a>
        <div class="zmm-inner bg-white typo-dark">

            <div class="zmm-main-nav"> </div>
            <div class="search-form-wrapper margin-top-30">
                <form class="search-form" role="search">
                    <div class="input-group add-on"> <input class="form-control" placeholder="Search for.." name="srch-term" type="text">
                        <div class="input-group-btn"> <button class="btn btn-default search-btn" type="submit"><i class="ti-arrow-right"></i></button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- Overlay Search -->
    <div class="overlay-search text-center hide"> <a href="index.html#" class="close close-light overlay-search-close"></a>
        <div class="search-form-wrapper">
            <form class="navbar-form search-form sliding-search-form" role="search">
                <div class="input-group add-on"> <input class="form-control" placeholder="Search for.." name="srch-term" type="text">
                    <div class="input-group-btn"> <button class="btn btn-default search-btn" type="submit"><i class="ti-arrow-right"></i></button> </div>
                </div>
            </form>
        </div>
    </div> <!-- Main wrapper-->
    <div class="page-wrapper">
        <div class="page-wrapper-inner">
            <header>
                <!--Mobile Header-->
                <div class="mobile-header bg-white typo-dark">
                    <div class="mobile-header-inner">
                        <div class="sticky-outer">
                            <div class="sticky-head">
                                <div class="basic-container clearfix">
                                    <ul class="nav mobile-header-items pull-left">
                                        <li class="nav-item"><a href="index.html#" class="zmm-toggle img-before"><i class="ti-menu"></i></a></li>
                                    </ul>
                                    <ul class="nav mobile-header-items pull-center">
                                        <li> <a href="index.html" class="img-before"></a> </li>
                                    </ul>
                                    <ul class="nav mobile-header-items pull-right">
                                        <li class="nav-item"><a href="index.html#" class="img-before overlay-search-switch"><i class="icon-magnifier icons"></i></a></li>
                                    </ul>
                                </div> <!-- .basic-container -->
                            </div> <!-- .sticky-head -->
                        </div> <!-- .sticky-outer -->
                    </div> <!-- .mobile-header-inner -->
                </div> <!-- .mobile-header -->
                <!--Header-->
                <div class="header-inner header-1 header-absolute">
                    <!--Topbar-->
                    <div class="topbar relative">
                        <div class="basic-container clearfix">
                            <ul class="nav topbar-items pull-left">
                                <li class="nav-item">
                                    <ul class="nav header-info">
                                        <li>
                                            <div class="header-address typo-white"><span class="ti-location-pin"></span>
                                                kiambu road, KENYA</div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav topbar-items pull-right">
                                <li class="nav-item">
                                    <div class="social-icons typo-white">
                                        <a href="https://www.facebook.com/NewBreedCityChapel" class="social-fb">
                                            <span class="ti-facebook"></span>
                                        </a>
                                        <a href="https://twitter.com/newbreedcity" class="social-twitter">
                                            <span class="ti-twitter"></span>
                                        </a>

                                        <a href="https://www.instagram.com/newbreedcity_chapel/" class="social-instagram">
                                            <span class="ti-instagram"></span>
                                        </a>



                                        <a href="https://www.youtube.com/channel/UCKCKWbNti31vgVbl0-LbvJw" class="social-youtube">
                                            <span class="ti-youtube"></span>
                                        </a>

                                    </div>
                                </li>
                                <li><a href="index.html#" class="full-view-switch text-center"><i class="ti-search typo-white"></i></a></li>
                            </ul>
                        </div>
                        <!--Search-->
                        <div class="full-view-wrapper hide"> <a href="index.html#" class="close full-view-close"></a>
                            <form class="navbar-form search-form" role="search">
                                <div class="input-group"> <input class="form-control" placeholder="Search hit enter.." name="srch-term" type="text"> </div>
                            </form>
                        </div>
                    </div>
                    <!--Topbar-->
                    <!--Sticky part-->
                    <div class="sticky-outer">
                        <div class="sticky-head header-sticky">
                            <!--Navbar-->
                            <nav class="navbar nav-shadow">
                                <div class="basic-container clearfix">
                                    <div class="">
                                        <!--Overlay Menu Switch-->
                                        <ul class="nav navbar-items pull-left">
                                            <li class="list-item"> <a href="{{ route('memberdash') }}" class="logo-general"><img src="web/images/newbr.jpg" class="img-fluid changeable-light" width="166" height="50" alt="Logo" /></a> <a href="/" class="logo-sticky"><img src="web/images/newbreed.png" class="img-fluid changeable-dark" width="166" height="100" alt="Logo" /></a> </li>
                                        </ul> <!-- Menu -->
                                        <ul class="nav navbar-items pull-right">
                                            <!--List Item-->
                                            <li class="list-item">
                                                <ul class="nav navbar-main menu-white">









                                                    <li class="nav-item">
                                                        <a href="{{ route('memberdash') }}" class="nav-link">Dashboard</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="" class="nav-link">Teams</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="{{ url('/channels') }}" class="nav-link">Channels</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a href="{{ url('contributions') }}" class="nav-link">Contributions</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link " href="{{ url('/reports') }}" id="submenuDropdown">
                                                            Contact support
                                                        </a>
                                                    </li>
                                                    <li class="nav-item dropdown">
                                                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fas fa-user-circle"></i> </a>
                                                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                                            <li><a href="#" class="dropdown-item">View profile </a></li>
                                                            <li><a href="#" class="dropdown-item">Change password</a></li>

                                                            <li class="dropdown-divider"></li>

                                                            <!-- Level two dropdown-->
                                                            <li class="dropdown-submenu dropdown-hover">
                                                                <a id="dropdownSubMenu2" href="/logout" class="dropdown-item ">Logout</a>

                                                            </li>
                                                            <!-- End Level two -->
                                                        </ul>
                                                    </li>






                                                </ul>
                                            </li>
                                            <!--List Item End-->
                                            <!--List Item-->
                                            <li class="list-item">
                                                <div class="header-navbar-text-1"><a href="/member/login" class="h-donate-btn">LOGOUT</a></div>
                                            </li>
                                            <!--List Item End-->
                                        </ul> <!-- Menu -->
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <!--sticky-head-->
                    </div>
                    <!--sticky-outer-->
                </div>
            </header> <!-- header -->
            <!-- Revolution Slider Section -->
            <br><br><br><br>
            @yield('content')
        </div> <!-- .page-wrapper-inner -->
    </div>
    <!--page-wrapper-->
    <!-- Footer -->
    <footer id="footer" class="footer footer-1 footer-bg-img" data-bg="web/rs-plugin/assets/b.jpg">
        <!--Footer Widgets Columns Posibilities 4-->
        <div class="footer-widgets">
            <div class="footer-middle-wrap footer-overlay-dark">
                <div class="color-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 widget text-widget">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title typo-white">About New Breed City Chapel</h3>
                            </div> <!-- Text -->
                            <div class="widget-text margin-bottom-30">
                                <p>New Breed City Chapel</p>
                            </div>
                            <div class="social-icons">
                                <a href="https://www.facebook.com/NewBreedCityChapel/" class="social-fb">
                                    <span class="ti-facebook"></span>
                                </a>

                                <a href="https://twitter.com/newbreedcity" class="social-twitter">
                                    <span class="ti-twitter"></span>
                                </a>
                                <a href="https://www.instagram.com/newbreedcity_chapel/" class="social-instagram">
                                    <span class="ti-instagram"></span>
                                </a>

                                <a href="https://www.youtube.com/channel/UCKCKWbNti31vgVbl0-LbvJw" class="social-youtube">
                                    <span class="ti-youtube"></span>
                                </a>
                            </div>
                        </div> <!-- Col -->
                        <div class="col-lg-3 widget text-widget">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title typo-white">Quick Links</h3>
                            </div> <!-- Text -->
                            <div class="menu-quick-links">
                                <ul class="menu">
                                    <li class="menu-item"><a href="/about">Who We Are?</a></li>
                                    <li class="menu-item"><a href="index.html#">Support and FAQ’s</a></li>
                                    <li class="menu-item"><a href="index.html#">Partnerships</a></li>

                                    <li class="menu-item"><a href="index.html#">Join Us</a></li>
                                </ul>
                            </div>
                        </div> <!-- Col -->
                        <div class="col-lg-3 widget recent-posts">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title typo-white">Latest Sermons</h3>
                            </div>
                            <nav>
                                <ul class="footer-list-posts">
                                    <!-- List Items -->
                                    <li>

                                        <div class="side-item-text"><a href="blog-single.html">OUR PROPHETIC COVENANT ANOINTING SERVICE WITH BISHOP ERICK MWANGI</a>
                                            <span class="post-date d-block">JAN 7, 2024</span>
                                        </div>
                                    </li>
                                    <li>

                                        <div class="side-item-text"><a href="blog-single.html"> OUR NIGHT OF DOMINION CROSSOVER KESHA With BISHOP ERICK MWANGI AND PROPHET NANA YAW OBENG</a>
                                            <span class="post-date d-block">JAN 1, 2024</span>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div> <!-- Col -->
                        <div class="col-lg-3 widget contact-info-widget">
                            <div class="widget-title">
                                <!-- Title -->
                                <h3 class="title typo-white">Newsletter</h3>
                            </div>
                            <p>Sign up for our weekly newsletter to stay updated on all news and events at New Breed City Chapel.
                                Email updates on new product Announcements, Gift Ideas, Special Promotions and More.</p>
                            <div class="mailchimp-widget-wrap">
                                <!-- subscribe form -->
                                <form id="subscribe-form-1" class="subscribe-form" action=" ">
                                    <div class="input-group add-on"> <input type="text" class="form-control" name="mcemail" autocomplete="off" id="mcemail-1" placeholder="Email Address">
                                        <div class="input-group-btn"> <button class="btn btn-default subscribe-btn" type="submit">Sign Up</button> </div>
                                    </div>
                                    <p class="subscribe-status-msg hide"></p>
                                </form>
                            </div>
                        </div> <!-- Col -->
                    </div>
                </div>
            </div>
        </div>
        <!--Footer Copyright Columns Posibilities 4-->
        <div class="footer-copyright">
            <div class="footer-bottom-wrap pad-tb-20 typo-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="footer-bottom-items pull-left">
                                <li class="nav-item">
                                    <div class="nav-item-inner"> Copyrights © <script>
                                            document.write(new Date().getFullYear())
                                        </script> <a href="index.html"> </a>. Designed by <a href="http://automationeye.com">Automation Eye Limited</a> </div>
                                </li>
                            </ul>
                            <ul class="footer-bottom-items footer-menu pull-right">
                                <li class="nav-item"> <a href="index.html#">Privacy</a> </li>
                                <li class="nav-item"> <a href="index.html#">Sermons</a> </li>
                                <li class="nav-item"> <a href="/contact">Contact Us</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> <!-- Footer -->

    <!-- jQuery Lib -->
    <script src="web/js/jquery.min.js"></script> <!-- Bootstrap Js -->
    <script src="web/js/bootstrap.bundle.min.js"></script> <!-- Easing Js -->
    <script src="web/js/jquery.easing.min.js"></script> <!-- Carousel Js Code -->
    <script src="web/js/owl.carousel.min.js"></script> <!-- Paroller Js -->
    <script src="web/js/jquery.paroller.min.js"></script> <!-- Isotope Js -->
    <script src="web/js/isotope.pkgd.min.js"></script> <!-- Magnific Popup Js -->
    <script src="web/js/jquery.magnific-popup.min.js"></script> <!-- Validator Js -->
    <script src="web/js/validator.min.js"></script> <!-- Smart Resize Js -->
    <script src="web/js/smartresize.min.js"></script> <!-- Appear Js -->
    <script src="web/js/jquery.appear.min.js"></script> <!-- Theme Custom Js -->
    <script src="web/js/custom.js"></script> <!-- REVOLUTION JS FILES -->
    <script src="web/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="web/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="web/rs-plugin/js/main-slider/rbtools.min.js"></script>
    <script src="web/rs-plugin/js/main-slider/rs6.min.js"></script>
    <script src="web/rs-plugin/js/main-slider/home-1.js"></script> <!-- Color -->
    <script src="web/js/color-panel.js"></script>
</body><!-- Body End -->
<!-- Body End -->

</html>