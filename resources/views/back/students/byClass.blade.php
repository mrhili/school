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

    <h4>Pour bien comprendre le tableau</h4>
    <a class="btn btn-danger btn-xs">Nombre de paiment quil doit en dirham à l'école</a>
    <a class="btn btn-success btn-xs">Il ne doit rien a lécole</a>
    <br />
    <br />

<div class="table-responsive no-padding">

    <table class="table table-bordered table-striped" id="by-class-table">
        <thead>
            <tr>
                <th>id</th>
                <th>nomcomplet</th>

                <th>Frais d'enregistement</th>
                <th>Frais d'assurence</th>

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
                <h4 class="modal-title">Ajouter un payment sur l'etudiant: <span id='nomcompletmodal'></span></h4>
              </div>
              <div class="modal-body">

                  {{ csrf_field() }}

                  @include('back.partials.formG', ['name' => 'payment', 'type' => 'number', 'text' => 'Combien ?', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'paymentfield'] ])


                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])

                  {{--hoofield array user or exterior--}}

                  @include('back.partials.formG', ['name' => 'hoo', 'type' => 'select', 'selected' => 'exterior' ,'text' => 'Qui va payé?', 'class'=>'', 'required' => true, 'array' => [ 'user' => 'quelqun déja enregistrer', 'exterior' => 'quelqun de nouveau' ]  ,'additionalInfo' => ['id' => 'hoofield']])

                  {{-- users array --}}

                  @include('back.partials.formG', ['name' => 'users', 'type' => 'select', 'selected' => null,'text' => 'Les gens déja enregistrer', 'class'=>'hidden', 'required' => true, 'array' => $users  ,'additionalInfo' => ['id' => 'usersfield']])

                  {{-- info G151515 if exterior --}}

                  @include('back.partials.formG', ['name' => 'exteriorName', 'type' => 'text', 'text' => 'Nom complet', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'exteriornamefield'] ])

                  @include('back.partials.formG', ['name' => 'cin', 'type' => 'text', 'text' => 'Numero de carte national', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'exteriorinfofield'] ])

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
                <button type="button" id="send-formpayment" class="btn btn-success">Save changes</button>
              </div>
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
<script type="text/javascript">







$(function() {
    $('#by-class-table').DataTable({
        processing: true,
        serverSide: true,
        fnInitComplete: function(oSettings, json) {







    
          var id, idOf, ad, statu_value, payment, month, comment, hoofield, users, user, exteriorinfo, exteriorname, exteriornamefield, exteriorinfos;
          var year = {{ Session::get('yearId') }};
          var theclass = {{ $class->id }};

          $('.btn-pay').click(function(){



            hoofield = $('#hoofield');
            user = $('#usersfield');
            exteriorinfos = $('#exteriorinfofield');
            exteriornamefield = $('#exteriornamefield');

            hoofield.change(function() {

                user.toggleClass('hidden');
                exteriorinfos.toggleClass('hidden');
                exteriornamefield.toggleClass('hidden');

            });




            id = $(this).attr('data-id');
            idOf = $(this).attr('id');
            month = $(this).attr('data-month');


            $('#modalpayment').modal('show');

            var sendformpayment = $('#send-formpayment');

            sendformpayment.attr('disabled', false);

            sendformpayment.click(function(){

              sendformpayment.attr('disabled', true);
              
              payment = $('#paymentfield').val();
              
              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              hoo = $('#hoofield').val();

              users = $('#usersfield').val();
              exteriorinfo = $('#exteriorinfofield').val();
              exteriorname = $('#exteriornamefield').val();

              axios.post('/add-payment-student/'+id+'/'+payment+'/'+month+'/'+year+'/'+theclass,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: comment,
                hidden_note: hidden_note,
                hoo: hoo,
                by_user: users,
                by_exterior_name: exteriorname,
                by_exterior_info: exteriorinfo,

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
            });



          });


















    },
        initComplete: function(settings, json) {



          /*
          var id, ad, statu_value;
          $('.btn-click').click(function(){

            id = $(this).attr('id');

              axios.get('/ads/'+id+'/get')
                .then(function (response) {

                  ad = response.data;

                  $('#modal').find('.modal-title').text(ad.title);
                  $('#modal').find('.price').text(ad.price);
                  $('#modal').find('.size_land').text(ad.size_land);
                  $('#modal').find('.floor_number').text(ad.floor_number);
                  $('#modal').find('.rooms').text(ad.rooms);
                  $('#modal').find('.apart_number').text(ad.apart_number);
                  $('#modal').find('.bathrooms').text(ad.bathrooms);
                  $('#modal').find('.kitchens').text(ad.kitchens);
                  $('#modal').find('.livingrooms').text(ad.livingrooms);
                  $('#modal').find('.garages').text(ad.garages);
                  $('#modal').find('.position').text(ad.position);
                  $('#modal').find('.cat').text(ad.cat);
                  $('#modal').find('.cat_business').text(ad.cat_business);
                  $('#modal').find('.cat_land').text(ad.cat_land);
                  $('#modal').find('.cat_roof').text(ad.cat_roof);
                  $('#modal').find('.disc').text(ad.disc);
                  $('#modal').find('.vue').text(ad.vue);
                  $('#modal').find('.status').find('option[value="'+ ad.status +'"]').attr('selected', 'selected');
                  $('#modal').find('.created_at').text(ad.created_at);
                  $('#modal').find('.updated_at').text(ad.updated_at);

                  $('#modal').modal('show');

                  $('#send-form').click(function(){

                      statu_value = $('#modal').find('.status').val();

                      axios({
                          method: 'put',
                          url: '/ads/'+id+'/change-status',
                          data: {
                            status: statu_value,
                            id: id
                          }
                        })
                        .then(function (response) {
                          $('#modal').find('.status').find('option[value="'+ statu_value +'"]').attr('selected', 'selected');
                          console.log(response);
                        })
                        .catch(function (error) {
                          console.log(error);
                        });

                  });

                  console.log(response);
                })
                .catch(function (error) {
                  console.log(error);
                });

            

            
          });

          */


        },
        ajax: "{!! route('students.data-by-class', $class->id ) !!}",
        columns: [


            { data: 'id', name: 'id' },
            { data: 'nomcomplet', name: '' },
            { data: 'saving', name: '' },
            { data: 'assurence', name: '' },
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

    
alert('mouah');

});



</script>
@endsection