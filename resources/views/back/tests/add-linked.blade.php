@php

  $years =\App\Year::pluck('name', 'id');

@endphp

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::open(['route' => ['tests.store-linked', $class->id, $subject->id ], 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot


  @slot('sectionPlain')

  {{ csrf_field() }}

    <hr />
    <div class="text-center">
      <h3 >Naicessaire information</h3>
      <p>
        ...
      </p>
    </div>

  	@include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'name', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'titlefield' ]])

    @include('back.partials.formG', ['name' => 'time_minutes', 'type' => 'number', 'text' => 'Temps du test par minutes', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'timefield' ]])

    @include('back.partials.formG', ['name' => 'publish', 'type' => 'checkbox', 'text' => 'Publier le test maintenent pour les éléve', 'class'=>'transport-check', 'required' => true, 'checked' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'navigation', 'type' => 'checkbox', 'text' => 'Laisser l'etudiant chercher sur intenet ?, 'class'=>'transport-check', 'required' => true, 'checked' => true,'additionalInfo' => ['id' =>  'publishfield']])
  	<div id="editor"></div>

  	<a href="#" class="btn  btn-lg btn-block btn-success" id="confimation">Confirmer le test</a>

  	<hr />


    @include('back.partials.formG', ['name' => 'body', 'type' => 'textarea', 'text' => '', 'class'=>'hidden', 'required' => true,'additionalInfo' => [ 'id' => 'jsonfield']])

    @include('back.partials.formG', ['name' => 'notes', 'type' => 'textarea', 'text' => '', 'class'=>'hidden', 'required' => true,'additionalInfo' => [ 'id' => 'notesfield']])

    <div class="text-center">
      <h3 >Direction</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comentaire', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une note pour toi', 'class'=>'', 'required' => true,'additionalInfo' => []])


  @endslot


  @slot('footerPlain')

  <div id="send-form">

	@component('back.components.button')

	  @slot('value')

	  	Enregistrer

	  @endslot

	@endcomponent

	</div>

  @endslot



@endcomponent
{!! Form::close() !!}





@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot


  @slot('sectionPlain')

    <hr />
    <div class="text-center">
      <h3 >Naicessaire information</h3>
      <p>
        ...
      </p>
    </div>

    <form id="values"></form>


  @endslot


  @slot('footerPlain')



  @endslot



@endcomponent




@endsection



@section('scripts')
<script src="{!! asset('jqueryUi/jquery-ui.min.js') !!}"></script>
<script src="{!! asset('form-builder/form-builder.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>

<script type="text/javascript">
/*INITIALIZE

var options = {
      formData: '[{"type":"text", "label":"Text Input"}]',
      dataType: 'json'
    };
$(container).formBuilder(options);


*/



/*
todo

*/
/*Render without Option


  $('#fb-template').formRender({
      formData: '[{"type":"text", "label":"Text Input"}]',
      dataType: 'json'
  });



*/
/************************************************************************************/


$(document).ready(function(){


var sendform = $("#send-form");

sendform.hide();

var chovalues = [];
var values = $('#values');
var editor = $('#editor');
  var options = {
      i18n: {
        locale: '{{ $language }}'
      },
      disableFields: ['hidden','file', 'button'],

	disabledAttrs: [
		'access',
		'className',
		'description',
		'required',
		'toggle',
		'other'
	],

	disabledActionButtons: ['data','save'],

	editOnAdd: true,


	fieldRemoveWarn: true

    };

var fb = editor.formBuilder(options);

var jsonfield = $('#jsonfield');
var notesfield = $('#notesfield');




  $('#confimation').click(function(e){
  	var items;
  	e.preventDefault();
	
	values.empty();
  	chovalues = [];
  	var json = fb.actions.getData('json');

  	jsonfield.val( json );
  	var js = JSON.parse( json );
	js.map(function(i) {
	    if (i.type == 'header' || i.type == 'paragraph') {
	        return i;
	    } else {

	        values.append('<div class="form-group col-xs-12"><div class="text-center">' + i.label + '<div/><label for="' + i.name + '" class="col-sm-2">' + i.name + '</label><div class="col-sm-10"><input type="number" data-name="' + i.name + '" required="required" id="'+ i.name +'" class="form-control value" /></div></div>');
	        return i;

	    }
	    
	});

	values.append('<div class="form-group col-xs-12"><label class="col-sm-2">Total Notes collecté</label><div class="col-sm-10"><h3 id="total"></h3></div></div>');

	var total = $('#total');

	values.append('<div class="form-group col-xs-12"><a href="#" class="btn btn-lg btn-block btn-success" id="save">Confirmer les notes</a></div>');

	var save = $('#save');
	var valueClasses = $('.value');
	var valuefields = $('.value');
	  function updateField() {    
	  	items = 0;
	    
	    $.each(valuefields, function($field) {
	      if (valuefields[$field].value.length > 0) { items += Number( valuefields[$field].value ); }
	    });    
	    total.text(items);
	  }

	values.on("keyup", function() {

	    updateField();
	  });

	save.click(function(e) {
	    e.preventDefault();
	    sendform.show();
	    if (values.valid()) {
	        valuefields.each(function() {
	            chovalues.push({
	                'name': $(this).attr('data-name'),
	                'note': $(this).val()
	            });

	        });
	        notesfield.val(JSON.stringify(chovalues));
	    } else {
	        alert('la form des  note doit etre complete');
	    }
	});


  });





});






</script>
@endsection