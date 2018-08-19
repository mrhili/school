



@extends('back.layouts.app')


@section('styles')



@endsection


@section('content')

<div id='items'>
    @forelse( $course->subcourses()->orderBy('sorting', 'asc')->get() as $subcourse )

                <div class="box box-default collapsed-box box-subcourse" id="box-subcourse-{{ $subcourse->id }}" data-id="{{ $subcourse->id }}">
                  <div class="box-header with-border">
                    <h3 class="box-title"><span class="sorting-number">{{ $subcourse->pivot->sorting }}</span> - <span class="subcourse-title">{{ $subcourse->title}}</span></h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->

                  </div>
                  <!-- /.box-header -->
                <div class="box-body">
                  <h4 class="box-title">Avant ce index</h4>
                  <button class="btn btn-primary bttn-add-before" data-id="{{ $subcourse->id }}">Ajouter Un subcourse</button>
                  <button class="btn btn-primary bttn-link-before" data-id="{{ $subcourse->id }}">Linker un subcoure</button>
                  <hr />
                  <h4 class="box-title">Apres ce index</h4>
                  <button class="btn btn-primary bttn-add-after" data-id="{{ $subcourse->id }}">Ajouter Un subcoure</button>
                  <button class="btn btn-primary bttn-link-after" data-id="{{ $subcourse->id }}">Linker un subcoure</button>
                  <hr />
                  <h4 class="box-title">Remplacer</h4>
                  <button class="btn btn-primary bttn-replace-new" data-id="{{ $subcourse->id }}">Par nouvaux</button>
                  <button class="btn btn-primary bttn-replace-link" data-id="{{ $subcourse->id }}">Parmis</button>
                  <hr />
                  <h4 class="box-title">Suprimer</h4>
                  <button class="btn btn-alert bttn-soft-delete" data-id="{{ $subcourse->id }}">De la list</button>
                  @if( Auth::user()->role >= 5 )
                  <button class="btn btn-warning bttn-delete" data-id="{{ $subcourse->id }}">Definitifement</button>
                  @endif

                </div>
                <!-- /.box-body -->
              </div>
    @empty
      <div class="alert alert-danger" role="alert">Il ya pas des subcourse</div>
    @endforelse

<hr />


            <div class="box box-default collapsed-box box-add">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter un subcoure</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->

              </div>
              <!-- /.box-header -->
            <div class="box-body" id="sbject-form">
              <button type="button" class="btn btn-lg btn-primary btn-add-new" data-toggle="modal" data-target="#modal-default">
                Ajouter un subcourse
              </button>
              <button type="button" class="btn btn-lg btn-primary btn-link-now" data-toggle="modal" data-target="#modal-default">
                Linker un subcourse
              </button>

            </div>
            <!-- /.box-body -->
          </div>



       <div class="modal fade" id="add-form">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter</h4>
              </div>
              <form id="form-add-new">
              <div class="modal-body">


                  <div class="form-group col-xs-12">
                  {{ csrf_field() }}
                  </div>


                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Titre', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'titlefield'] ])
                  </div>
                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'finishing_time', 'type' => 'number', 'text' => 'Les minutes pour finir ce subcoure', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'finishing_timefield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'body', 'type' => 'textarea', 'text' => 'subcoure text', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'bodyfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'introduction', 'type' => 'textarea', 'text' => 'Une ptite introduction', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'introductionfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'outro', 'type' => 'textarea', 'text' => 'Une note ou sortie du text', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'outrofield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'to_grasp', 'type' => 'textarea', 'text' => 'A apprendre', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'to_graspfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>' commentfield', 'required' => true, 'additionalInfo' => [] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>' hiddennotefield', 'required' => false, 'additionalInfo' => [] ])
                  </div>





                  <div class="clearfix"></div>

              </div>
              <div class="modal-footer add-new-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button class="btn btn-primary sendform add-subcourse" type="button" class="">Ajouté</button>
                <button class="btn btn-primary sendform replace-subcourse" type="button">Remplacé</button>
                <button class="btn btn-primary sendform add-subcourse-before" type="button">Ajouté Avant</button>
                <button class="btn btn-primary sendform add-subcourse-after" type="button">Ajouté Apres</button>

              </div>
              </form>
            </div>
          </div>
        </div>






       <div class="modal fade" id="link-form">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ajouter</h4>
              </div>
              <form id="form-link-now">
              <div class="modal-body">


                  <div class="form-group col-xs-12">
                  {{ csrf_field() }}
                  </div>
                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'subcourse', 'type' => 'select', 'selected' => null , 'text' => 'Subcourse', 'class'=>'', 'required' => true, 'array' => $unutilSubcourses ,'additionalInfo' => ['id' => 'subcoursefield']])
                  </div>

                  <div class="col-xs-12">
                  <p>if You want to do some info about a subcourse</p>
                  </div>



                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>' commentfield', 'required' => true, 'additionalInfo' => [] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>' hiddennotefield', 'required' => false, 'additionalInfo' => [] ])
                  </div>





                  <div class="clearfix"></div>

              </div>
              <div class="modal-footer link-now-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button class="btn btn-primary sendform link-subcourse" type="button">Linké</button>
                <button class="btn btn-primary sendform replace-and-link-subcourse" type="button">Remplacer</button>
                <button class="btn btn-primary sendform link-subcourse-before" type="button">Linké avant</button>
                <button class="btn btn-primary sendform link-subcourse-after" type="button">Linké apres</button>

              </div>
              </form>
            </div>
          </div>
        </div>


</div>











@endsection

@section('datatableScript')



@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>

<script type="text/javascript">
$(document).ready(function(){
  window.linkWay = '';
  window.linkIds = [];
  window.subcourseId = '';
  courseId = '{{ $course->id }}';
  userRole = '{{ Auth::user()->role }}';
  $items = $('#items');
  $send =$('.sendform');
  $addsubcourse = $('.add-new-footer>.add-subcourse');
  $replacesubcourse = $('.add-new-footer>.replace-subcourse');

  $linksubcourse = $('.link-now-footer>.link-subcourse');
  $replaceandlinksubcourse = $('.link-now-footer>.replace-and-link-subcourse');



//add-subcourse-before

  $addsubcoursebefore = $('.add-new-footer>.add-subcourse-before');

  $addsubcourseafter = $('.add-new-footer>.add-subcourse-after');

  $linksubcoursebefore = $('.link-now-footer>.link-subcourse-before');

  $linksubcourseafter = $('.link-now-footer>.link-subcourse-after');

  $addform = $('#add-form');

  $linkform = $('#link-form');


//


/*************************/

//




$items.on( "click", '.btn-box-tool', function() {


  //Find the box parent
  var box = $(this).parents(".box").first();
  //Find the body and the footer
  var bf = box.find(".box-body, .box-footer");
  if (!box.hasClass("collapsed-box")) {
      box.addClass("collapsed-box");
      bf.slideUp();
  }else{
      box.removeClass("collapsed-box");
      bf.slideDown();
  }


});




$items.on( "click", '.bttn-link-after', function() {

 $linkform.modal('show');

  $send.hide();

  $linksubcourseafter.show();

  window.subcourseId = $(this).attr('data-id');

});



$items.on( "click", '.bttn-link-before', function() {

 $linkform.modal('show');

  $send.hide();

  $linksubcoursebefore.show();

  window.subcourseId = $(this).attr('data-id');

});


$items.on( "click", '.bttn-add-after', function() {

 $addform.modal('show');

  $send.hide();

  $addsubcourseafter.show();

  window.subcourseId = $(this).attr('data-id');

});



$items.on( "click", '.bttn-add-before', function() {

 $addform.modal('show');

  $send.hide();

  $addsubcoursebefore.show();

  window.subcourseId = $(this).attr('data-id');

});


/******************/




$items.on( "click", '.bttn-replace-link', function() {

 $linkform.modal('show');

  $send.hide();

  $replaceandlinksubcourse.show();

  window.subcourseId = $(this).attr('data-id');

  ///add-subcourse/{course}

});


$items.on( "click", '.bttn-replace-new', function() {

  $addform.modal('show');

  $send.hide();

  $replacesubcourse.show();

  window.subcourseId = $(this).attr('data-id');

  ///add-subcourse/{course}

});



/************************/


$items.on( "click", '.bttn-soft-delete', function() {

/********/

  id = $(this).attr('data-id');


  axios.delete('/detach-subcourse-from-course/'+courseId+'/'+id)
                .then(function (response) {

                  $(this).attr('disabled', false);

                  $('#box-subcourse-'+id).remove();

                  alert('success soft deleted');

                })
                .catch(function (error) {
                  $(this).attr('disabled', false);
                  alert(error);
                  console.log( error );
                });


/***********/

  });



$items.on( "click", '.bttn-delete', function() {

/********/

  id = $(this).attr('data-id');


  axios.delete('/destroy-subcourse/'+ id)
                .then(function (response) {

                  $(this).attr('disabled', false);

                  $('#box-subcourse-'+id).remove();

                  alert('success deleted');

                })
                .catch(function (error) {
                  $(this).attr('disabled', false);
                  alert(error);
                  console.log( error );
                });






/***********/

  });





$items.on( "click", '.btn-add-new', function() {

    $addform.modal('show');

    $send.hide();

    $addsubcourse.show();

    ///add-subcourse/{course}

  });

$items.on( "click", '.btn-link-now', function() {

    $linkform.modal('show');

    $send.hide();

    $linksubcourse.show();

    ///add-subcourse/{course}

  });
/***********************************************/











$linksubcoursebefore.on('click',function(){


/**/


/************/


if( $('#form-link-now').valid() ){

              $send.attr('disabled', false);



              $send.attr('disabled', true);

              $subcoursefield = $('#subcoursefield');
              $subcourseId = $subcoursefield.val();

              ///link-subcourse-before/{course}/{subcourse}/{subcourseBefore}
              axios.put('/link-subcourse-before/'+courseId+'/'+ $subcourseId +'/' + window.subcourseId,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: $('#form-link-now .commentfield').val(),
                hidden_note: $('#form-link-now .hiddennotefield').val(),

              })
                .then(function (response) {
                  $send.attr('disabled', false);
                  $linkform.modal('hide');

                  //$subcoursefield.val("val2");
                  $('#subcoursefield option[value="'+ $subcourseId +'"]').remove();

                  var returnedArray = response.data;
                  console.log(returnedArray);


                  $newBox = $('<div class="box box-default collapsed-box box-subcourse" id="box-subcourse-X" data-id="X">\
                  <div class="box-header with-border">\
                    <h3 class="box-title"><span class="sorting-number">X</span> - <span class="subcourse-title">X</span></h3>\
                    <div class="box-tools pull-right">\
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>\
                      </button>\
                    </div>\
                  </div>\
                <div class="box-body">\
                  <h4 class="box-title">Avant ce index</h4>\
                  <button class="btn btn-primary bttn-add-before" data-id="X">Ajouter Un subcourse</button>\
                  <button class="btn btn-primary bttn-link-before" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Apres ce index</h4>\
                  <button class="btn btn-primary bttn-add-after" data-id="X">Ajouter Un subcoure</button>\
                  <button class="btn btn-primary bttn-link-after" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Remplacer</h4>\
                  <button class="btn btn-primary bttn-replace-new" data-id="'+ returnedArray['id'] +'">Par nouvaux</button>\
                  <button class="btn btn-primary bttn-replace-link" data-id="'+ returnedArray['id'] +'">Parmis</button>\
                  <hr />\
                  <h4 class="box-title box-delete">Suprimer</h4>\
                  <button class="btn btn-alert bttn-soft-delete" data-id="'+ returnedArray['id'] +'">De la list</button>\
                </div>\
              </div>');

                  $newBox.find('.sorting-number').text(   returnedArray['sort']  );
                  $newBox.find('.subcourse-title').text(  returnedArray['title']  );
                  $newBox.find('.btn').attr('data-id',  returnedArray['id']  );

                  if( Number( userRole ) >= 5 ){

                    $newBox.find('.box-delete').append('<button class="btn btn-warning bttn-delete" data-id="'+ returnedArray['id'] +'">Definitifement</button>');

                  }


                  $('.box-subcourse').each(function(){
                    if(  Number( $(this).find('.sorting-number').text() ) >=  Number( returnedArray['sort'] ) ){

                        $(this).find('.sorting-number').text(  Number( $(this).find('.sorting-number').text() )+1  );

                    }
                  });

                  $newBox.attr('id','box-subcourse-'+returnedArray['id']);
                  $newBox.attr('data-id',returnedArray['id']);
                  $newBox.insertBefore( "#box-subcourse-"+window.subcourseId );









                })
                .catch(function (error) {
                  $send.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}





/**/




});











/**************************************/

$linksubcourseafter.on('click',function(){


/**/


/************/


if( $('#form-link-now').valid() ){

              $send.attr('disabled', false);



              $send.attr('disabled', true);

              $subcoursefield = $('#subcoursefield');
              $subcourseId = $subcoursefield.val();

              ///link-subcourse-before/{course}/{subcourse}/{subcourseBefore}
              axios.put('/link-subcourse-after/'+courseId+'/'+ $subcourseId +'/' + window.subcourseId,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: $('#form-link-now .commentfield').val(),
                hidden_note: $('#form-link-now .hiddennotefield').val(),

              })
                .then(function (response) {
                  $send.attr('disabled', false);
                  $linkform.modal('hide');

                  //$subcoursefield.val("val2");
                  $('#subcoursefield option[value="'+ $subcourseId +'"]').remove();

                  var returnedArray = response.data;
                  console.log(returnedArray);








                  $newBox = $('<div class="box box-default collapsed-box box-subcourse" id="box-subcourse-X" data-id="X">\
                  <div class="box-header with-border">\
                    <h3 class="box-title"><span class="sorting-number">X</span> - <span class="subcourse-title">X</span></h3>\
                    <div class="box-tools pull-right">\
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>\
                      </button>\
                    </div>\
                  </div>\
                <div class="box-body">\
                  <h4 class="box-title">Avant ce index</h4>\
                  <button class="btn btn-primary bttn-add-before" data-id="X">Ajouter Un subcourse</button>\
                  <button class="btn btn-primary bttn-link-before" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Apres ce index</h4>\
                  <button class="btn btn-primary bttn-add-after" data-id="X">Ajouter Un subcoure</button>\
                  <button class="btn btn-primary bttn-link-after" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Remplacer</h4>\
                  <button class="btn btn-primary bttn-replace-new" data-id="'+ returnedArray['id'] +'">Par nouvaux</button>\
                  <button class="btn btn-primary bttn-replace-link" data-id="'+ returnedArray['id'] +'">Parmis</button>\
                  <hr />\
                  <h4 class="box-title box-delete">Suprimer</h4>\
                  <button class="btn btn-alert bttn-soft-delete" data-id="'+ returnedArray['id'] +'">De la list</button>\
                </div>\
              </div>');

                  $newBox.find('.sorting-number').text(   returnedArray['sort']  );
                  $newBox.find('.subcourse-title').text(  returnedArray['title']  );
                  $newBox.find('.btn').attr('data-id',  returnedArray['id']  );

                  if( Number( userRole ) >= 5 ){

                    $newBox.find('.box-delete').append('<button class="btn btn-warning bttn-delete" data-id="'+ returnedArray['id'] +'">Definitifement</button>');

                  }


                  $('.box-subcourse').each(function(){
                    if(  Number( $(this).find('.sorting-number').text() ) >=  Number( returnedArray['sort'] ) ){

                        $(this).find('.sorting-number').text(  Number( $(this).find('.sorting-number').text() )+1  );

                    }
                  });

                  $newBox.attr('id','box-subcourse-'+returnedArray['id']);
                  $newBox.attr('data-id',returnedArray['id']);
                  $newBox.insertBefore( "#box-subcourse-"+window.subcourseId );







                })
                .catch(function (error) {
                  $send.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}





/**/




});

/*************************************************/


$addsubcourseafter.on('click', function(){





if( $('#form-add-new').valid() ){

              $send.attr('disabled', true);

              ///add-subcourse-before/{course}/{subcourse}
              axios.post('/add-subcourse-after/'+courseId+'/'+window.subcourseId,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: $('#form-add-new .commentfield').val(),
                hidden_note: $('#form-add-new .hiddennotefield').val(),
                titlefield: $('#titlefield').val(),
                finishing_time: $('#finishing_timefield').val(),
                introduction: $('#introductionfield').val(),
                body: $('#bodyfield').val(),
                outro: $('#outrofield').val(),
                to_grasp: $('#to_graspfield').val()


              })
                .then(function (response) {
                  $send.attr('disabled', false);
                  $addform.modal('hide');

                  var returnedArray = response.data;
                  console.log(returnedArray);


                  $newBox = $('<div class="box box-default collapsed-box box-subcourse" id="box-subcourse-X" data-id="X">\
                  <div class="box-header with-border">\
                    <h3 class="box-title"><span class="sorting-number">X</span> - <span class="subcourse-title">X</span></h3>\
                    <div class="box-tools pull-right">\
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>\
                      </button>\
                    </div>\
                  </div>\
                <div class="box-body">\
                  <h4 class="box-title">Avant ce index</h4>\
                  <button class="btn btn-primary bttn-add-before" data-id="X">Ajouter Un subcourse</button>\
                  <button class="btn btn-primary bttn-link-before" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Apres ce index</h4>\
                  <button class="btn btn-primary bttn-add-after" data-id="X">Ajouter Un subcoure</button>\
                  <button class="btn btn-primary bttn-link-after" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Remplacer</h4>\
                  <button class="btn btn-primary bttn-replace-new" data-id="'+ returnedArray['id'] +'">Par nouvaux</button>\
                  <button class="btn btn-primary bttn-replace-link" data-id="'+ returnedArray['id'] +'">Parmis</button>\
                  <hr />\
                  <h4 class="box-title box-delete">Suprimer</h4>\
                  <button class="btn btn-alert bttn-soft-delete" data-id="'+ returnedArray['id'] +'">De la list</button>\
                </div>\
              </div>');

                  $newBox.find('.sorting-number').text( returnedArray['sort'] +1 );
                  $newBox.find('.subcourse-title').text( returnedArray['title'] );
                  $newBox.find('.btn').attr('data-id',  returnedArray['id']  );

                  if( Number( userRole ) >= 5 ){

                    $newBox.find('.box-delete').append('<button class="btn btn-warning bttn-delete" data-id="'+ returnedArray['id'] +'">Definitifement</button>');

                  }


                  $('.box-subcourse').each(function(){
                    if(  Number( $(this).find('.sorting-number').text() ) >  Number( returnedArray['sort'] ) ){

                        $(this).find('.sorting-number').text(  Number( $(this).find('.sorting-number').text() )+1  );

                    }
                  });

                  $newBox.attr('id','box-subcourse-'+returnedArray['id']);
                  $newBox.attr('data-id',returnedArray['id']);
                  $newBox.insertBefore( "#box-subcourse-"+window.subcourseId );


                })
                .catch(function (error) {
                  $send.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}




});

/**********************************************/


$addsubcoursebefore.on('click', function(){





if( $('#form-add-new').valid() ){

              $send.attr('disabled', true);

              ///add-subcourse-before/{course}/{subcourse}
              axios.post('/add-subcourse-before/'+courseId+'/'+window.subcourseId,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: $('#form-add-new .commentfield').val(),
                hidden_note: $('#form-add-new .hiddennotefield').val(),
                titlefield: $('#titlefield').val(),
                finishing_time: $('#finishing_timefield').val(),
                introduction: $('#introductionfield').val(),
                body: $('#bodyfield').val(),
                outro: $('#outrofield').val(),
                to_grasp: $('#to_graspfield').val()


              })
                .then(function (response) {
                  $send.attr('disabled', false);
                  $addform.modal('hide');

                  var returnedArray = response.data;
                  console.log(returnedArray);


                  $newBox = $('<div class="box box-default collapsed-box box-subcourse" id="box-subcourse-X" data-id="X">\
                  <div class="box-header with-border">\
                    <h3 class="box-title"><span class="sorting-number">X</span> - <span class="subcourse-title">X</span></h3>\
                    <div class="box-tools pull-right">\
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>\
                      </button>\
                    </div>\
                  </div>\
                <div class="box-body">\
                  <h4 class="box-title">Avant ce index</h4>\
                  <button class="btn btn-primary bttn-add-before" data-id="X">Ajouter Un subcourse</button>\
                  <button class="btn btn-primary bttn-link-before" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Apres ce index</h4>\
                  <button class="btn btn-primary bttn-add-after" data-id="X">Ajouter Un subcoure</button>\
                  <button class="btn btn-primary bttn-link-after" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Remplacer</h4>\
                  <button class="btn btn-primary bttn-replace-new" data-id="'+ returnedArray['id'] +'">Par nouvaux</button>\
                  <button class="btn btn-primary bttn-replace-link" data-id="'+ returnedArray['id'] +'">Parmis</button>\
                  <hr />\
                  <h4 class="box-title box-delete">Suprimer</h4>\
                  <button class="btn btn-alert bttn-soft-delete" data-id="'+ returnedArray['id'] +'">De la list</button>\
                </div>\
              </div>');

                  $newBox.find('.sorting-number').text(   returnedArray['sort']  );
                  $newBox.find('.subcourse-title').text(  returnedArray['title']  );
                  $newBox.find('.btn').attr('data-id',  returnedArray['id']  );

                  if( Number( userRole ) >= 5 ){

                    $newBox.find('.box-delete').append('<button class="btn btn-warning bttn-delete" data-id="'+ returnedArray['id'] +'">Definitifement</button>');

                  }

                  $('.box-subcourse').each(function(){
                    if(  Number( $(this).find('.sorting-number').text() ) >=  Number( returnedArray['sort'] ) ){

                        $(this).find('.sorting-number').text(  Number( $(this).find('.sorting-number').text() )+1  );

                    }
                  });

                  $newBox.attr('id','box-subcourse-'+returnedArray['id']);
                  $newBox.attr('data-id',returnedArray['id']);
                  $newBox.insertBefore( "#box-subcourse-"+window.subcourseId );


                })
                .catch(function (error) {
                  $send.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}




});


/**********************/

///replace-link-subcourse/{course}/{subcourse}/{detach}

$replaceandlinksubcourse.on('click', function(){

if( $('#form-link-now').valid() ){

              $send.attr('disabled', true);

              $subcoursefield = $('#subcoursefield');
              $subcourseId = $subcoursefield.val();

              axios.put('/replace-link-subcourse/'+courseId+'/'+$subcourseId+'/'+ window.subcourseId,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: $('#form-link-now .commentfield').val(),
                hidden_note: $('#form-link-now .hiddennotefield').val()

              })
                .then(function (response) {
                  $send.attr('disabled', false);
                  $linkform.modal('hide');

                  var returnedArray = response.data;
                  console.log(returnedArray);

                  $('#subcoursefield option[value="'+ $subcourseId +'"]').remove();

                  $boxsubcourse = $('#box-subcourse-'+ window.subcourseId);

                  $boxsubcourse.find('.sorting-number').text(returnedArray['sorting']);
                  $boxsubcourse.find('.subcourse-title').text(returnedArray['title']);
                  $boxsubcourse.find('.btn').attr('data-id', returnedArray['id']);

                  $boxsubcourse.attr('id', '#box-subcourse-' + returnedArray['id'] );

                })
                .catch(function (error) {
                  $send.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}




});



/****************************/


$replacesubcourse.on('click', function(){

if( $('#form-add-new').valid() ){

              $send.attr('disabled', false);

              $send.attr('disabled', true);

              axios.post('/replace-subcourse/'+courseId+'/'+window.subcourseId,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: $('#form-add-new .commentfield').val(),
                hidden_note: $('#form-add-new .hiddennotefield').val(),
                titlefield: $('#titlefield').val(),
                finishing_time: $('#finishing_timefield').val(),
                introduction: $('#introductionfield').val(),
                body: $('#bodyfield').val(),
                outro: $('#outrofield').val(),
                to_grasp: $('#to_graspfield').val()


              })
                .then(function (response) {
                  $send.attr('disabled', false);
                  $addform.modal('hide');

                  var returnedArray = response.data;
                  console.log(returnedArray);

                  $boxsubcourse = $('#box-subcourse-'+ window.subcourseId);

                  $boxsubcourse.find('.sorting-number').text(returnedArray['sorting']);
                  $boxsubcourse.find('.subcourse-title').text(returnedArray['title']);
                  $boxsubcourse.find('.btn').attr('data-id', returnedArray['id']);


                  $boxsubcourse.attr('id', '#box-subcourse-' + returnedArray['id'] );


                })
                .catch(function (error) {
                  $send.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}




});




/***************************/









$linksubcourse.on('click',function(){


/**/


/************/


if( $('#form-link-now').valid() ){

              $send.attr('disabled', false);



              $send.attr('disabled', true);

              $subcoursefield = $('#subcoursefield');
              $subcourseId = $subcoursefield.val();

              axios.put('/link-subcourse/'+courseId+'/'+ $subcourseId,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: $('#form-link-now .commentfield').val(),
                hidden_note: $('#form-link-now .hiddennotefield').val(),

              })
                .then(function (response) {
                  $send.attr('disabled', false);
                  $linkform.modal('hide');

                  //$subcoursefield.val("val2");
                  $('#subcoursefield option[value="'+ $subcourseId +'"]').remove();

                  var returnedArray = response.data;
                  console.log(returnedArray);
/************************************/


                  $newBox = $('<div class="box box-default collapsed-box box-subcourse" id="box-subcourse-X" data-id="X">\
                  <div class="box-header with-border">\
                    <h3 class="box-title"><span class="sorting-number">X</span> - <span class="subcourse-title">X</span></h3>\
                    <div class="box-tools pull-right">\
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>\
                      </button>\
                    </div>\
                  </div>\
                  <div class="box-body">\
                  <h4 class="box-title">Avant ce index</h4>\
                  <button class="btn btn-primary bttn-add-before" data-id="X">Ajouter Un subcourse</button>\
                  <button class="btn btn-primary bttn-link-before" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Apres ce index</h4>\
                  <button class="btn btn-primary bttn-add-after" data-id="X">Ajouter Un subcoure</button>\
                  <button class="btn btn-primary bttn-link-after" data-id="X">Linker un subcoure</button>\
                  <hr />\
                  <h4 class="box-title">Remplacer</h4>\
                  <button class="btn btn-primary bttn-replace-new" data-id="'+ returnedArray['id'] +'">Par nouvaux</button>\
                  <button class="btn btn-primary bttn-replace-link" data-id="'+ returnedArray['id'] +'">Parmis</button>\
                  <hr />\
                  <h4 class="box-title box-delete">Suprimer</h4>\
                  <button class="btn btn-alert bttn-soft-delete" data-id="'+ returnedArray['id'] +'">De la list</button>\
                  </div>\
                  </div>');

                  $newBox.find('.sorting-number').text(   returnedArray['sort']  );
                  $newBox.find('.subcourse-title').text(  returnedArray['title']  );
                  $newBox.find('.btn').attr('data-id',  returnedArray['id']  );

                  if( Number( userRole ) >= 5 ){

                    $newBox.find('.box-delete').append('<button class="btn btn-warning bttn-delete" data-id="'+ returnedArray['id'] +'">Definitifement</button>');

                  }

                  $newBox.insertBefore( ".box-add" );


/****************************/

/*
$('<div class="box box-default collapsed-box"><div class="box-header with-border"><h3 class="box-title">'+returnedArray['sort']+' - '+returnedArray['title']+'</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div></div><div class="box-body" id="sbject-form"><button type="button" class="btn btn-lg btn-primary btn-add-new" data-toggle="modal" data-target="#modal-default">Ajouter un subcourse</button><button type="button" class="btn btn-lg btn-primary btn-link-now" data-toggle="modal" data-target="#modal-default">Linker un subcourse</button></div></div>').insertBefore( ".box-add" );
*/

                })
                .catch(function (error) {
                  $send.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}





/**/




});




$addsubcourse.on('click', function(){





if( $('#form-add-new').valid() ){

              $send.attr('disabled', false);



              $send.attr('disabled', true);




              axios.post('/add-subcourse/'+courseId,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: $('#form-add-new .commentfield').val(),
                hidden_note: $('#form-add-new .hiddennotefield').val(),
                titlefield: $('#titlefield').val(),
                finishing_time: $('#finishing_timefield').val(),
                introduction: $('#introductionfield').val(),
                body: $('#bodyfield').val(),
                outro: $('#outrofield').val(),
                to_grasp: $('#to_graspfield').val()


              })
                .then(function (response) {
                  $send.attr('disabled', false);
                  $addform.modal('hide');

                  var returnedArray = response.data;
                  console.log(returnedArray);
/************************************************************/


              $newBox = $('<div class="box box-default collapsed-box box-subcourse" id="box-subcourse-X" data-id="X">\
              <div class="box-header with-border">\
                <h3 class="box-title"><span class="sorting-number">X</span> - <span class="subcourse-title">X</span></h3>\
                <div class="box-tools pull-right">\
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>\
                  </button>\
                </div>\
              </div>\
              <div class="box-body">\
              <h4 class="box-title">Avant ce index</h4>\
              <button class="btn btn-primary bttn-add-before" data-id="X">Ajouter Un subcourse</button>\
              <button class="btn btn-primary bttn-link-before" data-id="X">Linker un subcoure</button>\
              <hr />\
              <h4 class="box-title">Apres ce index</h4>\
              <button class="btn btn-primary bttn-add-after" data-id="X">Ajouter Un subcoure</button>\
              <button class="btn btn-primary bttn-link-after" data-id="X">Linker un subcoure</button>\
              <hr />\
              <h4 class="box-title">Remplacer</h4>\
              <button class="btn btn-primary bttn-replace-new" data-id="'+ returnedArray['id'] +'">Par nouvaux</button>\
              <button class="btn btn-primary bttn-replace-link" data-id="'+ returnedArray['id'] +'">Parmis</button>\
              <hr />\
              <h4 class="box-title box-delete">Suprimer</h4>\
              <button class="btn btn-alert bttn-soft-delete" data-id="'+ returnedArray['id'] +'">De la list</button>\
              </div>\
              </div>');

              $newBox.find('.sorting-number').text(   returnedArray['sort']  );
              $newBox.find('.subcourse-title').text(  returnedArray['title']  );
              $newBox.find('.btn').attr('data-id',  returnedArray['id']  );

              if( Number( userRole ) >= 5 ){

                $newBox.find('.box-delete').append('<button class="btn btn-warning bttn-delete" data-id="'+ returnedArray['id'] +'">Definitifement</button>');

              }

              $newBox.insertBefore( ".box-add" );


/*************************************************************/
/*
$('<div class="box box-default collapsed-box"><div class="box-header with-border"><h3 class="box-title">'+returnedArray['sort']+' - '+returnedArray['title']+'</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div></div><div class="box-body" id="sbject-form"><button type="button" class="btn btn-lg btn-primary btn-add-new" data-toggle="modal" data-target="#modal-default">Ajouter un subcourse</button><button type="button" class="btn btn-lg btn-primary btn-link-now" data-toggle="modal" data-target="#modal-default">Linker un subcourse</button></div></div>').insertBefore( ".box-add" );
*/

                })
                .catch(function (error) {
                  $send.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

}




});


//

});

</script>
@endsection
