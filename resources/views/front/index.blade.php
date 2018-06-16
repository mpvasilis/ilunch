@extends('front.layout')
@section('header')
    <!-- CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet"/>
@endsection
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
                        <div class="col-md-10 col-md-offset-1">
                            {{--<div class="panel panel-default">--}}
                            <div class="panel-body">
                                <div id="calendar" style="width: 100%;margin: 0 auto;"></div>
                            </div>
                            <div class="panel-footer text-center">
                                *Click on event to display more info and review options.
                            </div>
                            {{--</div>--}}
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
                                <h3 class="subtitle">We respect your opinion</h3>
                                <h2 class="title">Leave Feedback</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-reservaton-area">
                                <figure>
                                    <img src="assets/img/reservation.jpg" alt="Special Food">
                                    <figcaption>

                                        <form method="POST" action="{{ route('feedback_store') }}">
                                            @if(isset($feedbackStatus))
                                                <span style="color:white"> {{ $feedbackStatus }}</span>
                                            @endif
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            @if(!Auth::check())
                                                <div class="csi-form-group" style="padding-bottom: 10px">
                                                    <input class="form-control" name="name" id="feedback_name"
                                                           placeholder="Login to create eponymous feedback"
                                                           type="hidden"
                                                           disabled>
                                                </div>
                                            @else
                                                <div class="csi-form-group" style="padding-bottom: 10px">
                                                    <input class="form-control" name="name" id="feedback_name"
                                                           value="{{Auth::user()->student_id}}" type="text" disabled>
                                                </div>
                                            @endif

                                            <div class="csi-form-group" style="padding-bottom: 10px">
                                                <input class="form-control" name="comment" id="feedback_comment"
                                                       placeholder="Brief Comment" type="text" required>
                                            </div>
                                            <div class="csi-form-group">
                                                <input class="csi-btn csi-submit" value="Submit Feedback" type="submit">
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

@section('scripts')
    <div id="menumodal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 id="title" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p id="duration"></p>
                    <p id="details">One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>
    <script class="cssdesk" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"
            type="text/javascript"></script>
    <script class="cssdesk" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"
            type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var date = new Date();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({


                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },

                events: [
                    {
                        title: 'Πρωινό',
                        start: '2018-03-28T10:00:00',
                        end: '2018-03-28T12:00:00',
                        backgroundColor: 'red',
                        allDay: false,
                        id: 128,
                        food: 'I have a string',
                        borderColor: 'red'
                    },
                    {
                        title: 'Μακαρόνια με Κιμά',
                        start: '2018-03-28T13:00:00',
                        end: '2018-03-28T15:30:00',
                        backgroundColor: 'green',
                        allDay: false,
                        id: 128,
                        food: 'I have a string',
                        borderColor: 'green'
                    },
                    {
                        title: 'Σνίτσελ με Πουρέ',
                        start: '2018-03-28T18:00:00',
                        end: '2018-03-28T20:00:00',
                        backgroundColor: 'blue',
                        allDay: false,
                        id: 128,
                        food: 'I have a string',
                        borderColor: 'blue'
                    }
                ],
                eventClick: function (event) {
                    if (event.id) {
                        // var startmin = event.start.getMinutes() < 10 ? '0' + event.start.getMinutes() : event.start.getMinutes();
                        // var endmin = event.end.getMinutes() < 10 ? '0' + event.end.getMinutes() : event.end.getMinutes();
                        // var time = event.start.getHours() + ":" + startmin + " - " + event.end.getHours() + ":" + endmin;
                        $('#title').text(event.title);
                        $('#duration').text('time');

                        $('#details').text(event.food);
                        $('#menumodal').modal('show');


                    }
                }
            });

        });
    </script>
@endsection