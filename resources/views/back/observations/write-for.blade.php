

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::open(['route' => 'observations.post-write-for', 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot




  @slot('sectionPlain')

  {{ csrf_field() }}

    <hr />
    <div class="text-center">
      <h3 >Ecrire une observation sur {{ $user->name}} {{ $user->last_name }}</h3>
      <p>
        ...
      </p>
    </div>
    {!! Form::hidden('observed_id', $user->id) !!}

    @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Titre', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'observation', 'type' => 'textarea', 'text' => 'Observation', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'type', 'type' => 'select', 'selected' => null , 'text' => 'Type', 'class'=>'', 'required' => true, 'array' => ArrayHolder::observation_types() ,'additionalInfo' => [], 'placeholder' => 'selectionne un role' ])




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




</script>
@endsection