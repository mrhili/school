@extends('back.layouts.app')

@section('title')
  {{ $student->last_name }} {{ $student->name }} payments
@endsection

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')



@endsection

@section('page_header')
  {{ $student->last_name }} {{ $student->name }} Payments
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }}
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="#">Child payments</a></li>
  </ol>
@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

    {{ $student->last_name }} {{ $student->name }} payments

  @endslot




  @component('back.components.table',['id' => 'payments' ,'columns' => ['Mois', 'Statut']])

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
<script type="text/javascript">

$(function() {
    $('#payments').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('studentspayments.data-child-payments', $student->id ) !!}",
        columns: [

        	{ data: 'month', name: '' },
          { data: 'statut', name: '' }
        ]
    });
});

</script>

<script type="text/javascript">

$( document ).ready(function() {


});


</script>

@endsection
