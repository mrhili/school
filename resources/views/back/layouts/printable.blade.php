<html>
<head>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ GetSetting::getConfig('site-name') }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/font-awesome/css/font-awesome.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('harjita/herjita.css') !!}" type="text/css" media="print" charset="utf-8">

  <style>
  .page-break {
      page-break-after: always;
  }
  </style>
</head>

<body>

  @yield('content')

</body>
