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
                                <a class="csi-btn csi-scroll csi-btn-white" href="#csi-menu">{{ trans('front/site.daymenu') }}</a>
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

                                <h3 class="title"><a href="#">{{ trans('front/site.breakfast') }}</a></h3>
                                <p>{{ trans('front/site.breakfast-time') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="about-top-single">

                                <h3 class="title"><a href="#">{{ trans('front/site.lunch') }}</a></h3>
                                <p>{{ trans('front/site.lunch-time') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="about-top-single">

                                <h3 class="title"><a href="#">{{ trans('front/site.dinner') }}</a></h3>
                                <p>{{ trans('front/site.dinner-time') }}</p>
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
                                <h3 class="subtitle">{{ trans('front/site.sub-title') }}</h3>
                                <h2 class="title">{{ trans('front/site.aboutus-title') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-about-content">
                                <p class="text">
                                {{ trans('front/site.aboutus-text') }}
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
                                <h3 class="subtitle">{{ trans('front/site.daymenu-title-big') }}</h3>
                                <h2 class="title">{{ trans('front/site.daymenu-title-small') }}</h2>
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
                            {{ trans('front/site.calendar-help') }}

                            </div>
                            {{--</div>--}}
                        </div>
                    </div><!-- //.CONTAINER -->
                </div><!-- //.INNER -->
            </div>
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
                                <h3 class="subtitle">{{ trans('front/site.feedback-subtitle') }}</h3>
                                <h2 class="title">{{ trans('front/site.feedback-title') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-reservaton-area">
                              <div class="col-md-6 col-xs-12 imagediv">
                                      <img src="assets/img/reservation.jpg" alt="Special Food">
                              </div>
                              <div class="col-md-6 col-xs-12 formdiv">


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
                                                           value="{{$user->name}}" type="text" disabled>
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

                                </div>
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
                        food: 'I have a string'
                    },
                    {
                        title: 'Μακαρόνια με Κιμά',
                        start: '2018-03-28T13:00:00',
                        end: '2018-03-28T15:30:00',
                        food: 'I have a string'
                    },
                    {
                        title: 'Σνίτσελ με Πουρέ',
                        start: '2018-03-28T18:00:00',
                        end: '2018-03-28T20:00:00',
                        food: 'I have a string'
                    }
                ],
                eventClick: function (event) {
                    if (event.title) {
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
