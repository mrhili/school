
@extends('back.layouts.app')

@section('title')
   Preperfications de {{ $student->full_name }}
@endsection

@section('page_header')
  Preperfications de {{ $student->full_name }}
@endsection

@section('page_header_desc')
  Preperfications de {{ $student->full_name }}
@endsection



@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('content')











@component('back.components.plain')
  @slot('titlePlain')
    Les nouveau items
  @endslot

  @component('back.components.table', ['columns' => ['Maitre', 'Matiére', 'Present', 'Compris']])

  @endcomponent




@endcomponent


@endsection

@section('datatableScript')

<!-- DataTables -->
<script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>


<!-- SlimScroll -->
<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>


<!-- FastClick -->
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>
<script type="text/javascript">
$(function() {
    window.table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('preperfications.data-student', $student->id ) !!}",
        columns: [

            { data: 'teatcher', name: '' },

            { data: 'subject', name: '' },
            { data: 'present', name: '' },
            { data: 'get_it', name: '' }
        ]
    });
});
</script>
<script type="text/javascript">


$(document).ready(function(){




var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";








});
</script>
@endsection
