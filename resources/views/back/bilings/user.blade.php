


@extends('back.layouts.app')

@section('title')
Biling Pour
@endsection

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('page_header')
Biling Pour
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> Biling management</li>
@endsection

@section('content')



@component('back.components.plain')
  @slot('titlePlain')
    Les items
  @endslot



  @component('back.components.table',['columns' =>  $columns ])

  @endcomponent




@endcomponent




@endsection

@section('datatableScript')

  <script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>

@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>


<script type="text/javascript">
$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('bilings.user-data', $user ) !!}",
        columns: [

            { data: 'service', name: '' },
            { data: 'price', name: '' },
            { data: 'toke', name: '' },
            { data: 'payed', name: '' },
            @if( Auth::user()->role == 2 || Auth::user()->role > 3 )
              { data: 'refused', name: '' }
            @endif

        ]
    });
});

</script>

<script type="text/javascript">

$( document ).ready(function() {

  $("#table").on("click", ".btn-toke", function(e){

              e.preventDefault();
     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');



              $button.attr('disabled',true);


                axios.post('/switch-toke-biling/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#toke-'+id);
                    $id.text( returnedArray['icon'] );
                    $id.removeClass('btn-danger btn-success');
                    $id.addClass( returnedArray['class'] );

                    $button.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });



  });


  $("#table").on("click", ".btn-payed", function(e){

              e.preventDefault();
     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');

              $button.attr('disabled',true);


                axios.post('/switch-payed-biling/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#payed-'+id);
                    $id.text( returnedArray['icon'] );
                    $id.removeClass('btn-danger btn-success');
                    $id.addClass( returnedArray['class'] );

                    $button.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });



  });




    $("#table").on("click", ".btn-refuse", function(e){

                e.preventDefault();
       // your code goes here
                $button = $(this)

                id = $button.attr('data-id');

                $button.attr('disabled',true);


                  axios.post('/refuse-biling/'+id,{
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                  })
                    .then(function (response) {


                      $('#refuse-'+ id).parent().parent().remove();

                      swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Bien refusé',
                        showConfirmButton: false,
                        timer: 1500
                      });

                    })
                    .catch(function (error) {

                      $button.attr('disabled',false);


                      swal({
                        position: 'top-end',
                        type: 'error',
                        title: 'Répéte une autre fois',
                        showConfirmButton: false,
                        timer: 1500
                      });
                    });



    });




});

</script>


@endsection
