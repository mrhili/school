@extends('back.layouts.app')



@section('styles')



@endsection

@section('content')

{!! Form::open(['route' => 'students.store', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot


  @slot('sectionPlain')


  	@include('back.partials.formG', ['name' => 'name', 'type' => 'text', 'text' => 'Prénom', 'class'=>'', 'required' => true])
  	@include('back.partials.formG', ['name' => 'last_name', 'type' => 'text', 'text' => 'Nom', 'class'=>'', 'required' => true])

  	@include('back.partials.formG', ['name' => 'gender', 'type' => 'select', 'text' => 'Genre', 'class'=>'', 'required' => true, 'array' => ArrayHolder::gender() ])


  	@include('back.partials.formG', ['name' => 'birth_date', 'type' => 'date', 'text' => 'Date de naissance', 'class'=>'', 'required' => true])
  	@include('back.partials.formG', ['name' => 'birth_place', 'type' => 'text', 'text' => 'ville de naissance', 'class'=>'', 'required' => true])

  	@include('back.partials.formG', ['name' => 'city', 'type' => 'text', 'text' => 'Ville', 'class'=>'', 'required' => true])

  	@include('back.partials.formG', ['name' => 'zip_code', 'type' => 'text', 'text' => 'Code postal', 'class'=>'', 'required' => true])
  	@include('back.partials.formG', ['name' => 'adress', 'type' => 'text', 'text' => 'Adress', 'class'=>'', 'required' => true])
  	@include('back.partials.formG', ['name' => 'phone', 'type' => 'text', 'text' => 'Téléphone', 'class'=>'', 'required' => true])
  	@include('back.partials.formG', ['name' => 'class', 'type' => 'select', 'text' => 'Class', 'class'=>'', 'required' => true, 'array' => $classes])
  	@include('back.partials.formG', ['name' => 'email', 'type' => 'email', 'text' => 'E-mail', 'class'=>'', 'required' => true])
  	@include('back.partials.formG', ['name' => 'password', 'type' => 'text', 'text' => 'Password', 'class'=>'', 'required' => true])

  	@include('back.partials.formG', ['name' => 'img', 'type' => 'file', 'text' => 'Image', 'class'=>'', 'required' => false ])


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


@endsection