


@extends('back.layouts.app')

@section('title')
Add deficite
@endsection

@section('page_header')
Linker un maitre
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> Add deficite</li>
@endsection

@section('content')

            @component('back.components.collapsed')
              @slot('heading')
                Add deficite
              @endslot
              @slot('id')
                sbject-form
              @endslot

              <form id="form" class="form-horizontal">


                  <div class="col-xs-12">
                    @include('back.partials.formG', ['name' => 'types', 'type' => 'select', 'selected' => null ,'text' => 'Types', 'class'=>'', 'required' => true, 'array' => $types  ,'additionalInfo' => [ 'id' => 'types']])

                  </div>


                  <div class="col-xs-12">
                    @include('back.partials.formG', ['name' => 'id_model', 'type' => 'select', 'selected' => null,'text' => 'Class => Matiére', 'class'=>'', 'required' => true, 'array' => $models  ,'additionalInfo' => [ 'id' => 'id_model' ]])
                  </div>

                  <div class="col-xs-12">
                  @include('back.partials.formG', ['name' => 'price', 'type' => 'number', 'text' => 'Prix', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'price'] ])
                  </div>


                  <div class="col-xs-12">
                  @include('back.partials.formG', ['name' => 'reason', 'type' => 'text', 'text' => 'Reson', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'reason'] ])
                  </div>

                  <div class="col-xs-12">
                  @include('back.partials.formG', ['name' => 'paid', 'type' => 'checkbox', 'text' => 'Payé', 'class'=>'', 'required' => false, 'checked' => false,'additionalInfo' => [ 'id' => 'paid' ]  ])
                  </div>


                  <div class="col-xs-12">
                  @include('back.partials.formG', ['name' => 'return', 'type' => 'text', 'text' => 'Return', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'return'] ])
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


@endsection



@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>

<script type="text/javascript">
$(document).ready(function(){
var add = $('#add');
var alertempty = $('#alert-empty');

var subject = $('#subject');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;

          add.on("click", function(e){

            add.attr('disabled', true);

            if( $('#form').valid() ){

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              subject_id = subject.val();

                    axios.post('/store-deficite',{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        type: $('#types').val(),
                        id_model: $('#id_model').val(),
                        reason: $('#reason').val(),
                        price: $('#price').val(),
                        paid: $('#paid').is(':checked'),
                        return: $('#return').val()

                    })
                        .then(function (response) {

                          swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Le maitre à etait bien linké, Hamdoullah',
                            showConfirmButton: false,
                            timer: 1500
                          })

                        console.log( response );
                        var returnedArray = response.data;

                        add.attr('disabled', false);

                        alertempty.hide();

                        newitems.append('\
                        <div class="col-md-4">\
                          <div class="box box-widget widget-user-2">\
                            <div class="widget-user-header bg-'+ randombgcolor() +'">\
                              <div class="widget-user-image">\
                                <img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar">\
                              </div>\
                                <h3 class="widget-user-username">'+ returnedArray['class']+' => '+ returnedArray['subject']+'</h3>\
                                <h5 class="widget-user-desc">'+ returnedArray['teatcher']+'</h5>\
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
