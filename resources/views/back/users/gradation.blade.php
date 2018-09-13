

@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::model($user,['route' => ['users.grad-post', $user->id], 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot




  @slot('sectionPlain')

  {{ csrf_field() }}


<div class="text-center">
  <h3 >Role</h3>
  <p>
    ...
  </p>
</div>



@include('back.partials.formG', ['name' => 'role', 'type' => 'select' , 'text' => 'Genre','selected' => null, 'class'=>'', 'required' => true, 'array' => array_except(ArrayHolder::roles(), [0,1,(int)$user->role]) ,'additionalInfo' => [], 'placeholder' => 'selectionne un role' ])




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
  <h3 >Payements</h3>
  <p>
    ...
  </p>
</div>


@include('back.partials.formG', ['name' => 'should_be_payed', 'type' => 'number', 'text' => 'Il doit chaque mois', 'class'=>'', 'required' => true,'additionalInfo' => []])
@include('back.partials.formG', ['name' => 'cnss', 'type' => 'checkbox', 'text' => 'Cnss', 'class'=>'cnss-check', 'required' => false, 'checked' => true,'additionalInfo' => []])
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
