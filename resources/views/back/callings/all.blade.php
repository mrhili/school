



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

<div class="table-responsive no-padding">

    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th>Important</th>
                <th>Appeler par</th>
                <th>Le parent</th>
                <th>Les dates choisie par l'administration</th>
                <th>Objet</th>
                <th>Vue</th>
                <th>La date choisie</th>
                <th>Autre date choisie</th>
                <th>Refusée</th>
                <th>a propos de refuje</th>
                <th>Terminé</th>
                <th>Resultat</th>
                <th>Editer</th>

            </tr>
        </thead>
    </table>


</div>
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

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script type="text/javascript">







$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,

        ajax: '{!! route('callings.data-all') !!}',
        columns: [
            { data: 'required', name: '' },
            { data: 'caller', name: '' },
            { data: 'called', name: '' },
            { data: 'times', name:'' },
            { data: 'object', name: 'object' },

            { data: 'vue', name:'' },
            { data: 'choosen_time', name: '' },
            { data: 'other_choosen_time', name: '' },
            { data: 'refused', name: '' },
            { data: 'disagrement', name: '' },
            { data: 'terminated', name: '' },
            { data: 'result', name:'' },
            { data: 'action', name:'' }




        ]
    });
});




$(document).ready(function(){


$("#table").on("click", ".btn-terminated", function(){


     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');

              $button.attr('disabled',true);


                axios.post('/switch-terminated-calling/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#terminated-'+id);
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

//$($0).on('blur',function(){ alert('moua');});
$("#table").on("blur", ".text-result", function(){


     // your code goes here
              $txt = $(this);

              id = $txt.attr('data-id');

              $txt.attr('disabled',true);


                axios.post('/write-result-calling/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  text: $txt.attr('value')

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);


                      $txt.attr('value', returnedArray['text'] );



                    $txt.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $txt.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });


  });




  $("#table").on("click", ".btn-delete", function(){


       // your code goes here
                $button = $(this);

                id = $button.attr('data-id');

                $button.attr('disabled',true);


                  axios.get('/delete-calling/'+id,{
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                  })
                    .then(function (response) {
                      var returnedArray = response.data;
                      console.log(returnedArray);

                      if(returnedArray['success']){
                          $button.parent().parent().remove();
                      }else{
                        alert('repeate again');
                      }

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
