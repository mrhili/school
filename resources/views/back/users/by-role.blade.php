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

    <h4>Pour bien comprendre le tableau</h4>
    <a class="btn btn-danger btn-xs">Nombre de paiment que l'ecole doit pour lui</a>
    <a class="btn btn-success btn-xs">lécole ne doit rien pour lui</a>
    <a class="btn btn-warning btn-xs">Combien il doit pour l'école</a>
    <br />
    <br />

<div class="table-responsive no-padding">

    <table class="table table-bordered table-striped" id="by-role-table">
        <thead>
            <tr>
                <th>id</th>
                <th>nomcomplet</th>

                <th>septembre</th>
                <th>octobre</th>
                <th>novembre</th>
                <th>decembre</th>
                <th>janvier</th>
                <th>fevrier</th>
                <th>mars</th>
                <th>avril</th>
                <th>mai</th>
                <th>juin</th>
                <th>action</th>
            </tr>
        </thead>
    </table>

</div>

        <div class="modal fade" id="modalpayment">
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

                  @include('back.partials.formG', ['name' => 'payment', 'type' => 'number', 'text' => 'Combien ?', 'class'=>' to-validate', 'required' => true, 'additionalInfo' => ['id' =>  'paymentfield'] ])
                  </div>
                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>' to-validate', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>' to-validate', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                  </div>
                  <div class="col-xs-12">
                  {{--hoofield array user or exterior--}}


                  @include('back.partials.formG', ['name' => 'paymentmethod', 'type' => 'select', 'selected' => 'exterior' ,'text' => 'Qui va payé?', 'class'=>' to-validate', 'required' => true, 'array' => ArrayHolder::paymentMethods()  ,'additionalInfo' => ['id' => 'hoofield']])

                  </div>

                  <div class="clearfix"></div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button id="send-formpayment" type="button" class="btn btn-primary">Payé</button>

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

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script type="text/javascript">

    
          var id, idOf, ad, statu_value, payment, month, comment, hoofield, users, user, exteriorinfo, exteriorname, exteriornamefield, exteriorinfos, paymentmethod;
          var year = {{ Session::get('yearId') }};






$(function() {
    $('#by-role-table').DataTable({
        processing: true,
        serverSide: true,
        fnInitComplete: function(oSettings, json) {
    },
        initComplete: function(settings, json) {


        },
        ajax: "{!! route('users.data-by-role', $role ) !!}",
        columns: [


            { data: 'id', name: 'id' },
            { data: 'nomcomplet', name: '' },
            { data: 'septembre', name: '' },
            { data: 'octobre', name: '' },
            { data: 'novembre', name: '' },
            { data: 'decembre', name: '' },
            { data: 'janvier', name: '' },
            { data: 'fevrier', name: '' },
            { data: 'mars', name: '' },
            { data: 'avril', name: '' },
            { data: 'mai', name: '' },
            { data: 'juin', name: '' },

            { data: 'action', name: '' }
        ]
    });
});

</script>

<script type="text/javascript">
  
$( document ).ready(function() {

    
$("#by-role-table").on("click", ".btn-pay", function(){
   // your code goes here

            id = $(this).attr('data-id');
            idOf = $(this).attr('id');
            month = $(this).attr('data-month');


            $('#modalpayment').modal('show');



});


var hoofield = $('#hoofield');
var user = $('#usersfield');
var exteriorinfos = $('#exteriorinfofield');
var exteriornamefield = $('#exteriornamefield');




var sendformpayment = $('#send-formpayment');



sendformpayment.on("click", function(e){



if( $('#form').valid() ){

              sendformpayment.attr('disabled', false);



              sendformpayment.attr('disabled', true);
              
              payment = $('#paymentfield').val();


              
              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();

              paymentmethod = $('#paymentmethod').val();


              axios.post('/add-payment-user/'+id+'/'+payment+'/'+month+'/'+year,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: comment,
                hidden_note: hidden_note,
                paymentmethod: paymentmethod

              })
                .then(function (response) {
                  sendformpayment.attr('disabled', false);
                  $('#modalpayment').modal('hide');
                  
                  var returnedArray = response.data;
                  console.log(returnedArray);
                  var selectedButton = $('#'+idOf);

                  selectedButton.text(returnedArray['money']);
                  selectedButton.removeClass('btn-success btn-danger');
                  selectedButton.addClass('btn-'+returnedArray['class']);

                })
                .catch(function (error) {
                  sendformpayment.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}

  }); 

});



</script>
@endsection