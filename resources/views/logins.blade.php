<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv=" X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Logins</title>
    <link rel="stylesheet" href="web/ljs/style.css">


    <!-- Favicon -->
    <link href="images/favicon.png" rel="icon">







</head>

<body>
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
                                    <li class="list-item"> <a href="/" class="logo-general"><img src="web/images/newbreed.png" class="img-fluid changeable-light" width="166" height="50" alt="Logo" /></a> <a href="/" class="logo-sticky"><img src="web/images/newbreed.png" class="img-fluid changeable-dark" width="166" height="100" alt="Logo" /></a> </li>
                                </ul> <!-- Menu -->
                                <ul class="nav navbar-items pull-right">
                                    <!--List Item-->
                                    <li class="list-item">
                                        <ul class="nav navbar-main menu-white">
                                            <li class=""><a href="/">Home</a>

                                            </li>

                                            <li class=""><a href="#">Home</a>

                                            </li>
                                            <li class=""><a href="/">Home</a>

                                            </li>


                                            <li class=""><a href="/">Homes</a>
                                                <button class="btnLogin-popup">LogIn</button>
                                            </li>



                                        </ul>
                                    </li>
                                    <!--List Item End-->
                                    <!--List Item-->
                                    <li class="list-item">
                                        <div class="header-navbar-text-1"><a href="/" class="h-donate-btn">LOGOUT</a></div>
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
    </header>

    <div class="wrapper">

        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>

        <div class="form-box login">
            <h2>Login</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required>
                    <label> Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required>
                    <label> Password</label>
                </div>
                <div class="remember-forgot">
                    <label> <input type="checkbox">Remember Me</label>
                    <a href="#">Forgot Password</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't Have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>


        <div class="form-box register">
            <h2>Registration</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" required>
                    <label> Username</label>
                </div>

                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" required>
                    <label> Email</label>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required>
                    <label> Password</label>
                </div>
                <div class="remember-forgot">
                    <label> <input type="checkbox">I agree to the terms and conditions</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already Have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>





    </div>

    <script src="web/ljs/script.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>