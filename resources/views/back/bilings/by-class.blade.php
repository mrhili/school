


@extends('back.layouts.app')

@section('title')
Biling management
@endsection

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('page_header')
Biling management
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

            @component('back.components.collapsed')
              @slot('heading')
                Biling management
              @endslot
              @slot('id')
                biling-form
              @endslot

              <form id="form" class="form-horizontal">

                <div class="col-xs-12">
                  @include('back.partials.formG', ['name' => 'bil', 'type' => 'select', 'selected' => null ,'text' => 'Biling', 'class'=>'', 'required' => true, 'array' => $bils  ,'additionalInfo' => [ 'id' => 'bil']])

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
    Les items
  @endslot



  @component('back.components.table',['columns' => ['complet_name', 'bilings']])

  @endcomponent




@endcomponent

@component('back.components.plain')
  @slot('titlePlain')
    Les nouveau items
  @endslot

  <div id="new-items">

    <div id="alert-empty" class="alert alert-warning" role="alert">Vide</div>

  </div>


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
        ajax: "{!! route('bilings.data-by-class', $class ) !!}",
        columns: [

            { data: 'complet_name', name: '' },
            { data: 'bilings', name: '' }
        ]
    });
});

</script>


<script type="text/javascript">

$(document).ready(function(){
var add = $('#add');
var the_class = '{{ $class->id }}';
var alertempty = $('#alert-empty');
var newitems = $('#new-items');

var bil = $('#bil');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;

          add.on("click", function(e){

            add.attr('disabled', true);

            if( $('#form').valid() ){

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();


                    axios.post('/generate-biling-to-class/'+ the_class,{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        bil:bil.val()


                    })
                        .then(function (response) {

                          swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Le Bil bien ajouté',
                            showConfirmButton: false,
                            timer: 1500
                          })

                        console.log( response );
                        var returnedArray = response.data;

                        $("#subject option[value='"+returnedArray['id']+"']").remove();

                        add.attr('disabled', false);

                        alertempty.hide();

                        newitems.append('\
                        <div class="col-md-4">\
                          <div class="box box-widget widget-user-2">\
                            <div class="widget-user-header bg-'+ randombgcolor() +'">\
                              <div class="widget-user-image">\
                                <img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar">\
                              </div>\
                                <h3 class="widget-user-username">'+  returnedArray['service']+'</h3>\
                                <h5 class="widget-user-desc">Prix: '+ returnedArray['price']+'</h5>\
                            </div>\
                            <div class="box-footer no-padding">\
                            </div>\
                          </div>\
                        </div>');

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
});
</script>
@endsection
