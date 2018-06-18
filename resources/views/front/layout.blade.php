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
    <link rel="icon" type="image/png" sizes="192x192"
          href="{!! asset('assets/img/favicon/android-icon-192x192.png') !!}">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="{!! asset('assets/libs/bootstrap/css/bootstrap.min.css') !!}" media="all"/>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{!! asset('assets/libs/fontawesome/css/font-awesome.min.css') !!}" media="all"/>
    <!-- GOOGLE FONT -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7cCookie"/>
    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="{!! asset('assets/libs/owlcarousel/owl.carousel.min.css') !!}" media="all"/>
    <link rel="stylesheet" href="{!! asset('assets/libs/owlcarousel/owl.theme.default.min.css') !!}" media="all"/>
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{!! asset('assets/libs/datepicker/bootstrap-datetimepicker.min.css') !!}" media="all"/>
    <!-- MASTER  STYLESHEET  -->
    <link id="csi-master-style" rel="stylesheet" href="{!! asset('assets/css/style-default.min.css') !!}" media="all"/>
    <!-- MODERNIZER CSS  -->
    <script src="{!! asset('assets/js/vendor/modernizr-2.8.3.min.js') !!}"></script>
    @section('header')
    @show
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
            <?php
            $criticalAnnounce = App\Announcement::active()->where('type', 0)->first();
            ?>
            @if($criticalAnnounce)
                <div class="header-top">
                    <div class="header-top-inner">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="contact">
                                        <ul class="list-inline">
                                            <li><i class="fa fa-bullhorn" aria-hidden="true"></i>
                                                <strong>{{ $criticalAnnounce->title }}
                                                    :</strong>{{ $criticalAnnounce->content }}
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
            @endif
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
                                                <div class="csi-logo csi-scroll">
                                                    <a href="#">
                                                        <h3 style="font-family: Cookie,cursive; font-size: 5rem; font-weight: 400; margin: 15px; color: #fff;">
                                                            ilunch</h3>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="collapse navbar-collapse">
                                                <ul class="nav navbar-nav csi-nav">
                                                    <li><a href="{{route('index')}}">{{trans('front/site.home')}}</a>
                                                    </li>
                                                    @if (Request::is('/'))
                                                        <li><a class="csi-scroll"
                                                               href="#csi-about">{{trans('front/site.about')}}</a>
                                                        </li>
                                                    @else
                                                        <li><a class="csi-scroll"
                                                               href="{{route('index','#csi-about')}}">{{trans('front/site.about')}}</a>
                                                        </li>
                                                    @endif
                                                    <li><a class="csi-scroll"
                                                           href="#csi-menu">{{ trans('front/site.menu') }}</a>
                                                    </li>
                                                    <li><a class="csi-scroll"
                                                           href="{{route('news')}}">{{ trans('front/site.news') }}</a>
                                                    </li>
                                                    @if (Request::is('/'))
                                                        <li><a class="csi-scroll"
                                                               href="#csi-feedback">{{ trans('front/site.feedback') }}</a>
                                                        </li>
                                                    @else
                                                        <li><a class="csi-scroll"
                                                               href="{{route('index','#csi-feedback')}}">{{ trans('front/site.feedback') }}</a>
                                                        </li>
                                                    @endif
                                                    <li><a class="csi-scroll"
                                                           href="{{ route('contact') }}">{{ trans('front/site.contact') }}</a>
                                                    </li>

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

                                                    @if(!Auth::check())
                                                        <li><a class="csi-btn csi-scroll"
                                                               href="{{ route('login') }}">{{ trans('front/site.connection') }}</a>
                                                        </li>
                                                    @elseif(Auth::user()->role != "STUDENT")
                                                        <li><a class="csi-btn csi-scroll"
                                                               href="{{ route('admin') }}">{{ trans('front/site.admin') }}</a>
                                                        </li>
                                                    @else
                                                        <li><a class="csi-btn csi-scroll"
                                                               href="{{ route('dashboard') }}">{{ trans('front/site.dashboard') }}</a>
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

    @section('content')
    @show

    <footer>
        <div id="csi-footer" class="csi-footer">
            <div class="csi-inner">
                <div class="footer-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="footer-top">
                                    <a class="footer-logo" href="index"><h3
                                                style="font-family: Cookie,cursive; font-size: 11rem; font-weight: 400; margin: 15px; color: #fff;">
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
                                <p>iLunch<span style="font-size: 50%;">v{{config('app.version')}}</span> is proudly
                                    powered by <a href="https://www.oneup.host/">Students</a> |
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
{{--<script src="{!! asset('assets/js/vendor/jquery-1.12.4.min.js') !!}"></script>--}}
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<!-- BOOTSTRAP JS  -->
<script src="{!! asset('assets/libs/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- bootstrap date picker js with moment js -->
<script src="{!! asset('assets/libs/datepicker/moment-with-locales.min.js') !!}"></script>
<script src="{!! asset('') !!}assets/libs/datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- SKILLS SCRIPT  -->
<script src="{!! asset('') !!}assets/libs/jquery.validate.js"></script>
<!-- Owl Carousel  -->
<script src="{!! asset('assets/libs/owlcarousel/owl.carousel.min.js') !!}"></script>
<!-- adding magnific popup js library -->
<script type="text/javascript" src="{!! asset('assets/libs/maginificpopup/jquery.magnific-popup.min.js') !!}"></script>
<!-- type js -->
<script src="{!! asset('assets/libs/typed/typed.min.js') !!}"></script>
<!-- SMOTH SCROLL -->
<script src="{!! asset('assets/libs/jquery.smooth-scroll.min.js') !!}"></script>
<script src="{!! asset('assets/libs/jquery.easing.min.js') !!}"></script>
<!-- Counter JS -->
<script src="{!! asset('assets/libs/waypoints.min.js') !!}"></script>
<script src="{!! asset('assets/libs/counterup/jquery.counterup.min.js') !!}"></script>
<!-- CUSTOM SCRIPT  -->
<script src="{!! asset('assets/js/custom.script.js') !!}"></script>
@section('scripts')
@show
</body>
</html>

