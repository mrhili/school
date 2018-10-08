
@extends('back.layouts.app')

@section('title')
  Mes Preperfications pour la class {{ $teatchification->subject_class->the_class->name }} et la matiére {{ $teatchification->subject_class->subject->name }}
@endsection

@section('page_header')
  Mes Preperfications pour la class {{ $teatchification->subject_class->the_class->name }} et la matiére {{ $teatchification->subject_class->subject->name }}

@endsection

@section('page_header_desc')
  Mes Preperfications pour la class {{ $teatchification->subject_class->the_class->name }} et la matiére {{ $teatchification->subject_class->subject->name }}

@endsection



@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('content')

            @component('back.components.collapsed')
              @slot('heading')
                  Ajouter une Preperfication
              @endslot

              @slot('id')
                adding
              @endslot


              <form id="form" class="form-horizontal">


                  <div class="col-xs-12">
                    @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Titre', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'title'] ])
                  </div>

                  <div class="col-xs-12">
                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                  </div>

                  <hr />
                  <div class="col-xs-12">
                  <div class="form-group">

                        <button  type="button" class="btn btn-primary pull-right" id="add" >Enregistrer</button>

                    </div>
                    </div>

              </form>

            @endcomponent










@component('back.components.plain')
  @slot('titlePlain')
    Les nouveau items
  @endslot

  @component('back.components.table', ['columns' => ['Titre', 'Manage', 'Delete']])

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
        ajax: "{!! route('preperfications.by-teatchification', $teatchification->id ) !!}",
        columns: [

            { data: 'title', name: 'title' },
            { data: 'manage', name: '' },
            { data: 'delete', name: '' }
        ]
    });
});
</script>
<script type="text/javascript">


$(document).ready(function(){
var add = $('#add');


var teatchification_id = '{{ $teatchification->id }}';


var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note;

          add.on("click", function(e){

            add.attr('disabled', true);

            if( $('#form').valid() ){

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();


                    axios.post('/new-preperfication/'+teatchification_id,{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        title: $('#title').val(),
                        comment: comment,
                        hidden_note: hidden_note

                    })
                        .then(function (response) {

                          swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Bien ajouté',
                            showConfirmButton: false,
                            timer: 1500
                          });


                          window.table.row.add( [
                            {
                              "id" : response.data['id'],
                              "title" : response.data['title'] ,
                              "delete" : 'delete',
                              "manage" : 'manage',
                              "created_at" : Date.now(),
                              "updated_at" : Date.now()
                            }

                          ] ).draw( false );

                        console.log( response );
                        var returnedArray = response.data;

                        add.attr('disabled', false);



                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        swal(
                          'Error',
                          error,
                          'error'
                        )
                        });

              }else{
                add.attr('disabled', false);

                swal(
                  'Formulaire incoreecte!',
                  'Formulaire incoreecte!',
                  'error'
                )
              }

            });






                        $('#table').on('click', '.btn-delete', function(e){

                          e.preventDefault();

                          var title = $(this).attr('data-id');


                          axios.post('/delete-preperfication/',{

                           headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                                    },
                                    title:title
                            })
                              .then(function (response) {
                                var retArray = response.data;

                                $( '.btn-delete[data-id="'+ title +'"]' ).parent().parent().remove();

                                swal({
                                  position: 'top-end',
                                  type: 'success',
                                  title: 'Suprimé',
                                  showConfirmButton: false,
                                  timer: 1500
                                });
                              })
                              .catch(function (error) {

                                $(this).attr('disabled',false);

                                swal(
                                  'Non Suprimé',
                                  'EssayEncore une fois',
                                  'error'
                                );
                              });

                        });







});
</script>
@endsection
