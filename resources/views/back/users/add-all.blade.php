@php

  $years =\App\Year::pluck('name', 'id');

@endphp

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::open(['route' => 'users.store', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot




  @slot('sectionPlain')

  {{ csrf_field() }}

    <hr />
    <div class="text-center">
      <h3 >Role</h3>
      <p>
        ...
      </p>
    </div>



    @include('back.partials.formG', ['name' => 'role', 'type' => 'select', 'selected' => $role , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => array_except(ArrayHolder::roles(), [0,1, 2]) ,'additionalInfo' => [], 'placeholder' => 'selectionne un role' ])

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
    @include('back.partials.formG', ['name' => 'cin', 'type' => 'text', 'text' => 'CIN', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'gender', 'type' => 'select', 'selected' => null , 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::gender() ,'additionalInfo' => []])


  	@include('back.partials.formG', ['name' => 'birth_date', 'type' => 'date', 'text' => 'Date de naissance', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'birth_place', 'type' => 'text', 'text' => 'ville de naissance', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'city', 'type' => 'text', 'text' => 'Ville', 'class'=>'', 'required' => true,'additionalInfo' => []])

  	@include('back.partials.formG', ['name' => 'zip_code', 'type' => 'text', 'text' => 'Code postal', 'class'=>'', 'required' => true,'additionalInfo' => []])
  	@include('back.partials.formG', ['name' => 'adress', 'type' => 'text', 'text' => 'Adress', 'class'=>'', 'required' => true,'additionalInfo' => []])

    
    @include('back.partials.formG', ['name' => 'profession', 'type' => 'text', 'text' => 'Profession du Parent 1', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'family_situation', 'type' => 'checkbox', 'text' => 'La situation familiale, Marié?', 'class'=>'', 'required' => false, 'checked' => false,'additionalInfo' => []])





    @include('back.partials.formG', ['name' => 'city', 'type' => 'text', 'text' => 'Ville', 'class'=>'', 'required' => true,'additionalInfo' => []])


    @include('back.partials.formG', ['name' => 'phone', 'type' => 'text', 'text' => 'Téléphone  1', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'phone2', 'type' => 'text', 'text' => 'Téléphone 2', 'class'=>'', 'required' => false,'additionalInfo' => []])
   @include('back.partials.formG', ['name' => 'phone3', 'type' => 'text', 'text' => 'Téléphone 3', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'fix', 'type' => 'text', 'text' => 'Fix ', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'whatsapp', 'type' => 'text', 'text' => 'Whatsapp', 'class'=>'', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'facebook_link', 'type' => 'text', 'text' => 'Facebook', 'class'=>'', 'required' => false,'additionalInfo' => []])

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


    @include('back.partials.formG', ['name' => 'should_be_payed', 'type' => 'number', 'text' => 'Il doit chaque mois', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'cnss', 'type' => 'checkbox', 'text' => 'Cnss', 'class'=>'cnss-check', 'required' => false, 'checked' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'cnss_payment', 'type' => 'number', 'text' => 'Payement montielle du Cnss', 'class'=>'cnss-field', 'required' => false,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'cnss_id', 'type' => 'text', 'text' => 'Cnss Id', 'class'=>'cnss-field', 'required' => false,'additionalInfo' => []])


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
  
  $('.cnss-check').change(function() {

    var cnssField = $('.cnss-field');
    if(!this.checked) {
        cnssField.hide();

    }else{

        cnssField.show();

    }
  });




</script>
@endsection