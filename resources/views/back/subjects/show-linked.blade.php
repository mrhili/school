@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')

@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

    Tests

  @endslot


  @slot('sectionPlain')


    <div class="table-responsive no-padding">

      @component('back.components.table', ['columns' => [
        'matiére', 'Test','Type de test',  'Teatcher', 'Course', 'Publié',
        'Date de fin', 'Navigation', 'Cette un exercice', 'Regardé le test', 'Notes'
        ]])

      @endcomponent

    </div>


  @endslot


@endcomponent

{{--
@component('back.components.plain')

  @slot('titlePlain')

    Tests

  @endslot


  @slot('sectionPlain')


    <div class="table-responsive no-padding">

      @component('back.components.table', ['columns' => []])

      @endcomponent

    </div>


  @endslot


@endcomponent

--}}


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

  var subclass_id = '{{ $subclass->id }}';
  var year = {{ Session::get('yearId') }};


$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,

        ajax: "{!! route('subjectclasses.tests', $subclass->id  ) !!}",
        columns: [
            { data: 'subject_id', name: '' },
            { data: 'test_id', name: '' },
            { data: 'kind', name: '' },
            { data: 'teatcher_id', name: '' },
            { data: 'course_id', name: '' },
            { data: 'publish', name: '' },
            { data: 'end', name: '' },
            { data: 'navigator', name: '' },
            { data: 'is_exercise', name: '' },
            { data: 'show', name: '' },
            { data: 'notes', name: '' },

        ]
    });
});
/*
$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,


        columns: [
            { data: 'subject_id', name: '' },
            { data: 'test_id', name: '' },
            { data: 'teatcher_id', name: '' },
            { data: 'course_id', name: '' },
            { data: 'publish', name: '' },
            { data: 'end', name: '' },
            { data: 'navigator', name: '' },
            { data: 'is_exercise', name: '' }
        ]
    });
});
*/
</script>

<script type="text/javascript">


$( document ).ready(function() {

});



</script>
@endsection
