<html>
<head>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ GetSetting::getConfig('site-name') }} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" media="all">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/font-awesome/css/font-awesome.min.css') !!}" media="all">

  <link rel="stylesheet" href="{!! asset('bootstrap-print/bootstrap-print.css') !!}" type="text/css" media="print" charset="utf-8">

  <style type="text/css" media="print">




  /* Print styling */



  .page-break {
      page-break-after: always;
  }


  </style>
</head>

<body>

  <nav class="navbar navbar-fixed-top hidden-print">
    <div class="container">
      <ul class="nav navbar-nav">
        <li class=""><button class="btn btn-primary printnow"><i class="fa fa-print"></i> Imprimer</button></li>
      </ul>
      <ul class="nav navbar-right">
        <li class=""><a href="{{ route('students.profile', $student->id ) }}" class="btn btn-primary"><i class="fa fa-user"></i> Continuer vers son profile</a></li>
      </ul>

    </div>
  </nav>


  @yield('content')

  <scrip src="{!! asset('helpers/for-print.js') !!}"></script>

    <!-- jQuery 3 -->
  <script src="{!! asset('adminl/bower_components/jquery/dist/jquery.min.js') !!}"></script>


  @yield('scripts')
</body>
