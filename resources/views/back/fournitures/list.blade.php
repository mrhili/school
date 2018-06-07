




@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')

            

            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter une fourniture</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->

              </div>
              <!-- /.box-header -->
            <div class="box-body" id="sbject-form">

                  <form id="form">

                      <div class="form-group col-xs-12">
                      {{ csrf_field() }}
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Nom de fourniture', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'namefield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'additional_info', 'type' => 'text', 'text' => 'Additional information', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'infofield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'for', 'type' => 'text', 'text' => 'lutilisation de la fourniture', 'class'=>'', 'required' => 'false', 'additionalInfo' => ['id' =>  'forfield'] ])
                      </div>
                      
                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'required', 'type' => 'checkbox', 'text' => 'Importante ?', 'class'=>'', 'required' => true, 'checked' => true ,'additionalInfo' => [ 'id' => 'requiredfield']])
                      </div>
                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'average_price', 'type' => 'number', 'text' => 'Le prix de cette fourniture dans le marché', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'pricefield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                      </div>

                      <div class="col-xs-12">

                          <button  type="button" class="btn btn-primary" id="add" >Enregistrer</button>
                      </div>

                  </form>



            </div>
            <!-- /.box-body -->
          </div>




<div class="row" id="fournitures">


    @foreach( $fournitures as $fourniture  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="widget-user-image">
                {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $fourniture->name }}</h3>
              <h5 class="widget-user-desc">prix: {{ $fourniture->average_price }}</h5>
              <h5 class="widget-user-desc">pour: {{ $fourniture->for }}</h5>
              <h5 class="widget-user-desc">{{ ($fourniture->required? 'nécessaire': 'pas trop nécessaire' ) }}</h5>
              <p class="widget-user-desc">info: {{ $fourniture->additional_info }}</p>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

    @endforeach

</div>




@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')

                  
  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')



@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>

<script type="text/javascript">

var addSubject = $('#add');
var subjects = $('#fournitures');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;



          addSubject.on("click", function(e){

            addSubject.attr('disabled', true);


            if( $('#form').valid() ){


              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              name = $('#namefield').val();
              additional_info = $('#infofield').val();
              forfield = $('#forfield').val();
              required = $('#requiredfield').is(":checked");
              average_price = $('#pricefield').val();

              axios.post('/store-fourniture',{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: comment,
                hidden_note: hidden_note,
                name: name,
                additional_info: additional_info,
                forfield: forfield,
                required: required,
                average_price: average_price

              })
                .then(function (response) {
                  console.log( response );
                  addSubject.attr('disabled', false);
                  
                  var returnedArray = response.data;

                  var necessary;
                  if(returnedArray['required']){

                      necessary = 'necessaire';

                  }else{
                    necessary = 'pas trop necessaire';
                  }

                  subjects.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3><h5 class="widget-user-desc">prix: '+ returnedArray['average_price']+'</h5><h5 class="widget-user-desc">pour: '+ returnedArray['for']+'</h5><h5 class="widget-user-desc">'+ necessary+'</h5><p class="widget-user-desc">info: '+ returnedArray['additional_info']+'</p></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="#">Projects<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div><!--/.widget-user--></div>');

                })
                .catch(function (error) {
                  addSubject.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

              }

            });


</script>
@endsection