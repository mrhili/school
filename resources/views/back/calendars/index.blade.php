@extends('back.layouts.app')

@section('styles')



    <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
      <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">
@endsection

@section('content')

<a class="btn btn-success" href="{{ route('calendars.create') }}">Create</a>


<table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>START</th>
                        <th>END</th>
                        <th>IS_ALL_DAY</th>
                        <th>BACKGROUND_COLOR</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($calendar_events as $calendar_event)
                <tr>
                    <td>{{$calendar_event->id}}</td>
                    <td>{{$calendar_event->title}}</td>
                    <td>{{$calendar_event->start}}</td>
                    <td>{{$calendar_event->end}}</td>
                    <td>{{$calendar_event->is_all_day}}</td>
                    <td>{{$calendar_event->background_color}}</td>

                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ route('calendars.show', $calendar_event->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ route('calendars.edit', $calendar_event->id) }}">Edit</a>
                        <form action="{{ route('calendars.destroy', $calendar_event->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>






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