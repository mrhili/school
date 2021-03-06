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

                <th>Name</th>

                <th>Object</th>
                <th>Body</th>
                <th>Temps du meting</th>
                <th>Fin du meeting</th>
                <th>La place</th>


                <th>Invitation par</th>
                <th>Note</th>
                <th>Presence</th>
            </tr>
        </thead>
    </table>








        <div class="modal fade" id="modalnote">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <form id="form">
              <div class="modal-body">

              	<div class="col-xs-12 hidden">

                  @include('back.partials.formG', ['name' => 'idfield', 'type' => 'text', 'text' => '', 'class'=>'hidden', 'required' => true, 'additionalInfo' => ['id' =>  'idfield'] ])
                </div>
                  


                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'notefield', 'type' => 'textarea', 'text' => 'Ta note', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'notefield'] ])
                  </div>






                  <div class="clearfix"></div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button id="send-formnote" type="button" class="btn btn-primary">Modifié</button>

              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


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
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script type="text/javascript">







$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,

        ajax: '{!! route('meetings.data-mine') !!}',
        columns: [

            { data: 'name', name: '' },
            
            { data: 'object', name: '' },
            { data: 'body', name: '' },
            { data: 'time', name: '' },
            { data: 'end_time', name: '' },
            { data: 'place', name: '' },
            { data: 'invitation_par', name: '' },
            { data: 'note', name: '' },
            { data: 'presence', name: '' }


        ]
    });
});



$( document ).ready(function() {

    
	$("#table").on("click", ".btn-note", function(){
	   // your code goes here
	   			$button = $(this)
	            id = $(this).attr('data-id');
	            //idOf = $(this).attr('id');
	            //month = $(this).attr('data-month');
	            $button.attr('disabled',true);


                axios.get('/see-note/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);
                    $('#notefield').val(returnedArray['note']);
                    $('#idfield').val(returnedArray['id']);



                    $button.attr('disabled',false);
                    $('#modalnote').modal('show');
                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);

                    alert(error);
                    console.log( error );
                  });



	});
/********************************/





var sendformnote = $('#send-formnote');



sendformnote.on("click", function(e){



if( $('#form').valid() ){
              sendformnote.attr('disabled', true);
              
              note = $('#notefield').val();

              
              id = $('#idfield').val();


              axios.post('/modify-note/'+id,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                note: note

              })
                .then(function (response) {
                  sendformnote.attr('disabled', false);
                  $('#modalpayment').modal('hide');
                  
                  var returnedArray = response.data;
                  console.log(returnedArray);

                })
                .catch(function (error) {
                  sendformnote.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}

  }); 





/*****************************/

});

/**************/




</script>
@endsection