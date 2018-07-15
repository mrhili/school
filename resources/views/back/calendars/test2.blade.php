@extends('back.layouts.app')

@section('styles')



    <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
      <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">
@endsection

@section('content')


        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green">Lunch</div>
                <div class="external-event bg-yellow">Go home</div>
                <div class="external-event bg-aqua">Do homework</div>
                <div class="external-event bg-light-blue">Work on UI design</div>
                <div class="external-event bg-red">Sleep tight</div>
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Create Event</h3>
            </div>
            <div class="box-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                <div class="input-group-btn">
                  <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                </div>
                <!-- /btn-group -->
              </div>
              <!-- /input-group -->
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding calendarparent">
              <!-- THE CALENDAR -->

              {!! $calendar->calendar() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->


	
	




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

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
{!! $calendar->script() !!}

<script type="text/javascript">
$(document).ready(function(){

      axios.get('/get-rep-cal').then(function(response){
        var ev = {};
        returned = response.data ;
        console.log( response.data);
        for (var item in returned) {

          console.log( returned[item].title );

          ev.title = returned[item].title;
          ev.allDay = Boolean( returned[item].is_all_day );
          ev.dow = returned[item].dow;
          ev.url = '';
          ev.color = returned[item].background_color;
          ev.start = moment( returned[item].start_date);
          ev.end = moment( returned[item].end_date);

        }
        console.log(ev);
        calendar.fullCalendar( "renderEvent", ev );
        /*
        for (var item in returned) {

          ev.title = returned[item].title;
          ev.allDay = Boolean( returned[item].is_all_day );
          ev.dow = returned[item].dow;
          ev.url = '';
          ev.color = returned[item].background_color;
          ev.start = moment( returned[item].start_date);
          ev.end = moment( returned[item].end_date);

        }

        console.log(ev);
        calendar.fullCalendar( "renderEvent", ev );
        */
      });

      var myEvent = 
      {
        title:"my new event",
        allDay: false,
        start: moment(),
        end: moment().add(60, 'minutes'),
        url: 'google.com',
        color: '#fe7',
        dow: [1,2]
      };

      calendar.fullCalendar( "renderEvent", myEvent );

});


</script>




@endsection