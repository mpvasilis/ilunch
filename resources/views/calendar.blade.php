@extends('layouts.template')
@section('title')
    Menu Schedule
@endsection

@section('head')
    <!-- CSS -->
    <link href="//arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.css" rel="stylesheet"/>
    <!-- SCRIPTS -->
    <script class="cssdesk" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"
            type="text/javascript"></script>
    <script class="cssdesk" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"
            type="text/javascript"></script>
    <script class="cssdesk" src="//arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.min.js"
            type="text/javascript"></script>
@endsection

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Menu Schedule</div>

                    <div class="panel-body">
                        <div id="calendar" style="width: 100%;margin: 0 auto;"></div>
                    </div>
                    <div class="panel-footer text-center">
                        *Click on event to display more info and review options.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
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
                        start: '2017-03-28T10:00:00',
                        end: '2017-03-28T12:00:00',
                        backgroundColor: 'red',
                        allDay:false,
                        id: 128,
                        food: 'I have a string',
                        borderColor: 'red'
                    },
                    {
                        title: 'Μακαρόνια με Κιμά',
                        start: '2017-03-28T13:00:00',
                        end: '2017-03-28T15:30:00',
                        backgroundColor: 'green',
                        allDay:false,
                        id: 128,
                        food: 'I have a string',
                        borderColor: 'green'
                    },
                    {
                        title: 'Σνίτσελ με Πουρέ',
                        start: '2017-03-28T18:00:00',
                        end: '2017-03-28T20:00:00',
                        backgroundColor: 'blue',
                        allDay:false,
                        id: 128,
                        food: 'I have a string',
                        borderColor: 'blue'
                    }
                ],
                eventClick: function (event) {
                    if (event.id) {
                       // $('#menu' + event.id).modal('show');
                        alert(event.food);
                    }
                }
            });

        });
    </script>
@endsection