@extends('back.layouts.app')



@section('styles')

@endsection

@section('content')

  {!! Form::open(['route' => 'posts.post-text',  'method' => 'post' ,'class' => 'form-horizontal']) !!}

  @component('back.components.plain', ['class' => ''])

    @slot('titlePlain')
      Types
    @endslot

    @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Title', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'body', 'type' => 'textarea', 'text' => 'Text', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'role', 'type' => 'select','selected' => null, 'text' => 'Qui peut voire sa', 'class'=>'', 'required' => true, 'array' => ArrayHolder::post_roles() ,'additionalInfo' => []])

    @slot('footerPlain')

  	@component('back.components.button')

  	  @slot('value')

  	  	Enregistrer

  	  @endslot

  	@endcomponent

    @endslot
  @endcomponent

{!! Form::close() !!}

@endsection



@section('scripts')



@endsection
