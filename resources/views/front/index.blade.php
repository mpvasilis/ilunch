<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- SITE TITLE -->
    <title>{{ trans('front/site.title') }} | {{ trans('front/site.description') }}</title>
    <meta name="description" content="{{ trans('front/site.description') }}"/>

    <!--  FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/manifest.json">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css" media="all"/>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="assets/libs/fontawesome/css/font-awesome.min.css" media="all"/>
    <!-- GOOGLE FONT -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7cCookie"/>
    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="assets/libs/owlcarousel/owl.carousel.min.css" media="all"/>
    <link rel="stylesheet" href="assets/libs/owlcarousel/owl.theme.default.min.css" media="all"/>
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="assets/libs/datepicker/bootstrap-datetimepicker.min.css" media="all"/>
    <!-- MASTER  STYLESHEET  -->
    <link id="csi-master-style" rel="stylesheet" href="assets/css/style-default.min.css" media="all"/>
    <!-- MODERNIZER CSS  -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="home">
<!--[if lt IE 8]>

<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class="csi-container ">
    <!--HEADER-->
    <header>
        <div id="csi-header" class="csi-header csi-banner-header">
            <div class="header-top">
                <div class="header-top-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="contact">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-bullhorn" aria-hidden="true"></i>
                                            Καμία ανακοινωση!
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="right-menu">
                                    <ul class="list-inline">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="csi-header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <nav class="navbar navbar-default csi-navbar">
                                <div class="container">
                                    <nav class="navbar navbar-default csi-navbar">
                                        <div class="csicontainer">
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                        data-target=".navbar-collapse">
                                                    <span class="sr-only">Μενού</span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                                <div class="csi-logo">
                                                    <a href="index">
                                                        <h3 style="font-family: Cookie,cursive; font-size: 5rem; font-weight: 400; margin: 15; color: #fff;">
                                                            ilunch</h3>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="collapse navbar-collapse">
                                                <ul class="nav navbar-nav csi-nav">
                                                    <li><a href="index">Αρχικη</a></li>
                                                    <li><a class="csi-scroll" href="#csi-about">Σχετικα</a></li>
                                                    <li><a class="csi-scroll" href="#csi-menu">Μενου</a></li>
                                                    <li><a class="csi-scroll" href="news-list.html">Ανακοινωσεις</a>
                                                    </li>
                                                    <li><a class="csi-scroll" href="#csi-feedback">Feedback</a></li>
                                                    <li><a class="csi-scroll" href="contact.html">Επικοιωνωνια</a></li>

                                                    <li class="dropdown" style="margin:-5px;">
                                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><img
                                                                    width="32" height="32" alt="{{ session('locale') }}"
                                                                    src="{!! asset('img/' . session('locale') . '-flag.png') !!}"/>
                                                            <b class="caret"></b></a>
                                                        <ul class="dropdown-menu">
                                                            @foreach ( config('app.languages') as $user)
                                                                @if($user !== config('app.locale'))
                                                                    <li>
                                                                        <a href="{!! url('language') !!}/{{ $user }}"><img
                                                                                    width="32" height="32"
                                                                                    alt="{{ $user }}"
                                                                                    src="{!! asset('img/' . $user . '-flag.png') !!}"></a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>

                                                    @if(session('statut') == 'visitor')
                                                        <li><a class="csi-btn csi-scroll"
                                                               href="auth/login">{{ trans('front/site.connection') }}</a>
                                                        </li>
                                                    @else
                                                        <li><a class="csi-btn csi-scroll"
                                                               href="dashboard">{{ trans('front/site.dashboard') }}</a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <!--/.nav-collapse -->
                                        </div>
                                    </nav>
                                </div>
                                <!-- /.container -->
                            </nav>
                        </div>
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER-->
        </div>
    </header>
    <!--HEADER END-->

    <!--Banner-->
    <section>
        <div class="csi-banner">
            <div class="csi-banner-style">
                <div class="csi-inner">
                    <div class="container">
                        <div class="csi-banner-content">
                            <h3 class="csi-subtitle">{{ trans('front/site.title') }}</h3>
                            <h2 class="csi-title">{{ trans('front/site.sub-title') }}</h2>
                            <div class="btn-area">
                                <a class="csi-btn csi-btn-white" href="#csi-menu">Μενού Ημέρας</a>
                            </div>
                        </div>
                    </div>
                    <!-- //.container -->
                </div>
                <!-- //.INNER -->
            </div>
        </div>
    </section>
    <!--Banner END-->

    <!--ABOUT TOP-->
    <section>
        <div id="csi-about-top" class="csi-about-top">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="about-top-single">
                                <a href="#"><img src=assets/img/about-icon.png alt="about-icon"></a>
                                <h3 class="title"><a href="#">Πωρωινό</a></h3>
                                <p>Ωρες σερβιρίσματος: 7:30-9:00 πμ</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="about-top-single">
                                <a href="#"><img src=assets/img/about-icon2.png alt="about-icon"></a>
                                <h3 class="title"><a href="#">Μεσημεριανό</a></h3>
                                <p>Ωρες σερβιρίσματος: 7:30-9:00 πμ</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="about-top-single">
                                <a href="#"><img src=assets/img/about-icon3.png alt="about-icon"></a>
                                <h3 class="title"><a href="#">Απογευματινό</a></h3>
                                <p>Ωρες σερβιρίσματος: 7:30-9:00 πμ</p>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT TOP END-->

    <!--ABOUT-->
    <section>
        <div id="csi-about" class="csi-about">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h3 class="subtitle">Φοιτητικη Λεσχη ΠΔΜ</h3>
                                <h2 class="title">Σχετικά με την λέσχη μας</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-about-content">
                                <p class="text">
                                    We provide you with daily self-made bread, sourdough pizza, roasted
                                    fish-meat-vegetables and many more. Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Ut enim ad minim veniam.
                                </p>
                                <img src="assets/img/about-bottom.jpg" alt="about team">
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->

    <!--MENU ITEMS-->
    <section>
        <div id="csi-menu" class="csi-menu">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h3 class="subtitle">Μενου Λεχης</h3>
                                <h2 class="title">Μενού Ημέρας</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="csi-nav-pills-area">
                                <ul class="nav nav-pills csi-nav-pills">
                                    <li class="active"><a data-toggle="pill" href="#menu1"><img
                                                    src="assets/img/tab-menu2.png" alt=""> Breakfast</a></li>
                                    <li><a data-toggle="pill" href="#menu2"><img src="assets/img/tab-menu3.png" alt="">
                                            Lunch</a></li>
                                    <li><a data-toggle="pill" href="#menu3"><img src="assets/img/tab-menu4.png" alt="">
                                            Dinner</a></li>
                                </ul>
                            </div>

                            <div class="tab-content csi-tab-content">
                                <div id="home" class="tab-pane fade in active">

                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item2.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Chocolate Milkshake</a>
                                                    </h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    With chopped vegetables, served with plum sauce. Tossed in
                                                    peppercorns and spiced salt
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item3.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Caesar Salad</a></h3>
                                                    <p class="price">
                                                        70<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    With chopped vegetables, served with plum sauce. Tossed in
                                                    peppercorns and spiced salt
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item4.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Black Bean Burger</a>
                                                    </h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    With chopped vegetables, served with plum sauce. Tossed in
                                                    peppercorns and spiced salt
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item5.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">American Humburger</a>
                                                    </h3>
                                                    <p class="price">
                                                        40<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    With chopped vegetables, served with plum sauce. Tossed in
                                                    peppercorns and spiced salt
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item6.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Burger Mexicana</a>
                                                    </h3>
                                                    <p class="price">
                                                        40<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    With chopped vegetables, served with plum sauce. Tossed in
                                                    peppercorns and spiced salt
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item1.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item2.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item3.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item4.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item5.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">

                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item6.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>

                                    </div><!--//.csi-single-tab-->
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item1.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item2.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item3.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item1.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Pizza Mexicana</a></h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>

                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                    <div class="csi-single-tab">
                                        <div class="menu-thumb">
                                            <a href="single-item.html"><img
                                                        src="assets/img/speacial-item/special-item4.jpg" alt=""></a>
                                        </div>
                                        <div class="menu-content">
                                            <div class="csi-info">
                                                <div class="title-area">
                                                    <h3 class="title"><a href="single-item.html">Black Bean Burger</a>
                                                    </h3>
                                                    <p class="price">
                                                        150<span>$</span>
                                                    </p>
                                                </div>
                                                <p class="text">
                                                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                                                    posuere cubilia Curae Nullam varius a felis eu dictum.
                                                </p>
                                            </div> <!--//.single tab-->
                                        </div>
                                    </div><!--//.csi-single-tab-->
                                </div>
                            </div>

                        </div>

                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--MENU ITEMS END-->

    <!--RESERVATION-->
    <section>
        <div id="csi-feedback" class="csi-reservation">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h3 class="subtitle">Book A Table New</h3>
                                <h2 class="title">Foodking Reservation</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-reservaton-area">
                                <figure>
                                    <a href="#"><img src="assets/img/reservation.jpg" alt="Special Food"></a>
                                    <figcaption>

                                        <form id="foodiebooking">
                                            <div class="form-group  csi-form-left">
                                                <input class="form-control" name="fb_name" id="foodiebooking_name"
                                                       placeholder="Enter Your Name" aria-required="true" type="text">
                                            </div>

                                            <div class="form-group csi-form-right">
                                                <input class="form-control" name="fb_email" id="foodiebooking_email"
                                                       placeholder="Email Address" aria-required="true" type="email">
                                            </div>
                                            <div class="form-group csi-form-left">
                                                <input class="form-control" name="fb_phone" id="foodiebooking_phone"
                                                       placeholder="Telephone Number" type="text">
                                            </div>
                                            <div class="form-group csi-form-right">
                                                <select class="form-control" name="fb_person" id="foodiebooking_person"
                                                        aria-required="true">
                                                    <option value="">Number of Guests</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="8">9</option>
                                                    <option value="10">10</option>
                                                    <option value="more">More than 10</option>
                                                </select>
                                            </div>
                                            <div class="form-group csi-form-full csi-form-left">
                                                <div class="input-group date" id="datetimepicker2">
                                                    <input name="fb_date" id="foodiebooking_date" class="form-control"
                                                           placeholder="Date format ( mm-dd-yyyy )."
                                                           aria-required="true" type="text">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group csi-form-right">
                                                <select class="form-control" name="fb_time" id="foodiebooking_time"
                                                        aria-required="true">
                                                    <option value="">Time</option>
                                                    <option value="1">Breakfast</option>
                                                    <option value="2">Lunch</option>
                                                    <option value="3">Dinner</option>
                                                </select>
                                            </div>
                                            <div class="csi-form-group">
                                                <input id="fb_submit" class="csi-btn csi-submit" value="Booking Submit"
                                                       type="submit">
                                            </div>
                                        </form>
                                    </figcaption>
                                </figure>
                                <div class="call-phone">
                                    <h4 class="title">Or Call Now</h4>
                                    <ul class="list-inline">
                                        <li>+12345 678 555</li>
                                        <li>+12345 678 556</li>
                                        <li>+12345 678 557</li>
                                    </ul>
                                </div>
                            </div> <!--//.reservaton-area-->
                        </div>
                    </div>

                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--RESERVATION END-->

    <footer>
        <div id="csi-footer" class="csi-footer">
            <div class="csi-inner">
                <div class="footer-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="footer-top">
                                    <a class="footer-logo" href="index"><h3
                                                style="font-family: Cookie,cursive; font-size: 11rem; font-weight: 400; margin: 15; color: #fff;">
                                            ilunch</h3></a>
                                </div>
                            </div>
                        </div><!--//.ROW-->
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <div class="single">
                                    <h3 class="title">Contact</h3>
                                    <p>345 Park Ave, San Jose, CA 95110, United States</p>
                                    <p><a href="mailto:">admin(at)oneup(dot)group</a>
                                    </p>
                                </div>
                            </div> <!--//.col-->
                            <div class="col-xs-12 col-sm-3">
                                <div class="single">
                                    <h3 class="title">Book A Table</h3>
                                    <p>pellentesque vehicula. Aliquam turpis justo, mattis id neque</p>
                                    <p>Mobile: +778529600</p>
                                </div>
                            </div> <!--//.col-->
                            <div class="col-xs-12 col-sm-3">
                                <div class="single">
                                    <h3 class="title">Opening Time</h3>
                                    <p>Mon - Thu 11:30 - 22:00 clock </p>
                                    <p>Fri - Sat 11:30 - 24:00 clock </p>
                                </div>
                            </div> <!--//.col-->
                            <div class="col-xs-12 col-sm-3">
                                <div class="single">
                                    <h3 class="title">Social Links</h3>
                                    <ul class="list-inline footer-social">
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div> <!--//.col-->
                        </div> <!--//.main row-->
                    </div><!-- //.CONTAINER -->
                </div>
                <div class="csi-footer-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <p>iLunch is proudly powered by <a href="https://www.oneup.host/">Students</a> |
                                    Supervised by <a href="http://arch.icte.uowm.gr/mdasyg/index.php">Dr. Minas
                                        Dasygenis</a></p>
                            </div>
                        </div><!--//.ROW-->
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER-->
            </div>
        </div>
    </footer>

</div> <!--//.csi SITE CONTAINER-->
<!-- JQUERY  -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- BOOTSTRAP JS  -->
<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap date picker js with moment js -->
<script src="assets/libs/datepicker/moment-with-locales.min.js"></script>
<script src="assets/libs/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- SKILLS SCRIPT  -->
<script src="assets/libs/jquery.validate.js"></script>
<!-- if load google maps then load this api, change api key as it may expire for limit cross as this is provided with any theme -->
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzfNvH2kifJQ0PhBIyuuG-swdkW1NPQVE"></script>
<!-- CUSTOM GOOGLE MAP -->
<script type="text/javascript" src="assets/libs/gmap/jquery.googlemap.js"></script>
<!-- Owl Carousel  -->
<script src="assets/libs/owlcarousel/owl.carousel.min.js"></script>
<!-- tweetie feed js  -->
<script src="tweetie/tweetie.js"></script>
<!-- adding magnific popup js library -->
<script type="text/javascript" src="assets/libs/maginificpopup/jquery.magnific-popup.min.js"></script>
<!-- type js -->
<script src="assets/libs/typed/typed.min.js"></script>
<!-- SMOTH SCROLL -->
<script src="assets/libs/jquery.smooth-scroll.min.js"></script>
<script src="assets/libs/jquery.easing.min.js"></script>
<!-- Counter JS -->
<script src="assets/libs/waypoints.min.js"></script>
<script src="assets/libs/counterup/jquery.counterup.min.js"></script>
<!-- CUSTOM SCRIPT  -->
<script src="assets/js/custom.script.js"></script>
</body>
</html>

