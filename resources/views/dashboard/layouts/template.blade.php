<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iLunch Dashboard - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="{{url('/css/front.css')}}">
    <script type="text/javascript"
            src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')}}"></script>
    <script type="text/javascript"
            src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>
    @yield('head')
</head>
<body>
<header>
    <div class="brand">iLunch</div>
    <div class="address-bar">Διαχειρηστης Φοιτητικης Λεσχης</div>
    <div id="flags" class="text-center"></div>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">iLunch</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li {{ (Request::is('/')) ? 'class=active':''}}>
                        <a href="{{route('index')}}">HOME</a>
                    </li>
                    <li {{ (Request::is('dashboard')) ? 'class=active':''}}>
                        <a href="{{route('dashboard')}}">DASHBOARD</a>
                    </li>
                    <li {{ (Request::is('dashboard/about')) ? 'class=active':''}}>
                        <a href="{{route('about')}}">ABOUT</a>
                    </li>
                    <li {{ (Request::is('dashboard/calendar')) ? 'class=active':''}}>
                        <a href="{{route('calendar')}}">CALENDAR</a>
                    </li>
                    <li {{ (Request::is('contact')) ? 'class=active':''}}>
                        <a href="/contact">CONTACT</a>
                    </li>
                    @if(!Auth::check())
                        <li {{ (Request::is('login')) ? 'class=active':''}} style="position: absolute;right: 5%">
                            <a href="{{url('/login')}}">login</a>
                        </li>
                    @else
                        <li class="dropdown" style="position: absolute;right: 5%;padding: 0.5% 0;">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">{{ $user->name }} <b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if($user->role != NULL && $user->role != 'STUDENT')
                                    <li><a href="{{route('admin')}}">Admin Panel</a></li>
                                @endif
                                @if($user->student_id != NULL)
                                    <li><a href="{{route('profile',["student_id" => $user->student_id])}}">Student
                                            Profile</a></li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('header')
</header>

<main class="container">
    @yield('main')
</main>

<footer>
    @yield('footer')
    <p class="text-center">
        <small>Copyright &copy; 2017 iLunch<span style="font-size: 50%;">v{{config('app.version')}}</span></small>
        <br>
        <small><a href="#">Terms of Use</a> - <a href="#">Privacy Policy</a> - <a href="{{url('/about')}}">About</a> -
            <a href="{{url('/api')}}">API</a></small>
    </p>
</footer>
@yield('scripts')

</body>
</html>