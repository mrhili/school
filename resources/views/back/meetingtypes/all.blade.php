




@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')

            

            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter un Meeting type</h3>

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

                      @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Nom de meeting', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'namefield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'roles', 'type' => 'select', 'selected' => null , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::roles() ,'additionalInfo' => [  

                          'id' =>  'rolesfield',
                          'name' => 'roles[]',
                          'multiple' => 'multiple'

                       ]])

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




<div class="row" id="meetingtypes">


    @foreach( $meetingtypes as $meetingtype  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="widget-user-image">
                {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $meetingtype->name }}</h3>

@php

  $rolesDecode = json_decode( $meetingtype->roles, true );
  $roles = [];

    foreach ($rolesDecode as $value) {
      # code...

      array_push($roles ,  Illuminate\Support\Str::plural(ArrayHolder::roles( (int) $value ) ) );

    }

@endphp
              <h5 class="widget-user-desc">roles appelé: {{ implode(", ", $roles ) }}</h5>
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
var meetingtypes = $('#meetingtypes');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note;

var meetingtype_names = JSON.parse('{!! $meetingtype_names !!}');




          add.on("click", function(e){

            add.attr('disabled', true);

            

            if( $('#form').valid() ){

              

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              namefield = $('#namefield').val();
              rolesfield = $('#rolesfield').val();
              if( $.inArray( Number( namefield) , meetingtype_names ) == -1 ){
 

                    axios.post('/store-meetingtype',{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        namefield: namefield,
                        roles: JSON.stringify(rolesfield)

                    })
                        .then(function (response) {
                        console.log( response );
                        
                        var returnedArray = response.data;
                        meetingtype_names.push( Number( returnedArray['name'] ) );
                        add.attr('disabled', false);

                        var roles = JSON.parse( returnedArray['roles'] ) ;

                        meetingtypes.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3><h5 class="widget-user-desc">roles appelé: '+ roles.join(', ') +'</h5></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="#">Projects<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div><!--/.widget-user--></div>');

                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        console.log( error );
                        });
                
                
                
                }else{
                    add.attr('disabled', false);
                        swal({
                        type: 'error',
                        title: 'nom de meetingtype deja existe',
                        text: 'Entre un autre nom',
                        footer: '<a href>Why do I have this issue?</a>',
                        });
                    
                }

              }

            });


</script>
@endsection