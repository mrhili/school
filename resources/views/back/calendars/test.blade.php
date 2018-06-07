@extends('back.layouts.app')

@section('styles')



    <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
      <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">
@endsection

@section('content')





	{!! $calendar->calendar() !!}
	




@endsection

@section('datatableScript')



@endsection

@section('scripts')
<script src="{!! asset('adminl/bower_components/moment/moment.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.js"') !!}"></script>

<!-- SlimScroll -->
<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>


<!-- FastClick -->
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>


{!! $calendar->script() !!}


@endsection