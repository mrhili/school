@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')



@endsection

@section('content')

  @component('back.components.plain')

    @slot('titlePlain')

      Notes

    @endslot


    @component('back.components.table', ['columns' => ['Leleve', 'Vu', 'Passé en minutes', 'note', 'Bien passé', 'Modifié'] ])

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

<script type="text/javascript">

$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,

        ajax: "{!! route('notes.data-by-tysc', $tysc->id ) !!}",
        columns: [
          { data: 'student_id', name: '' },
        	{ data: 'seen', name: '' },
          { data: 'test_passed_fine', name: '' },
          { data: 'note', name: '' },
          { data: 'done_minutes', name: '' },
          { data: 'modify', name: '' }

        ]
    });
});

</script>

@endsection
