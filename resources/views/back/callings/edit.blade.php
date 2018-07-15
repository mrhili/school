

@extends('back.layouts.app')



@section('styles')


@endsection

@section('content')

{!! Form::model($calling,['route' => ['callings.update', $calling->id], 'method' => 'put' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot




  @slot('sectionPlain')

  {{ csrf_field() }}

    <hr />
    <div class="text-center">
      <h3 >Appeller un parent</h3>
      <p>
        ...
      </p>
    </div>




    @include('back.partials.formG', ['name' => 'required', 'type' => 'checkbox', 'text' => 'est ce important', 'class'=>'', 'required' => true, 'checked' => false, 'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'object', 'type' => 'text', 'text' => 'Titre', 'class'=>'', 'required' => false,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'date1', 'type' => 'datetime-local', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'date1' ]])

    @include('back.partials.formG', ['name' => 'date2', 'type' => 'datetime-local', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'date2' ]])

    @include('back.partials.formG', ['name' => 'date3', 'type' => 'datetime-local', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'date3' ]])

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
@php

$date1 = Application::formatDate4Html( $calling->date1 );
$date2= Application::formatDate4Html( $calling->date2 );
$date3= Application::formatDate4Html( $calling->date3 );


@endphp

$(document).ready(function(){

  $('#date1').val(  '{{ $date1 }}' );
  $('#date2').val(  '{{ $date2 }}' );
  $('#date3').val(  '{{ $date3 }}' );


});


</script>
@endsection
