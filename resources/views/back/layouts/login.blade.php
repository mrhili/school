

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">
<head>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ GetSetting::getConfig('site-name') }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/font-awesome/css/font-awesome.min.css') !!}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/Ionicons/css/ionicons.min.css') !!}">

  @yield('datatableCss')


  <!-- Theme style -->
  <link rel="stylesheet" href="{!! asset('adminl/dist/css/AdminLTE.min.css') !!}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{!! asset('adminl/dist/css/skins/skin-blue.min.css') !!}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="{!! asset('adminl/plugins/iCheck/square/blue.css') !!}">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  @yield('styles')


</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('index') }}">{{ GetSetting::getConfig('site-name') }}</a>
  </div>
  <!-- /.login-logo -->


  @yield('content')



  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{!! asset('adminl/bower_components/jquery/dist/jquery.min.js') !!}"></script>

@yield('beforeBootstrap')
<!-- Bootstrap 3.3.7 -->
<script src="{!! asset('adminl/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

@yield('datatableScript')




<!-- AdminLTE App -->
<script src="{!! asset('adminl/dist/js/adminlte.min.js') !!}"></script>
<script src="{!! asset('adminl/plugins/iCheck/icheck.min.js') !!}"></script>





<script src="{!! asset('application/js/common.js') !!}"></script>

@include('sweetalert::alert')



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->




<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>


@yield('scripts')

</body>
</html>
