

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::open(['route' => 'students.migration-post', 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot




  @slot('sectionPlain')

  {{ csrf_field() }}


<div class="text-center">
  <h3 >Eleves</h3>
  <p>
    ...
  </p>
</div>



@include('back.partials.formG', ['name' => 'students[]', 'type' => 'select' , 'text' => 'Genre','selected' => null, 'class'=>'', 'required' => true, 'array' => $students ,'additionalInfo' => ['multiple' => 'multiple' ], 'placeholder' => '' ])




<hr />
<div class="text-center">
  <h3>Class</h3>
  <p>
    ...
  </p>
</div>

@include('back.partials.formG', ['name' => 'class', 'type' => 'select' , 'text' => 'Genre','selected' => null, 'class'=>'', 'required' => true, 'array' => $classes ,'additionalInfo' => [ ], 'placeholder' => '' ])

<div class="text-center">
  <h3>Direction</h3>
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






</script>
@endsection
