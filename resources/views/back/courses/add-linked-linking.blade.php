@extends('back.layouts.app')

@section('title')
Linké un coure
@endsection

@section('styles')


@endsection


@section('page_header')
Linké un coure au Class : {{ $class->name }} et au Matiére : {{ $subject->name }}
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li><a href="{{ route('classes.list')  }}"><i class="fa fa-dashboard"></i> Classes</a></li>
  <li><a href="{{ route('subjects.by-class', $class->id) }}"><i class="fa fa-dashboard"></i> Classs matierse</a></li>
  <li class="active"> Linké un coure au class: {{ $class->name }}</li>
@endsection



@section('content')

            @component('back.components.collapsed')
              @slot('heading')
                Linké un coure au Class : {{ $class->name }} et au Matiére : {{ $subject->name }}
              @endslot
              @slot('id')
                course-form
              @endslot

              <form id="form" class="form-horizontal">


                                      <div class="col-xs-12">

                                        @include('back.partials.formG', ['name' => 'test', 'type' => 'select', 'selected' => null,'text' => 'Ajouter une coure à cette matiére', 'class'=>'', 'required' => true, 'array' => $coursesArray  ,'additionalInfo' => ['id' =>  'coursefield']])


                                      </div>






                                      <div class="col-xs-12">

                                      @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                                      </div>

                                      <div class="col-xs-12">

                                      @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                                      </div>


                                      <div class="col-xs-12">
                                        @if( Auth::user()->role >= 4 )
                                          @include('back.partials.formG', ['name' => 'publish', 'type' => 'checkbox', 'text' => 'Publier le test maintenent pour les éléve', 'class'=>'', 'required' => false, 'checked' => true,'additionalInfo' => [ 'id' => 'publishfield' ]])
                                        @else
                                          @include('back.partials.formG', ['name' => 'publish', 'type' => 'checkbox', 'text' => 'Publier le test maintenent pour les éléve', 'class'=>' hidden', 'required' => false, 'checked' => false,'additionalInfo' => [ 'id' => 'publishfield'  ]])
                                        @endif
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
//teasering
/*******************/




          add.on("click", function(e){

            add.attr('disabled', true);

            if( $('#form').valid() ){

/**/

              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();


              course = $('#coursefield').val();
              publish = $('#publishfield').val();



                    axios.post('/post-subject-course-linked-linking/'+course+'/'+ class_id +'/'+ subject_id,{
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        comment: comment,
                        hidden_note: hidden_note,
                        publish:publish

                    })
                        .then(function (response) {
                        console.log( response );
                        var returnedArray = response.data;

                        add.attr('disabled', false);

                        swal({
                          position: 'top-end',
                          type: 'success',
                          title: 'La class à etait bien Linké, Hamdoullah',
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
