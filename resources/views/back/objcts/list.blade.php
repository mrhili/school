




@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')

            

            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter un objet</h3>

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
<!--

        Schema::create('objcts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('img')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('state');

            $table->integer('objctype_id')->unsigned()->index();
            $table->foreign('objctype_id')
              ->references('id')
              ->on('objctypes')
              ->onDelete('cascade');

            $table->integer('room_id')->unsigned()->index();
            $table->foreign('room_id')
              ->references('id')
              ->on('rooms')
              ->onDelete('cascade');

            $table->timestamps();
        });

-->
                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'objctype_id', 'type' => 'select', 'selected' => null,'text' => 'Type dobject', 'class'=>'', 'required' => true, 'array' => $objctypes  ,'additionalInfo' => [ 'id' =>  'objctypefield' ]])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'room_id', 'type' => 'select', 'selected' => null,'text' => 'Nom de la chambre', 'class'=>'', 'required' => true, 'array' => $rooms  ,'additionalInfo' => [ 'id' =>  'roomfield' ]])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Type de chambre', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'namefield'] ])
                      </div>
                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'state', 'type' => 'select', 'selected' => null,'text' => '', 'class'=>'', 'required' => true, 'array' => ArrayHolder::states()  ,'additionalInfo' => [ 'id' =>  'statefield' ]])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'desription', 'type' => 'textarea', 'text' => 'Description', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'descriptionfield'] ])
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




<div class="row" id="objcts">


    @foreach( $objcts as $objct  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="widget-user-image">
                {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $objct->name }}</h3>
              @if( $objct->state )
                <h5 class="widget-user-desc">state: {{ ArrayHolder::states( $objct->state ) }}</h5>
              @endif

              <p class="widget-user-desc">Desciption: {{ $objct->description }}</p>
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

var add = $('#add');
var rooms = $('#rooms');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;


          add.on("click", function(e){

            add.attr('disabled', true);

            

            if( $('#form').valid() ){


              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              namefield = $('#namefield').val();
              state = $('#statefield').val();
              room = $('#roomfield').val();
              objctype = $('#objctypefield').val();
              description = $('#descriptionfield').val();
                        

                    
                    

                    axios.post('/store-objct/'+room+'/'+objctype,{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        namefield: namefield,
                        state:state,
                        description:description

                    })
                        .then(function (response) {
                        console.log( response );
                        var returnedArray = response.data;
                        
                        add.attr('disabled', false);
                        

                        rooms.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3><h5 class="widget-user-desc">'+ returnedArray['objctype']+'</h5><h5 class="widget-user-desc">'+ returnedArray['room']+'</h5><h5 class="widget-user-desc">'+ returnedArray['state']+'</h5><p class="widget-user-desc">'+ returnedArray['description']+'</p></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="#">Projects<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div><!--/.widget-user--></div>');

                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        console.log( error );
                        });
                


              }

            });


</script>
@endsection