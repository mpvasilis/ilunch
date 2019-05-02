<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iLunch Admin - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url("assets/bootstrap/dist/css/bootstrap.min.css")}}" media="all">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url("assets/bower_components/font-awesome/css/font-awesome.min.css")}}" media="all">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url("assets/bower_components/Ionicons/css/ionicons.min.css")}}" media="all">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url("assets/css/AdminLTE.min.css")}}" media="all">
    <link rel="stylesheet" href="{{url("assets/css/custom.css")}}" media="all">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url("assets/css/skins/_all-skins.min.css")}}" media="all">
    <link rel="icon" type="image/png" sizes="192x192" href="{!! asset('assets/icons/icon.png') !!}">


    @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        @if(isStudent($user))

        <a href='{{route('profile',["student_id" => $user->student_id])}}' class="logo">
        @else
        <a href="{{ route('admin_statistics') }}" class="logo">
        @endif
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>iL</b>@</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>{{ trans('admin/site.main-title') }}</b>{{ trans('admin/site.sec-title') }}</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('index')}}"><i class="fa fa-home"></i> {{ trans('admin/site.site-top') }}</a>
                    </li>

                    <li class="dropdown" style="margin:-5px;">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><img
                                    width="32" height="32" alt="{{ session('locale') }}"
                                    src="{!! asset('img/' . session('locale') . '-flag.png') !!}"/>
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @foreach ( config('app.languages') as $lang)
                                @if($lang !== config('app.locale'))
                                    <li>
                                        <a href="{!! url('language') !!}/{{ $lang }}"><img
                                                    width="32" height="32"
                                                    alt="{{ $lang }}"
                                                    src="{!! asset('img/' . $lang . '-flag.png') !!}"></a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-arrow-circle-down"></i>
                            <span class="hidden-xs">{{ $user->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <p>
                                    {{ $user->name }}
                                    <small>({{$user->email}})</small>
                                    {{ $user->role }}
                                    <small>Registered {{humanTiming($user->created_at)}}</small>
                                </p>
                            {{--</li>--}}
                            {{--<!-- uncomment for menu under user info -->--}}
                            {{--<li class="user-body">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-xs-4 text-center">--}}
                            {{--<a href="#">Followers</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4 text-center">--}}
                            {{--<a href="#">Sales</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4 text-center">--}}
                            {{--<a href="#">Friends</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- /.row -->--}}
                            {{--</li>--}}
                            {{--<!-- Menu Footer-->--}}
                            <li class="user-footer center-block">
                                <div class="pull-right">
                                    <form action="{{ route('logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit"
                                                class="btn btn-default btn-flat">{{ trans('admin/site.logout-nav') }}</button>
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->
    <aside class="main-sidebar">
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">{{ trans('admin/site.main-nav') }}</li>


                @if(hasStaffRole($user))
                    <li {{ (Request::is('admin/schedule')) ? 'class=active':''}}><a
                                href="{{route('admin_schedule')}}"><i
                                    class="fa fa-list"></i> <span>{{ trans('admin/site.schedule') }}</span></a></li>
                    <li {{ (Request::is('admin/meals')) ? 'class=active':''}}><a href="{{route('admin_meals')}}"><i
                                    class="fa fa-calendar-minus-o"></i>
                            <span>{{ trans('admin/site.meals-nav') }}</span></a></li>
                    <li {{ (Request::is('admin/announcements')) ? 'class=active':''}}><a
                                href="{{route('admin_announcements')}}"><i class="fa fa-bullhorn"></i>
                            <span>{{ trans('admin/site.announcements-nav') }}</span></a>
                    </li>
                    <li {{ (Request::is('admin/statistics')) ? 'class=active':''}}><a
                                href="{{route('admin_statistics')}}"><i class="fa fa-area-chart"></i>
                            <span>{{ trans('admin/site.statistics-nav') }}</span></a></li>
                    <li {{ (Request::is('admin/feedback')) ? 'class=active':''}}><a
                                href="{{route('admin_feedback')}}"><i
                                    class="fa fa-circle-o"></i> <span>{{ trans('admin/site.feedback-nav') }}</span></a>
                    </li>
                    <li {{ (Request::is('admin/students/*')) ? 'class=active':''}}><a
                                href="{{route('admin_students')}}"><i
                                    class="fa fa-book"></i> <span>{{ trans('admin/site.students-nav') }}</span></a></li>
                    <li class="treeview {{ (Request::is('admin/memberships/*') && !Request::is('admin/memberships/settings')) ? 'active menu-open':''}}">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>{{ trans('admin/site.members-nav') }}</span>
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            @if(hasStaffRole($user))
                                <li {{ (Request::is('admin/memberships/show/*')) ? 'class=active':''}}><a
                                            href="{{route('admin_memberships_show')}}"><i
                                                class="fa fa-th-list"></i>{{ trans('admin/site.members-list-nav') }}</a>
                                </li>
                            @endif
                            <li {{ (Request::is('admin/memberships/assign/show/*')) ? 'class=active':''}}><a
                                        href="{{route('admin_memberships_showAssign')}}"><i class="fa fa-plus-square-o"></i>
                                    {{ trans('admin/site.members-assign-nav') }}</a></li>
                        </ul>
                    </li>
                  @endif

                @if(hasAdminRole($user))
                <li {{ (Request::is('admin/facillities/*')) ? 'class=active':''}}><a href="{{route('admin_facillities')}}"><i
                                class="fa fa-cutlery"></i> <span>{{ trans('admin/site.facillitiessnav') }}</span></a>
                </li>
                <li {{ (Request::is('admin/stations/*')) ? 'class=active':''}}><a href="{{route('admin_stations')}}"><i
                                class="fa fa-map-marker"></i> <span>{{ trans('admin/site.stationsnav') }}</span></a>
                </li>
                    <li {{ (Request::is('admin/users/*')) ? 'class=active':''}}><a href="{{route('admin_meal_votes')}}"><i
                                    class="fa fa-star "></i> <span>Βαθμολογίες Γευμάτων</span></a></li>
                    <li {{ (Request::is('admin/users/*')) ? 'class=active':''}}><a href="{{route('admin_users_show')}}"><i
                                    class="fa fa-users"></i> <span>{{ trans('admin/site.users-nav') }}</span></a></li>
                    <li {{ (Request::is('admin/memberships/settings')) ? 'class=active':''}}><a
                                href="{{route('admin_settings')}}"><i
                                    class="fa fa-edit"></i> <span>{{ trans('admin/site.setting') }}</span></a></li>
                @endif
                @if(isStudent($user))
                @if($user != NULL && $user->student_id != NULL)
                    <li {{ (Request::is('student/'.$user->student_id.'/profile')) ? 'class=active':''}}>
                        <a href="{{route('profile',["student_id" => $user->student_id])}}"><i
                            class="fa fa-user"></i> {{ trans('admin/site.profile') }}</a>
                    </li>
                @endif
                <li {{ (Request::is('student/'.$user->student_id.'/profile/edit')) ? 'class=active':''}}><a
                            href="{{route('edit_profile',["studentId" => $user->student_id])}}"><i
                                class="fa fa-edit"></i> <span>{{ trans('admin/site.edit_profile') }}</span></a></li>

                @endif

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('admin/site.home-nav') }}</a></li>
                <li><a href="#">@yield('title')</a></li>

            </ol>
        </section>

        <section class="content">
            @yield('main')
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            iLunch
        </div>
        <strong>Copyright &copy; 2017-2019 <a href="https://oneup.host">ONEUP GROUP</a>.</strong> All rights
        reserved.
    </footer>


    <!-- jQuery 3 -->
    <script src="{{asset("assets/jquery/dist/jquery.js")}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset("assets/bootstrap/dist/js/bootstrap.min.js")}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset("assets/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
    <script src="{{asset("assets/chart.js/Chart.js")}}"></script>
    <!-- FastClick -->

    <!-- AdminLTE App -->
    <script src="{{asset("assets/js/adminlte.min.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("assets/js/demo.js")}}"></script>
    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
    </script>
</div>
@yield('scripts')
</body>
</html>
