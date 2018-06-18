@extends('dashboard.layouts.template')
@section('title')
    Menu Schedule
@endsection

@section('head')
    <!-- CSS -->
    <link href="//arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.css" rel="stylesheet"/>
    <!-- SCRIPTS -->

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

    <div id="menumodal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 id="title" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p  id="duration"></p>

                    <p  id="details">One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
                        var startmin =  event.start.getMinutes() < 10 ? '0' + event.start.getMinutes() : event.start.getMinutes();
                        var endmin =  event.end.getMinutes() < 10 ? '0' + event.end.getMinutes() : event.end.getMinutes();
                        var time= event.start.getHours() + ":" + startmin + " - " + event.end.getHours() + ":" + endmin;
                        $('#title').text(event.title);
                        $('#duration').text(time);

                        $('#details').text(event.food);
                        $('#menumodal').modal('show');


                    }
                }
            });

        });
    </script>
@endsection