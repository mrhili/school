
@extends('back.layouts.app')

@section('title')
   Preperfication '{{ $preperfication->title}}' pour la class {{ $preperfication->teatchification->subject_class->the_class->name }} et la matiére {{ $preperfication->teatchification->subject_class->subject->name }}
@endsection

@section('page_header')
  Preperfication '{{ $preperfication->title}}' pour la class {{ $preperfication->teatchification->subject_class->the_class->name }} et la matiére {{ $preperfication->teatchification->subject_class->subject->name }}

@endsection

@section('page_header_desc')
  Preperfication '{{ $preperfication->title}}' pour la class {{ $preperfication->teatchification->subject_class->the_class->name }} et la matiére {{ $preperfication->teatchification->subject_class->subject->name }}

@endsection



@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('content')











@component('back.components.plain')
  @slot('titlePlain')
    Les nouveau items
  @endslot

  @component('back.components.table', ['columns' => ['Etudiant', 'Present', 'Compris']])

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
        ajax: "{!! route('preperfications.manage-data', $preperfication->title ) !!}",
        columns: [

            { data: 'student', name: '' },

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



            $('#table').on('click', '.btn-present', function(e){

              e.preventDefault();

              var id =$(this).attr('data-id');
              axios.post('/preperfication-switch-present/'+ id,{
               headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }
                })
                  .then(function (response) {
                    var retArray = response.data;

                    $('#present-'+id).removeClass('btn-success btn-danger btn-warning btn-default');
                    $('#present-'+id).addClass('btn-'+retArray['class']);
                    $('#present-'+id).html();
                    $('#present-'+id).html( retArray['icon']);

                    swal({
                      position: 'top-end',
                      type: 'success',
                      title: 'Changé',
                      showConfirmButton: false,
                      timer: 1500
                    });
                  })
                  .catch(function (error) {

                    $(this).attr('disabled',false);

                    swal(
                      'Non Changé',
                      'EssayEncore une fois',
                      'error'
                    );
                  });

            });

            $('#table').on('click', '.btn-get-it', function(e){

              e.preventDefault();

              var id =$(this).attr('data-id');
              axios.post('/preperfication-switch-get-it/'+ id,{
               headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }
                })
                  .then(function (response) {
                    var retArray = response.data;

                    $('#get-it-'+id).removeClass('btn-success btn-danger btn-warning btn-default');
                    $('#get-it-'+id).addClass('btn-'+retArray['class']);
                    $('#get-it-'+id).html();
                    $('#get-it-'+id).html( retArray['icon']);

                    swal({
                      position: 'top-end',
                      type: 'success',
                      title: 'Changé',
                      showConfirmButton: false,
                      timer: 1500
                    });
                  })
                  .catch(function (error) {

                    $(this).attr('disabled',false);

                    swal(
                      'Non Changé',
                      'EssayEncore une fois',
                      'error'
                    );
                  });

            });





});
</script>
@endsection
