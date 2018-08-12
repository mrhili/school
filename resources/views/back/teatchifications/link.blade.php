


@extends('back.layouts.app')

@section('title')
Linker un maitre
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
  <li class="active"> Linker un maitre</li>
@endsection

@section('content')

            @component('back.components.collapsed')
              @slot('heading')
                Linker un maitre
              @endslot
              @slot('id')
                sbject-form
              @endslot

              <form id="form" class="form-horizontal">


                  <div class="col-xs-12">
                    @include('back.partials.formG', ['name' => 'teatcher', 'type' => 'select', 'selected' => null ,'text' => 'Maitres', 'class'=>'', 'required' => true, 'array' => $teatchers  ,'additionalInfo' => [ 'id' => 'teatcher']])

                  </div>


                  <div class="col-xs-12">
                    @include('back.partials.formG', ['name' => 'subject_class', 'type' => 'select', 'selected' => null,'text' => 'Class => Matiére', 'class'=>'', 'required' => true, 'array' => $selection  ,'additionalInfo' => [ 'id' => 'subject' ]])
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

  @slot('footerPlain')

    <div class="col-xs-12 text-center">
      {{ $teatchifications->links() }}
    </div>

  @endslot

  @forelse( $teatchifications as $teatchification  )
    @include('back.partials.user_widget', [
       'img' =>  Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) ,
       'h3' =>   $teatchification->subject_class->the_class->name  .'=>'.  $teatchification->subject_class->subject->name  ,
       'desc' =>   $teatchification->teatcher->name,
       'array_of_links' => [
         ['text' => 'suprimer','link' => '#','class' => 'delete','data-id' => $teatchification->id ]
       ]
     ])

  @empty

    <div class="alert alert-warning" role="alert">Vide</div>

  @endforelse


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



@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>

<script type="text/javascript">
$(document).ready(function(){
var add = $('#add');
var alertempty = $('#alert-empty');
var newitems = $('#new-items');
var teatcher = $('#teatcher');
var subject = $('#subject');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;

          add.on("click", function(e){

            add.attr('disabled', true);

            if( $('#form').valid() ){

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              teatcher_id = teatcher.val();
              subject_id = subject.val();

                    axios.put('/store-link-teatcher-subcourse-class/'+ teatcher_id +'/'+ subject_id,{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note

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
