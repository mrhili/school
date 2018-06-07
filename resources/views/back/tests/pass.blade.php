@php

  $years =\App\Year::pluck('name', 'id');

@endphp

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

<div class="row" id="countdown">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Hours</span>
              <span class="info-box-number" id="hours"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Minutes</span>
              <span class="info-box-number" id="minutes"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-clock-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Seconds</span>
              <span class="info-box-number" id="seconds"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>



    {!! Form::open(['route' => ['tests.get-note', $test->id, $note->id], 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal', 'id' => 'get-note']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot



    {{ csrf_field() }}

  @slot('sectionPlain')

    <hr />
    <div class="text-center">
      <h3 >Naicessaire information</h3>
      <p>
        ...
      </p>
    </div>

    <div id="answers"></div>









  @endslot


  @slot('footerPlain')

	@component('back.components.button')

	  @slot('value')

	  	Répondre

	  @endslot

	@endcomponent

  @endslot
  



@endcomponent


    {!! Form::close() !!}






@endsection



@section('scripts')
<script src="{!! asset('form-builder/form-render.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('jquery-countdown/jquery.countdown.min.js') !!}"></script>

<script type="text/javascript">
/*INITIALIZE   formBuilder */



/************************************************************************************/


$(document).ready(function(){

var options = {
      formData: '{!! $test->body !!}',
      dataType: 'json'
    };
$answers = $('#answers');
$answers.formRender(options);
$answers.append('<input type="text" class="hidden" name="done_minutes" id="timing" />');
$timing = $('#timing');


  $("#countdown")
  .countdown("{{ $date }}", function(event) {

    $('#hours').text(
      event.strftime('%H heurs')
    );
    $('#minutes').text(
      event.strftime('%M minutes')
    );
    $('#seconds').text(
      event.strftime('%S seconds')
    );

  }).on('update.countdown', function(){

    $timing.val( Number($timing.val()) + 1 );
    
  })
  .on('finish.countdown', function(){
    $("#get-note").submit();
  });

  $(window).blur(function() {
    $("#get-note").submit();
   });

});






</script>
@endsection