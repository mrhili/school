@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')

@endsection

@section('page_header')
  User list
@endsection

@section('page_header_desc')
  ...
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="active"><a href="#">User list</a></li>
  </ol>
@endsection


@section('content')



@component('back.components.plain')

  @slot('titlePlain')

Users

  @endslot


  @slot('sectionPlain')

    @component('back.components.table',['id' => 'table','columns' =>['Nom complet', 'email']])

    @endcomponent


  @endslot



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

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">







$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,

        ajax: '{!! route('users.userlistdata') !!}',
        columns: [
            { data: 'name', name:'name' },
            { data: 'email', name: 'email' }


        ]
    });
});

</script>
@endsection
