
@extends('back.layouts.app')



@section('styles')

{{-- output array min empty max id and more --}}

@endsection

@section('content')

{!! Form::open(['route' => 'tests.store-editor', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau Test de type Editor

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

    @include('back.partials.formG', ['name' => 'time_minutes', 'type' => 'number', 'text' => 'Duréé par minute', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'timefield' ]])

    @include('back.partials.formG', ['name' => 'body', 'type' => 'textarea', 'text' => 'Ecrire les questions', 'class'=>' konten', 'required' => true, 'additionalInfo' => [ 'id' => 'body' ]])


    <hr />
    <div class="text-center">
      <h3 >Reponses</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'answers', 'type' => 'textarea', 'text' => 'Ecrire les reponses', 'class'=>' konten', 'required' => true, 'additionalInfo' => [ 'id' => 'answers' ]])




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
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>
   var answers = document.getElementById("answers");
   var body = document.getElementById("body");
   CKEDITOR.replace(body,{
     language:'en-gb'
   });
   CKEDITOR.replace(answers,{
     language:'en-gb'
   });

   CKEDITOR.config.allowedContent = true;
</script>

<script type="text/javascript">



$(document).ready(function(){



});






</script>
@endsection
