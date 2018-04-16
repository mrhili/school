@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')



@endsection

@section('content')

{!! Form::open(['route' => 'configs.store', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')

    <a class="btn btn-danger btn-xs">Delete all</a>
    <br />
    <br />



    <table class="table table-bordered table-striped" id="ads-table">
        <thead>
            <tr>
                <th>Img</th>
                <th>name</th>
                <th>email</th>
                <th>Position</th>
                <th>Phone number</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Del</th>
            </tr>
        </thead>
    </table>



  @endslot


  @slot('footerPlain')



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
    $('#ads-table').DataTable({
        processing: true,
        serverSide: true,

        ajax: '{!! route('users.datatable') !!}',
        columns: [
            { data: 'img', name: 'img' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'lang_lat', name: '' },
            { data: 'phoneNumber', name: 'phoneNumber' },
            { data: 'role', name: 'role' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'del', name: '' },

        ]
    });
});

</script>
@endsection