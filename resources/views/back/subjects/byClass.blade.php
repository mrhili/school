
@extends('back.layouts.app')


@section('styles')



@endsection



@section('content')



            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter une matiére à cette class</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->

              </div>
              <!-- /.box-header -->
            <div class="box-body">

              <form id="form">


                  <div class="form-group col-xs-12">
                  {{ csrf_field() }}
                  </div>
                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'subject', 'type' => 'select', 'selected' => null,'text' => 'Ajouter une matiére à cette class', 'class'=>'', 'required' => true, 'array' => $subjectsArray  ,'additionalInfo' => ['id' =>  'subjectfield']])
                  </div>

                  <div class="col-xs-12">
                  @include('back.partials.formG', ['name' => 'parameter', 'type' => 'number', 'text' => 'Coéficien', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'parameterfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                  </div>

                  <div class="col-xs-12">

                      <button  type="button" class="btn btn-primary" id="add-subject" >Enregistrer</button>
                  </div>



              </form>


            </div>
            <!-- /.box-body -->
          </div>




<div class="row" id="subjects">


    @foreach( $subjects as $subject  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $subject->name }}</h3>
              <h5 class="widget-user-desc">Coéfficient: {{ $subject->pivot->parameter }}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="{{ route('subjects.show-linked',[$class->id,$subject->id]) }}">Voire</a></li>

                <li><a href="{{ route('tests.types', [$class->id,$subject->id]) }}">Click pour ajouter un test <span class="pull-right badge bg-aqua">+</span></a></li>

                <li><a href="{{ route('tests.add-linked-linking',[$class->id,$subject->id]) }}">Clicker ici pour linker un test <span class="pull-right badge bg-green">V</span></a></li>

                <li><a href="{{ route('courses.language-linked',[$class->id,$subject->id]) }}">Click pour ajouter un Coure <span class="pull-right badge bg-aqua">+</span></a></li>

                <li><a href="{{ route('courses.add-linked-linking',[$class->id,$subject->id]) }}">Clicker ici pour linker un Coure <span class="pull-right badge bg-green">V</span></a></li>

                @if(Relation::if_teatcher_responsable($class,$subject, Auth::user() )  )
                  <li><a href="{{ route('preperfications.mine-by-sub-class',[$class->id,$subject->id]) }}">Ajouter une preperfication <span class="pull-right badge bg-green">+</span></a></li>
                  <li><a href="{{ route('preperfications.mine-by-sub-class',[$class->id,$subject->id]) }}">Ajouter des Notes <span class="pull-right badge bg-green">+</span></a></li>
                @endif


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

<script type="text/javascript">

var addSubject = $('#add-subject');
var subjects = $('#subjects');

var the_class = {{ $class->id }};

var comment, hidden_note, name;



          addSubject.on("click", function(e){

            addSubject.attr('disabled', true);


            if( $('#form').valid() ){


              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              parameter = $('#parameterfield').val();
              subject = $('#subjectfield').val();



              ///link-subject-class/{class}/{subject_id}
              axios.post('/link-subject-class/'+ the_class +'/'+ subject,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                parameter: parameter,
                comment: comment,
                hidden_note: hidden_note

              })
                .then(function (response) {
                  $("#subjectfield option[value='"+ subject +"']").remove();
                  console.log( response );
                  addSubject.attr('disabled', false);

                  var returnedArray = response.data;
                  subjects.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-yellow"><div class="widget-user-image"><img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3><h5 class="widget-user-desc">Coéfficient: '+ returnedArray['parameter']+'</h5>\
                  </div>\
                  <div class="box-footer no-padding">\
                  <ul class="nav nav-stacked">\
                  <li>\
                  <a href="'+window.index+'/test-language-linked/'+the_class+'/'+returnedArray['id']+'">Click pour ajouter un test<span class="pull-right badge bg-aqua">+</span></a>\
                  </li>\
                  <li>\
                  <a href="'+window.index+'/add-test-linked-linking/'+the_class+'/'+returnedArray['id']+'">Clicker ici pour linker un test <span class="pull-right badge bg-green">X</span></a>\
                  </li>\
\
<li>\
<a href="'+window.index+'/subject-course-language-linked/'+the_class+'/'+returnedArray['id']+'">Click pour ajouter un Coure<span class="pull-right badge bg-aqua">+</span></a>\
</li>\
<li>\
<a href="'+window.index+'/add-subject-course-linked-linking/'+the_class+'/'+returnedArray['id']+'">Clicker ici pour linker un Coure <span class="pull-right badge bg-green">X</span></a>\
</li>\
                  </ul>\
                  </div>\
                  </div>\
                  </div>');

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
