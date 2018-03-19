@extends('front.layout')
@section('content')
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
                                <a class="csi-btn csi-scroll csi-btn-white" href="#csi-menu">Μενού Ημέρας</a>
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
                                <h3 class="title"><a href="#">Πρωινό</a></h3>
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
                                            <div class="csi-form-group" style="padding-bottom: 10px">
                                                <input class="form-control" name="comment" id="foodiebooking_phone"
                                                       placeholder="Brief Comment" type="text">
                                            </div>
                                            <div class="csi-form-group">
                                                <input id="fb_submit" class="csi-btn csi-submit" value="Booking Submit"
                                                       type="submit">
                                            </div>
                                        </form>
                                    </figcaption>
                                </figure>
                            </div> <!--//.reservaton-area-->
                        </div>
                    </div>

                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--RESERVATION END-->

@endsection
