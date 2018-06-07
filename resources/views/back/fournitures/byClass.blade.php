
@extends('back.layouts.app')

@section('styles')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('content')



            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Ajouter une founiture à cette class</h3>

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

                  @include('back.partials.formG', ['name' => 'fourniture', 'type' => 'select', 'selected' => null,'text' => 'Ajouter une matiére à cette class', 'class'=>'', 'required' => true, 'array' => $fournituresArray  ,'additionalInfo' => ['id' =>  'fourniturefield']])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
                  </div>

                  <div class="col-xs-12">

                  @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>'', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
                  </div>

                  <div class="col-xs-12">

                      <button  type="button" class="btn btn-primary" id="add-fourniture" >Enregistrer</button>
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

Eleves et founitures

  @endslot


  @slot('sectionPlain')

                  

    <div class="table-responsive no-padding">

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>nom d'eleve</th>
                    <th>exist</th>
                    <th>confirmed</th>
                    <th>rejected</th>
                </tr>
            </thead>
        </table>

    </div>



  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')

<!-- DataTables -->
<script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>


<!-- SlimScroll -->
<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>


<!-- FastClick -->
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

@endsection

@section('scripts')
<script type="text/javascript">
$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('fournitures.data-check-by-class', $class ) !!}",
        columns: [

            { data: 'name', name: '' },
            { data: 'exist', name: '' },
            { data: 'confirmed', name: '' },
            { data: 'rejected', name: '' }
        ]
    });
});

</script>

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>
<script type="text/javascript">

var addFourniture = $('#add-fourniture');
var fournitures = $('#fournitures');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";
var the_class = {{ $class->id }};

var comment, hidden_note, name;

$(document).ready(function(){









          addFourniture.on("click", function(e){

            addFourniture.attr('disabled', true);


            if( $('#form').valid() ){


              comment = $('#commentfield').val();
              hidden_note = $('#hiddennotefield').val();
              fourniture = $('#fourniturefield').val();


  
///link-fourniture-class/{class}/{fourniture_id}
              axios.post('/link-fourniture-class/'+ the_class +'/'+ fourniture,{
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                comment: comment,
                hidden_note: hidden_note

              })
                .then(function (response) {
                  console.log( response );
                  addFourniture.attr('disabled', false);

                  $("#fourniturefield option[value='"+ fourniture +"']").remove();

                  var returnedArray = response.data;

                  var necessary;
                  if(returnedArray['required']){

                      necessary = 'necessaire';

                  }else{
                    necessary = 'pas trop necessaire';
                  }

                  
                  fournitures.append('<div class="col-md-4"><!--Widget:userwidgetstyle1--><div class="box box-widget widget-user-2"><!--Addthebgcolortotheheaderusinganyofthebg-*classes--><div class="widget-user-header bg-'+ randombgcolor() +'"><div class="widget-user-image"><img class="img-circle" src="'+schoolLink+'/'+imgLink+'" alt="UserAvatar"></div><!--/.widget-user-image--><h3 class="widget-user-username">'+ returnedArray['name']+'</h3><h5 class="widget-user-desc">prix: '+ returnedArray['average_price']+'</h5><h5 class="widget-user-desc">pour: '+ returnedArray['for']+'</h5><h5 class="widget-user-desc">'+ necessary+'</h5><p class="widget-user-desc">info: '+ returnedArray['additional_info']+'</p></div><div class="box-footer no-padding"><ul class="nav nav-stacked"><li><a href="#">Projects<span class="pull-right badge bg-blue">31</span></a></li></ul></div></div><!--/.widget-user--></div>');

                })
                .catch(function (error) {
                  addFourniture.attr('disabled', false);
                  alert(error);
                  console.log( error );
                });

              }

            });








$("#table").on("click", ".btn-exist", function(){


     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');

              $button.attr('disabled',true);


                axios.post('/switch-exist-fourniture/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#exist-'+id);
                    $id.text( returnedArray['icon'] );
                    $id.removeClass('btn-danger btn-success');
                    $id.addClass( 'btn-'+returnedArray['class'] );



                    $button.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });


  });






$("#table").on("click", ".btn-confirmed", function(){


     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');

              $button.attr('disabled',true);


                axios.post('/switch-confirmed-fourniture/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#confirmed-'+id);
                    $id.text( returnedArray['icon'] );
                    $id.removeClass('btn-danger btn-success');
                    $id.addClass( 'btn-' +returnedArray['class'] );

                    $otherid = $('#rejected-'+id);

                    if( returnedArray['class'] == 'success' ){

                      $otherid.removeClass('btn-danger btn-success');
                      $otherid.addClass( 'btn-danger' );
                      $otherid.text( 'X' );

                    }else{

                      $otherid.removeClass('btn-danger btn-success');
                      $otherid.addClass( 'btn-success' );
                      $otherid.text( 'V' );

                    }

                    $button.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });


  });





$("#table").on("click", ".btn-rejected", function(){


     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');

              $button.attr('disabled',true);


                axios.post('/switch-rejected-fourniture/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#rejected-'+id);
                    $id.text( returnedArray['icon'] );
                    $id.removeClass('btn-danger btn-success');
                    $id.addClass( 'btn-' +returnedArray['class'] );


                    $otherid = $('#confirmed-'+id);

                    if( returnedArray['class'] == 'success' ){

                      $otherid.removeClass('btn-danger btn-success');
                      $otherid.addClass( 'btn-danger' );
                      $otherid.text( 'X' );

                    }else{

                      $otherid.removeClass('btn-danger btn-success');
                      $otherid.addClass( 'btn-success' );
                      $otherid.text( 'V' );

                    }

                    $button.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });


  });







});



</script>
@endsection