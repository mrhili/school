@extends('back.layouts.app')

@section('styles')



    <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
      <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">
@endsection

@section('content')

            <form action="{{ route('calendars.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="title">TITLE</label>
                     <input type="text" name="title" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="start">START</label>
                     <input type="datetime-local" name="start_date" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="end">END</label>
                     <input type="datetime-local" name="end_date" class="form-control" value=""/>
                </div>
                    <div class="form-group">
                     <label for="is_all_day">IS_ALL_DAY</label>
                     <input type="text" name="is_all_day" class="form-control" value="0"/>
                </div>
                    <div class="form-group">
                     <label for="background_color">BACKGROUND_COLOR</label>
                     <input type="color" name="background_color" class="form-control" value=""/>
                </div>



            <a class="btn btn-default" href="{{ route('calendars.index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</button>
            </form>






@endsection

@section('datatableScript')



@endsection

@section('scripts')

<script src="{!! asset('adminl/bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/moment/moment.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.js"') !!}"></script>


<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

<!-- SlimScroll -->
<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>


<!-- FastClick -->
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>




@endsection