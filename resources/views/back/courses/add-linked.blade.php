@extends('back.layouts.app')

@section('title')
Ajouter un coure
@endsection

@section('styles')

@if($language == 'ar')

<style>

  textarea, input[type="text"]{
    direction: rtl;
  }

</style>

@endif

@endsection


@section('page_header')
Ajouter un coure
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li><a href="{{ route('classes.list')  }}"><i class="fa fa-dashboard"></i> Classes</a></li>
  <li><a href="{{ route('subjects.by-class', $class->id) }}"><i class="fa fa-dashboard"></i> Classs matierse</a></li>
  <li><a href="{{ route('courses.language-linked',[$class->id, $subject->id]) }}"><i class="fa fa-dashboard"></i> Language</a></li>
  <li class="active"> Ajouter un coure</li>
@endsection



@section('content')

            @component('back.components.collapsed')
              @slot('heading')
                Ajouter un coure
              @endslot
              @slot('id')
                course-form
              @endslot

              <form id="form" class="form-horizontal">


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
      {{ $courses->links() }}
    </div>

  @endslot

  @forelse( $courses as $course  )
    @include('back.partials.user_widget', [
       'img' =>  Html::image( 'images/config/'. GetSetting::getConfig('no-image') ,'No-Image', ['class' => 'img-circle'] ) ,
       'h3' =>   $course->course->name  ,
       'desc' =>   '...',
       'array_of_links' => [
         ['text' => 'suprimer','link' => '#','class' => 'delete','data-id' => '' ]
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
  var subject_id = '{{ $subject->id }}';
  var class_id = '{{ $class->id }}';
  var alertempty = $('#alert-empty');
  var newitems = $('#new-items');
  var schoolLink = "{{ route('index') }}";
  var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";

/******************/
  $teaser = $('.teaser');
  $teaser.hide();

  $teaser_text = $('.teaser_text');
  $teaser_video = $('.teaser_video');

  $teaser_textfield = $('#teaser_textfield');
  $teaser_videofield = $('#teaser_videofield');

  $teaser_text.show();

  $teaserfield = $("#teaserfield");

  $teaserfield.on('change', function(){

    if( $teaserfield.val() == 0 ){
        $teaser.hide();
        $teaser_videofield.val('');
        $teaser_text.show();
    }else if( $teaserfield.val() == 1 ){
        $teaser.hide();
        $teaser_textfield.val('');
        $teaser_video.show();
    }

  });
/*******************/




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
              teaser_text = $teaser_textfield.val();
              teaser_video = $teaser_videofield.val();


                    axios.post('/post-subject-course-linked/'+ class_id +'/'+ subject_id,{
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

                        swal({
                          position: 'top-end',
                          type: 'success',
                          title: 'La class à etait bien crée, Hamdoullah',
                          showConfirmButton: false,
                          timer: 1500
                        })


                        newitems.append('<div class="col-md-4"><div class="box box-widget widget-user-2"><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'<p class="widget-user-desc">...</p></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="/add-subcourse/'+returnedArray['id']+'">add sub course<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div></div>');

                        })
                        .catch(function (error) {
                        add.attr('disabled', false);
                        swal(
                          'Error',
                          error,
                          'error'
                        )
                        console.log( error );
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







/******************************/








});
</script>
@endsection
