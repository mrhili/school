@php

  $years =\App\Year::pluck('name', 'id');

@endphp

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::open(['route' => 'students.store', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

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

    @include('back.partials.formG', ['name' => 'img', 'type' => 'file', 'text' => 'Image', 'class'=>'', 'required' => false ,'additionalInfo' => []])




  	@include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Prénom', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'last_name', 'type' => 'text', 'text' => 'Nom', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'gender', 'type' => 'select', 'selected' => null , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::gender() ,'additionalInfo' => []])


  	@include('back.partials.formG', ['name' => 'birth_date', 'type' => 'date', 'text' => 'Date de naissance', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'birth_place', 'type' => 'text', 'text' => 'ville de naissance', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'city', 'type' => 'text', 'text' => 'Ville', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'zip_code', 'type' => 'text', 'text' => 'Code postal', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'adress', 'type' => 'text', 'text' => 'Adress', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'phone1teatcher', 'type' => 'text', 'text' => 'Téléphone Teatcher 1', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'phone2parent', 'type' => 'text', 'text' => 'Téléphone Teatcher 2', 'class'=>'', 'required' => false,'additionalInfo' => []])
   @include('back.partials.formG', ['name' => 'phone3parent', 'type' => 'text', 'text' => 'Téléphone Teatcher 3', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'fixparent', 'type' => 'text', 'text' => 'Fix Teatcher', 'class'=>'', 'required' => false,'additionalInfo' => []])

    <hr />
    <div class="text-center">
      <h3>Cv</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'cv', 'type' => 'file', 'text' => 'Cv', 'class'=>'', 'required' => false ,'additionalInfo' => []])




    <hr />
    <div class="text-center">
      <h3 >Login information</h3>
      <p>
        ...
      </p>
    </div>


  	@include('back.partials.formG', ['name' => 'email', 'type' => 'email', 'text' => 'E-mail', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'password', 'type' => 'text', 'text' => 'Password', 'class'=>'', 'required' => true,'additionalInfo' => []])


    <hr />
    <div class="text-center">
      <h3 >Payements</h3>
      <p>
        ...
      </p>
    </div>


    @include('back.partials.formG', ['name' => 'should_pay', 'type' => 'number', 'text' => 'Payement montielle de lecole', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'saving_pay', 'type' => 'number', 'text' => 'Frais denregistrement', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'assurence_pay', 'type' => 'number', 'text' => 'Frais dassurence', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'transport', 'type' => 'checkbox', 'text' => 'Transport', 'class'=>'transport-check', 'required' => false, 'checked' => false,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'transport_pay', 'type' => 'number', 'text' => 'Payement montielle du transport', 'class'=>'transport-field', 'required' => false,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'add_classes', 'type' => 'checkbox', 'text' => 'Cours de soutien', 'class'=>'add-classes-check', 'required' => false, 'checked' => false,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'add_classes_pay', 'type' => 'number', 'text' => 'Payement montielle des cours de soutien', 'class'=>'add-classes-field', 'required' => false,'additionalInfo' => []])

    <hr />
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

	@component('back.components.button')

	  @slot('value')

	  	Enregistrer

	  @endslot

	@endcomponent

  @endslot


@endcomponent


@endsection
{!! Form::close() !!}


@section('scripts')

<script type="text/javascript">
  
  $('.add-classes-check').change(function() {

    var addClassesField = $('.add-classes-field');
    if(!this.checked) {
        addClassesField.hide();

    }else{

        addClassesField.show();

    }
  });


  $('.transport-check').change(function() {

    var transportField = $('.transport-field');
    if(!this.checked) {
        transportField.hide();

    }else{

        transportField.show();

    }
  });



</script>
@endsection