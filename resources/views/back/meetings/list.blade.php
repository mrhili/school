




@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')

            

            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter un type de meeting</h3>

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

                      @include('back.partials.formG', ['name' => 'meetingtype_id', 'type' => 'select', 'selected' => null,'text' => 'Type de meeting', 'class'=>'', 'required' => true, 'array' => $meetingtypes  ,'additionalInfo' => [ 'id' =>  'meetingtypefield' ]])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Nom de meting', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'namefield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'object', 'type' => 'text', 'text' => 'Object', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'objectfield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'body', 'type' => 'textarea', 'text' => 'Body', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'bodyfield'] ])
                      </div>



                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'date', 'type' => 'datetime-local', 'text' => 'quand', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'timefield' ]])
                      </div>


                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'placefield', 'type' => 'text', 'text' => 'La place du meeting', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'placefield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'checktime', 'type' => 'checkbox', 'text' => 'Changer minutes par date??', 'class'=>'minute-check', 'required' => false, 'checked' => false,'additionalInfo' => [ 'id' => 'checktime' ]])

                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'date_end', 'type' => 'number', 'text' => 'quand va finir par minutes', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'number_endfield' ]])

                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'date_end', 'type' => 'datetime-local', 'text' => 'quand va finir', 'class'=>'', 'required' => false,'additionalInfo' => [ 'id' => 'time_endfield' ]])

                      
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




<div class="row" id="meetings">


    @foreach( $meetings as $meeting  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="widget-user-image">
                {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $meeting->name }}</h3>
              <h5 class="widget-user-desc">espace: {{ $meeting->object }}</h5>
              <h5 class="widget-user-desc">espace: {{ $meeting->meetingtype_id }}</h5>
              <p class="widget-user-desc">Desciption: {{ $meeting->body }}</p>
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
var meetings = $('#meetings');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;


          add.on("click", function(e){

            add.attr('disabled', true);

            

            if( $('#form').valid() ){

              

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              namefield = $('#namefield').val();
              meetingtype = $('#meetingtypefield').val();
              object = $('#objectfield').val();
              body = $('#bodyfield').val();
              place = $('#placefield').val();
              time = $('#timefield').val();

              if( window.numberTimeActive ){

                kindTimeEnd = 'number';
                time_end = $('#number_endfield').val();

              }else{

                kindTimeEnd = 'time';
                time_end = $('#time_endfield').val();

              }


                        

                    
                    

                    axios.post('/store-meeting/'+meetingtype,{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        namefield: namefield,
                        meetingtype_id:meetingtype,
                        object:object,
                        body:body,
                        place: place,
                        time:time,
                        kindTimeEnd:kindTimeEnd,
                        time_end:time_end

                    })
                        .then(function (response) {
                        console.log( response );
                        var returnedArray = response.data;
                        
                        add.attr('disabled', false);
                        

                        meetings.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3><h5 class="widget-user-desc">'+ returnedArray['object']+'</h5><h5 class="widget-user-desc">'+ returnedArray['meetingtype_id']+'</h5><h5 class="widget-user-desc">'+ returnedArray['meetingtype']+'</h5><p class="widget-user-desc">'+ returnedArray['body']+'</p></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="#">Projects<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div><!--/.widget-user--></div>');

                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        console.log( error );
                        });
                


              }

            });


$(document).ready(function(){

  window.numberTimeActive = true;

  $timeEndField = $('#time_endfield');

  $numberEndField = $('#number_endfield');

  $timeEndField.hide();

  $checkTime = $('#checktime');

  $checkTime.change(function() {

    if(this.checked) {

        window.numberTimeActive = false;

        $numberEndField.hide();
        $timeEndField.show();

        $numberEndField.attr('required', false);
        $timeEndField.attr('required', true );

    }else{

      window.numberTimeActive = true;

      $numberEndField.show();
      $timeEndField.hide();

      $numberEndField.attr('required', true);
      $timeEndField.attr('required', false );

    }
  });

});


</script>
@endsection