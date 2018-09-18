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
  <link rel="stylesheet" href="{!! asset('perfect-print/perfect-print.css') !!}" type="text/css" media="print" charset="utf-8">

  <style type="text/css" media="print">




  /* Print styling */



  .page-break {
      page-break-after: always;
  }


  </style>

  <style>


  /* Double-color dashed line */

  hr.style-three {
      border: 0;
      border-bottom: 1px dashed #ccc;
      background: #999;
  }
  </style>

@yield('styles')
</head>

<body>




  @yield('content')

  <scrip src="{!! asset('helpers/for-print.js') !!}"></script>

    <!-- jQuery 3 -->
  <script src="{!! asset('adminl/bower_components/jquery/dist/jquery.min.js') !!}"></script>


  @yield('scripts')


  <script>

  $(document).ready(function(){
    if( $('.printnow').length){
        //your code goes here

        $('.printnow').click(function(){
          window.print();
        });


    }
  });




  </script>
</body>
