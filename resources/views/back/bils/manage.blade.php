


@extends('back.layouts.app')

@section('title')
Biling management
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
                @include('back.partials.formG', ['name' => 'bil_id', 'type' => 'text', 'text' => 'Nom du service', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'service'] ])
                </div>

                <div class="col-xs-12">
                @include('back.partials.formG', ['name' => 'price', 'type' => 'number', 'text' => 'Prix', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'price'] ])
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
      {{ $bils->links() }}
    </div>

  @endslot

  @forelse( $bils as $bil  )
    @include('back.partials.user_widget', [
       'img' =>  Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) ,
       'h3' =>   $bil->name  ,
       'desc' =>   $bil->price,
       'array_of_links' => [
         ['text' => 'suprimer','link' => '#','class' => 'delete','data-id' => $bil->id ]
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
var service = $('#service');
var price = $('#price');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;

          add.on("click", function(e){

            add.attr('disabled', true);

            if( $('#form').valid() ){

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();

                    axios.post('/bils-post',{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        service:service.val(),
                        price:price.val()


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
