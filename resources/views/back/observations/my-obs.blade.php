@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')



@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')

    <a class="btn btn-danger btn-xs">Delete all</a>
    <br />
    <br />



    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th>Ecrit par</th>
                <th>Titre</th>
                <th>Observation</th>
                <th>Type</th>
                <th>Report</th>
                <th>Delete</th>
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
    $('#table').DataTable({
        processing: true,
        serverSide: true,

        ajax: '{!! route('observations.data-my-obs') !!}',
        columns: [



            { data: 'ecrit_par', name: '' },
            { data: 'titre', name: '' },
            { data: 'observation', name: '' },
            { data: 'type', name: '' },
            { data: 'report', name:'' },
            { data: 'delete', name:'' }


        ]
    });
});




$(document).ready(function(){


$("#table").on("click", ".btn-report", function(){


     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');

              $button.attr('disabled',true);


                axios.post('/reporte-obs/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#report-'+id);
                    $id.text( returnedArray['icon'] );
                    $id.removeClass('btn-danger btn-success btn-info');
                    $id.addClass( 'btn-'+returnedArray['class'] );



                    $button.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });


  });


});

</script>
@endsection