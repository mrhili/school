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


<div class="table-responsive no-padding">

    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th>nom de fourniture</th>
                <th>prix dans le marché</th>
                <th>plus d'information</th>
                <th>pour</th>
                <th>importante</th>
                <th>exist</th>
                <th>statu</th>

                <th>demander</th>
            </tr>
        </thead>
    </table>

</div>





  @endslot







  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Default Modal</h4>
        </div>
        <form id="form">
        <div class="modal-body">


            <div class="form-group col-xs-12">
            {{ csrf_field() }}
            </div>
            <div class="col-xs-12">

            @include('back.partials.formG', ['name' => 'homany', 'type' => 'number', 'text' => 'Combien ?', 'class'=>' to-validate', 'required' => true, 'additionalInfo' => ['id' =>  'howmanyfield'] ])
            </div>
            <div class="col-xs-12">

            @include('back.partials.formG', ['name' => 'message', 'type' => 'textarea', 'text' => 'Message', 'class'=>' to-validate', 'required' => false, 'additionalInfo' => ['id' =>  'messagefield'] ])
            </div>

            <div class="col-xs-12">

            @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>' to-validate', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
            </div>
            <div class="col-xs-12">
            {{--hoofield array user or exterior--}}

            </div>


            <div class="clearfix"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button id="send-demande" type="button" class="btn btn-primary">Demander</button>

        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->









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
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('fournitures.data-child-fournitures', $child->id ) !!}",
        columns: [

        	{ data: 'name', name: '' },
          { data: 'average_price', name: '' },
          { data: 'additional_info', name: '' },
          { data: 'for', name: '' },
          { data: 'required', name: '' },
          { data: 'exist', name: '' },
          { data: 'statu', name: '' },
          { data: 'got', name: '' }
        ]
    });
});

</script>

<script type="text/javascript">

$( document ).ready(function() {

  $("#table").on("click", ".btn-exist", function(){


     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');



              $button.attr('disabled',true);


                axios.post('/switch-exist-fourniture/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#exist-'+id);
                    $statu = $('#statu-'+id);
                    $id.text( returnedArray['icon'] );
                    $id.removeClass('btn-danger btn-success');
                    $id.addClass( returnedArray['class'] );
                    $statu.text(returnedArray['statu']);

                    $button.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });



  });
/*****************************/



var child =  '{{ $child->id }}';




$("#table").on("click", ".btn-demande", function(){
   // your code goes here
   function justNum(string){

 			cleanId = string.replace(/[^0-9]/gi, '');
 			cleanId = parseInt(cleanId, 10);

 			return cleanId;

 	}
            $this = $(this);

            id = $this.attr('data-id');

            window.founiture = id;

            $howmanyfield = $('#howmanyfield');

            $howmanyfield.attr('min', 1);
            maxhowmany = Number(  justNum(  $this.text()  ) );
            $howmanyfield.attr('max', maxhowmany  );

            window.maxhowmany = maxhowmany;

            //$('#modal').modal('show');

});



$('#howmanyfield').keyup(function() {

  if(  Number ($(this).val() ) > window.maxhowmany ){
      $(this).val( window.maxhowmany );
      swal({
        position: 'top-end',
        type: 'error',
        title: 'Tu peux pas demander plus que : ' + window.maxhowmany,
        showConfirmButton: false,
        timer: 1500
      })

  }

});

var senddemande = $('#send-demande');



senddemande.on("click", function(e){



if( $('#form').valid() ){

              senddemande.attr('disabled', true);

              howmany = $('#howmanyfield').val();
              message = $('#messagefield').val();
              hidden_note = $('#hiddennotefield').val();

              axios.post('/fourniture-demande/'+child+'/'+ window.founiture +'/'+ howmany,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                message: message,
                hidden_note: hidden_note

              })
                .then(function (response) {
                  senddemande.attr('disabled', false);
                  $('#modal').modal('hide');

                  var returnedArray = response.data;
                  console.log(returnedArray);

                  swal(
                    'La demande a etait effectué',
                    returnedArray['howmany'] +'piece de '+ returnedArray['name']
                      +', tu doit payé : ' + returnedArray['totalmoney'] + 'dh',
                    'success'
                  )

                })
                .catch(function (error) {
                  senddemande.attr('disabled', false);
                  swal(
                    'La demande netait pas effectué',
                    error,
                    'error'
                  )
                  console.log( error );
                });

}




});


});


</script>

@endsection
