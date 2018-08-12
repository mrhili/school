



@extends('back.layouts.app')


@section('styles')



@endsection

@section('content')



            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter un coure</h3>

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

                      @include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Nom de meting', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'namefield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'objective', 'type' => 'textarea', 'text' => 'Objectives du coure', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'objectivefield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'introduction', 'type' => 'textarea', 'text' => 'Une petite introduction', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'introductionfield'] ])
                      </div>

                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'content', 'type' => 'textarea', 'text' => 'Le content', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'contentfield'] ])
                      </div>



                      <div class="col-xs-12">

                      @include('back.partials.formG', ['name' => 'teaser', 'type' => 'select', 'selected' => 0,'text' => 'Type de teaser', 'class'=>'', 'required' => true, 'array' => ArrayHolder::teaserTypes()  ,'additionalInfo' => ['id' =>  'teaserfield']])

                      </div>

                      <div class="col-xs-12 teaser teaser_text">

                      @include('back.partials.formG', ['name' => 'teaser_text', 'type' => 'textarea', 'text' => 'Un petit teaser', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'teaser_textfield'] ])

                      </div>

                      <div class="col-xs-12 teaser teaser_video">

                      @include('back.partials.formG', ['name' => 'teaser_video', 'type' => 'url', 'text' => 'Un petit teaser', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'teaser_videofield'] ])

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




<div class="row" id="courses">


    @foreach( $courses as $course  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="widget-user-image">
                {!! Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) !!}
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $course->name }}</h3>
              <p class="widget-user-desc">...</p>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">

              @foreach( $course->subcourses as $subcourse )
                  <li><a href="#">{{ $subcourse->pivot->sorting }} - {{ $subcourse->title }} <span class="pull-right badge bg-blue">+</span></a></li>
              @endforeach



                <li><a href="{{ route('subcourses.add-link', $course->id ) }}">Add sub course <span class="pull-right badge bg-blue">+</span></a></li>
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
$(document).ready(function(){
  $teaser = $('.teaser');
  $teaser.hide();

  $teaser_text = $('.teaser_text');
  $teaser_video = $('.teaser_video');

  $teaser_text.show();

  $teaserfield = $("#teaserfield");

  $teaserfield.on('change', function(){

    if( $teaserfield.val() == 0 ){
        $teaser.hide();
        $teaser_text.show();
    }else if( $teaserfield.val() == 1 ){
        $teaser.hide();
        $teaser_video.show();
    }

  });


/*****************************/






var add = $('#add');
var courses = $('#courses');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var comment, hidden_note, name;


          add.on("click", function(e){

            add.attr('disabled', true);



            if( $('#form').valid() ){

/**/

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              namefield = $('#namefield').val();
              objective = $('#objectivefield').val();
              introduction = $('#introductionfield').val();
              content = $('#contentfield').val();
              teaser = $('#teaserfield').val();
              teaser_text = $('#teaser_textfield').val();
              teaser_video = $('#teaser_videofield').val();








                    axios.post('/store-course/',{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        namefield: namefield,
                        objective: objective,
                        introduction: introduction,
                        content: content,
                        teaser: teaser,
                        teaser_text: teaser_text,
                        teaser_video: teaser_video

                    })
                        .then(function (response) {
                        console.log( response );
                        var returnedArray = response.data;

                        add.attr('disabled', false);


                        courses.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'<p class="widget-user-desc">...</p></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="/add-subcourse/'+returnedArray['id']+'">add sub course<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div><!--/.widget-user--></div>');

                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        alert(error);
                        console.log( error );
                        });



              }

            });



/*******************************************/








});


/*
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
*/

</script>
@endsection
