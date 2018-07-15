

@extends('back.layouts.app')



@section('styles')



@endsection

@section('content')

{!! Form::open(['route' => ['callings.store-new', $parent], 'method' => 'post' ,'class' => 'form-horizontal']) !!}

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

    @if( !$parent )
      @include('back.partials.formG', ['name' => 'type', 'type' => 'select', 'selected' => null , 'text' => 'Parents', 'class'=>'', 'required' => true, 'array' => $parents ,'additionalInfo' => [], 'placeholder' => 'selectionne un role' ])
    @endif

    @include('back.partials.formG', ['name' => 'required', 'type' => 'checkbox', 'text' => 'est ce important', 'class'=>'', 'required' => false, 'checked' => false, 'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'object', 'type' => 'text', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'date1', 'type' => 'datetime-local', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'date2', 'type' => 'datetime-local', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'date3', 'type' => 'datetime-local', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => []])


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

@section('beforeBootstrap')
@endsection

@section('scripts')



<script type="text/javascript">




</script>
@endsection