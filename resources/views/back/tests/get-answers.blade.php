@php

  $years =\App\Year::pluck('name', 'id');

@endphp

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')





    {!! Form::open(['route' => ['tests.store-answers', $test->id], 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal', 'id' => '']) !!}

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

});






</script>
@endsection