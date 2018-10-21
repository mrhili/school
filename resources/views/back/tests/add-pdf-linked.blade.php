
@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::open(['route' => ['tests.store-pdf-linked', $subclass->id ], 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau Test de type pdf

  @endslot


  @slot('sectionPlain')

  {{ csrf_field() }}

    <hr />
    <div class="text-center">
      <h3 >Questions</h3>
      <p>
        ...
      </p>
    </div>

  	@include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'name', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'titlefield' ]])

    @include('back.partials.formG', ['name' => 'beforeTest', 'type' => 'select', 'selected' => null,'text' => 'Un cour a etudié avant de passé le test', 'class'=>'', 'required' => false, 'array' => $courseArray  ,'additionalInfo' => ['id' =>  'before_testfield']])

    @if( Auth::user()->role >= 4 )
      @include('back.partials.formG', ['name' => 'publish', 'type' => 'checkbox', 'text' => 'Publier le test maintenent pour les éléve', 'class'=>'', 'required' => false, 'checked' => true,'additionalInfo' => []])
    @else
      @include('back.partials.formG', ['name' => 'publish', 'type' => 'checkbox', 'text' => 'Publier le test maintenent pour les éléve', 'class'=>' hidden', 'required' => false, 'checked' => false,'additionalInfo' => []])
    @endif

    @include('back.partials.formG', ['name' => 'navigation', 'type' => 'checkbox', 'text' => 'Laisser letudiant chercher sur intenet ?', 'class'=>'', 'required' => false, 'checked' => true,'additionalInfo' => ['id' =>  'publishfield']])
    @include('back.partials.formG', ['name' => 'time_minutes', 'type' => 'number', 'text' => 'Duréé par minute', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'timefield' ]])

    @include('back.partials.formG', ['name' => 'is_exercise', 'type' => 'checkbox', 'text' => 'Esque cest just Un Exercice  ?', 'class'=>'', 'required' => false, 'checked' => false,'additionalInfo' => ['id' =>  'is_exercicefield']])


    @include('back.partials.formG', ['name' => 'end', 'type' => 'date', 'text' => 'Date de fin', 'class'=>'', 'required' => true, 'additionalInfo' => ['id' =>  'endfield']])



    @include('back.partials.formG', ['name' => 'body', 'type' => 'file', 'text' => 'Questions en pdf', 'class'=>'', 'required' => true, 'no_img' => true, 'additionalInfo' => [ 'id' => 'body' ]])

    @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comentaire', 'class'=>'', 'required' => true,'additionalInfo' => []])

    @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une note pour toi', 'class'=>'', 'required' => true,'additionalInfo' => []])



    <hr />
    <div class="text-center">
      <h3 >Reponses</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'answers', 'type' => 'file', 'text' => 'Reponses en Pdf', 'class'=>'', 'required' => true, 'no_img' => true,'additionalInfo' => [ 'id' => 'answers' ]])




  @endslot


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



<script type="text/javascript">



$(document).ready(function(){

  var endfield = $('#endfield');
  var isexercicefield = $('#is_exercicefield');

  /******/

  isexercicefield.change(function() {


    if(this.checked) {

        endfield.hide().prop('required', false);
        endfield.val(null);

    }else{

      endfield.show().prop('required', true);

    }
  /********/

  });

});






</script>
@endsection
