@extends('back.layouts.app')

@section('title')
  Notes du classs
@endsection

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection


@section('styles')



@endsection




@section('page_header')
  Notes du classs
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }} / class séléctionée: {{ $class->name }}
@endsection

@section('breadcrumbXXXX')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
  </ol>
@endsection



@section('content')

@component('back.components.plain')

  @slot('titlePlain')
    Notes des éléves du class {{ $class->name }}
  @endslot



  @component('back.components.table',['columns' => $columns])

  @endcomponent

@endcomponent


@endsection

@section('datatableScript')

  <script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>

@endsection




@section('scripts')

  <script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

<!-- Morris.js charts -->

<script src="{!! asset('axios/axios.min.js') !!}"></script>

<script type="text/javascript">


          var year = {{ Session::get('yearId') }};
          var theclass = {{ $class->id }};



$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,

        ajax: "{!! route('notes.data-by-class', $class->id ) !!}",
        columns: [

            @foreach ($ajax as $value)
              { data: '{{ $value }}', name: '' },
            @endforeach


        ]
    });
});

</script>


@endsection
