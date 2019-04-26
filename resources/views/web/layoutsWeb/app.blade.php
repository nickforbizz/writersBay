<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>E-chama</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="{{ asset('assets/Infinity10/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Infinity10/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Infinity10/css/main.css') }}">

    <!-- script
    ================================================== -->
    <script src="{{ asset('assets/Infinity10/js/modernizr.js') }}"></script>
    <script src="{{ asset('assets/Infinity10/js/pace.min.js') }}"></script>

    <!-- favicons
     ================================================== -->
    <link rel="shortcut icon" href="{{ asset('assets/Infinity10/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/Infinity10/favicon.ico" type="image/x-icon') }}">

</head>

<body id="top">

<!-- header
================================================== -->
<header>

    <div class="header-logo">
        <a href="index.html">E-chama</a>
    </div>

    <a id="header-menu-trigger" href="#0">
        <span class="header-menu-text">Menu</span>
        <span class="header-menu-icon"></span>
    </a>

    <nav id="menu-nav-wrap">

        <a href="#0" class="close-button" title="close"><span>Close</span></a>

        <h3>E-chama.</h3>

        <ul class="nav-list">
            <li class="current"><a class="smoothscroll" href="#home" title="">Home</a></li>
            <li><a class="smoothscroll" href="#about" title="">About</a></li>
            <li><a class="smoothscroll" href="#services" title="">Services</a></li>
            <li><a class="smoothscroll" href="#contact" title="">Contact</a></li>
            <li><a class="" href="{{ route('login') }}" title="Log in">Sign In</a></li>
            <li><a class="" href="{{ route('register') }}" title="">Sign UP</a></li>
        </ul>

        <p class="sponsor-text">
            Looking for an awesome and reliable webhosting? Try <a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">DreamHost</a>.
            Get <span>$50 off</span> when you sign up with the promocode <span>styleshout</span>.
            <!-- Simply type	the promocode in the box labeled “Promo Code” when placing your order. -->
        </p>


        @yield('content')

        <!-- footer
================================================== -->
        <footer>
            <div class="footer-main">

                <div class="row">

                    <div class="col-five tab-full footer-about">

                        <h4 class="h05">E-chama.</h4>

                        <p>Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Nulla porttitor accumsan tincidunt. Proin eget tortor risus.</p>

                    </div> <!-- end footer-about -->

                    <div class="col-three tab-full footer-social">

                        <h4 class="h05">Follow Us.</h4>

                        <ul class="list-links">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Behance</a></li>
                            <li><a href="#">Dribble</a></li>
                        </ul>

                    </div> <!-- end footer-social -->

                    <div class="col-four tab-full footer-subscribe end">

                        <h4 class="h05">Get Notified.</h4>

                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa.</p>

                        <div class="subscribe-form">

                            <form id="mc-form" class="group" novalidate="true">

                                <input type="email" value="" name="dEmail" class="email" id="mc-email" placeholder="type email" required="">

                                <!-- <input type="submit" name="subscribe" > -->
                                <button><i class="icon-mail"></i></button>

                                <label for="mc-email" class="subscribe-message"></label>

                            </form>

                        </div>

                    </div> <!-- end footer-subscribe -->

                </div> <!-- end row -->

            </div> <!-- end footer-main -->

            <div class="footer-bottom">

                <div class="row">

                    <div class="col-twelve">
                        <div class="copyright">
                            <span>© Copyright E-chama 2019.</span>
                            <span>Design by <a href="http://www.styleshout.com/">styleshout</a></span>
                        </div>
                    </div>

                </div>

            </div> <!-- end footer-bottom -->

            <div id="go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                </a>
            </div>
        </footer>

        <div id="preloader">
            <div id="loader"></div>
        </div>

        <!-- Java Script
        ================================================== -->
        <script src="{{ asset('assets/Infinity10/js/jquery-2.1.3.min.js') }}"></script>
        <script src="{{ asset('assets/Infinity10/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/Infinity10/js/main.js') }}"></script>

</body>

</html>