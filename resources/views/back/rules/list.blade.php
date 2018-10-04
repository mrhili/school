
@extends('back.layouts.app')

@section('title')
  Ajouter une loi
@endsection

@section('page_header')
  Ajouter une loi
@endsection

@section('page_header_desc')
  Ajouter une loi
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active">  Ajouter une loi</li>
@endsection

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('content')

            @component('back.components.collapsed')
              @slot('heading')
                  Ajouter une loi
              @endslot

              @slot('id')
                adding
              @endslot


              <form id="form" class="form-horizontal">


                  <div class="col-xs-12">
                    @include('back.partials.formG', ['name' => 'rule', 'type' => 'text', 'text' => 'Une loi', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'rule'] ])
                  </div>

                  <div class="col-xs-12">
                    @include('back.partials.formG', ['name' => 'take', 'type' => 'checkbox', 'text' => 'Prise', 'class'=>'', 'required' => false, 'checked' => false,'additionalInfo' => ['id' => 'take']])
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

  @component('back.components.table', ['columns' => ['Rule', 'Active', 'Delete']])

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
        ajax: "{!! route('rules.data-list' ) !!}",
        columns: [

            { data: 'rule', name: 'rule' },
            { data: 'active', name: '' },
            { data: 'delete', name: '' }
        ]
    });
});
</script>
<script type="text/javascript">


$(document).ready(function(){
var add = $('#add');


var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note;

          add.on("click", function(e){

            add.attr('disabled', true);

            if( $('#form').valid() ){

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();


                    axios.post('/store-rule',{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        rule : $('#rule').val(),
                        take : $('#take').prop('checked', true)

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
                              "rule" : response.data['rule'] ,
                              "active" : (response.data['active'] ? "active" : "desactivate"),
                              "delete" : (response.data['active'] ? "active" : "desactivate"),
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



  $('#table').on('click', '.btn-activate', function(e){

    e.preventDefault();

    var id =$(this).attr('data-id');
    axios.post('/switch-active-rule/'+ id,{
     headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

              }
      })
        .then(function (response) {
          var retArray = response.data;

          $('#activate-'+id).removeClass('btn-success btn-danger btn-default btn-warning');
          $('#activate-'+id).addClass('btn-'+ retArray['class']);
          $('#activate-'+id).html(retArray['icon']);

          swal({
            position: 'top-end',
            type: 'success',
            title: 'Changé',
            showConfirmButton: false,
            timer: 1500
          })
        })
        .catch(function (error) {

          $(this).attr('disabled',false);

          swal(
            'Non changé',
            'Encore une fois',
            'error'
          )
        });

  });





    $('#table').on('click', '.btn-delete', function(e){

      e.preventDefault();

      var id =$(this).attr('data-id');
      axios.post('/delete-rule/'+ id,{
       headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }
        })
          .then(function (response) {
            var retArray = response.data;

            $('#delete-'+id).parent().parent().remove();

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
