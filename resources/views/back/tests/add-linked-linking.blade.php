
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

                  @include('back.partials.formG', ['name' => 'test', 'type' => 'select', 'selected' => null,'text' => 'Ajouter une matiére à cette class', 'class'=>'', 'required' => true, 'array' => $testsArray  ,'additionalInfo' => ['id' =>  'testfield']])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'publish', 'type' => 'checkbox', 'text' => 'Publier le test maintenent pour les éléve', 'class'=>'transport-check', 'required' => true, 'checked' => true,'additionalInfo' => ['id' =>  'publishfield']])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'navigation', 'type' => 'checkbox', 'text' => 'Laisser l'etudiant chercher sur intenet ?, 'class'=>'transport-check', 'required' => true, 'checked' => true,'additionalInfo' => ['id' =>  'publishfield']])
                  </div>


                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'time_minutes', 'type' => 'number', 'text' => 'Temps du test par minutes', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'time_minutesfield' ]])

                  </div>

                  <div class="col-xs-12">

                      <button  type="button" class="btn btn-primary" id="add" >Enregistrer</button>
                  </div>



              </form>


            </div>
            <!-- /.box-body -->
          </div>




<div class="row" id="tests">


    @foreach( $tests as $test  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $test->title }}</h3>
              <h5 class="widget-user-desc">{{ '' }}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="">... <span class="pull-right badge bg-aqua">+</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

    @endforeach

</div>





@endsection

@section('datatableScript')



@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>

<script type="text/javascript">

var add = $('#add');
var tests = $('#tests');

var the_class = {{ $class->id }};
var subject = {{ $subject->id }};

var comment, hidden_note, name;



          add.on("click", function(e){

            add.attr('disabled', true);


            if( $('#form').valid() ){


              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              test = $('#testfield').val();
              time_minutes = $('#time_minutes_field').val();
              publish = $('#publishfield').val();


  
//post-test-linked-linking/{test}/{class_id}/{subject_id}
              axios.post('/post-test-linked-linking/'+test+'/'+ the_class +'/'+ subject,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: comment,
                hidden_note: hidden_note,
                publish: publish,
                time_minutes: time_minutes

              })
                .then(function (response) {
                  console.log( response );
                  add.attr('disabled', false);

                  var returnedArray = response.data;
                  tests.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-yellow"><div class="widget-user-image"><img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['title']+'</h3><h5 class="widget-user-desc">...</h5></div><div class="box-footer no-padding"><ul class="nav nav-stacked">><li><a href="#">... <span class="pull-right badge bg-aqua">+</span></a></li></ul></div></div><!--/.widget-user--></div>');

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