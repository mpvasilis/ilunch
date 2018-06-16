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
<body class="hold-transition login-page" data-gr-c-s-loaded="true">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>iLunch</b>Manager</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  
    <p class="login-box-msg">Sign in to start your session</p>
    @yield('main')
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>


</body>