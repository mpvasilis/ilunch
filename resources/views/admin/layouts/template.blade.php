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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url("assets/css/skins/_all-skins.min.css")}}" media="all">


    @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('admin') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>iL</b>@</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>iLunch</b>Admin</span>
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
                    <li><a href="{{route('index')}}"><i class="fa fa-home"></i>Site</a></li>
                    <li><a href="{{route('dashboard')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-arrow-circle-down"></i>
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>({{Auth::user()->email}})</small>
                                    {{ Auth::user()->role }}
                                    <small>Registered {{humanTiming(Auth::user()->created_at)}} ago</small>
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
                                        <button type="submit" class="btn btn-default btn-flat">Sign out</button>
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

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                <li {{ (Request::is('admin')) ? 'class=active':''}}><a href="{{route('admin')}}"><i
                                class="fa fa-home"></i> <span>Σχετικά</span></a></li>
                <li {{ (Request::is('admin/meals')) ? 'class=active':''}}><a href="{{route('admin_meals')}}"><i
                                class="fa fa-apple"></i> <span>Γεύματα</span></a></li>
                <li {{ (Request::is('admin/announcements')) ? 'class=active':''}}><a
                            href="{{route('admin_announcements')}}"><i class="fa fa-bullhorn"></i>
                        <span>Ανακοινώσεις</span></a>
                </li>
                <li {{ (Request::is('admin/statistics')) ? 'class=active':''}}><a
                            href="{{route('admin_statistics')}}"><i class="fa fa-area-chart"></i>
                        <span>Στατιστικά</span></a></li>
                <li {{ (Request::is('admin/feedback')) ? 'class=active':''}}><a href="{{route('admin_feedback')}}"><i
                                class="fa fa-circle-o"></i> <span>Feedback</span></a></li>
                <li {{ (Request::is('admin/students')) ? 'class=active':''}}><a href="{{route('admin_students')}}"><i
                                class="fa fa-book"></i> <span>Students</span></a></li>

                <li class="treeview {{ (Request::is('admin/memberships/*')) ? 'active menu-open':''}}">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Συνδρομές</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li {{ (Request::is('admin/memberships/show')) ? 'class=active':''}}><a
                                    href="{{route('admin_memberships_show')}}"><i class="fa fa-th-list"></i> Λίστα
                                Συνδρομών</a>
                        </li>
                        <li {{ (Request::is('admin/memberships/create')) ? 'class=active':''}}><a
                                    href="{{route('admin_memberships_create')}}"><i class="fa fa-plus-square-o"></i>
                                Προσθήκη Νέας Συνδρομής</a></li>
                    </ul>
                </li>
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
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">@yield('title')</a></li>

            </ol>
        </section>

        <section class="content">
            @yield('main')
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            iLunch<span style="font-size: 50%;">v{{config('app.version')}}
                ({{ Config::get('app.env') }})</span>
        </div>
        <strong>Copyright &copy; 2017-2018 <a href="https://oneup.host">ONEUP GROUP</a>.</strong> All rights
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
