@extends('back.layouts.app')



@section('styles')

  <link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet" />

@endsection

@section('content')

  {!! Form::open(['route' => 'posts.post-video',  'method' => 'post' ,'class' => 'form-horizontal']) !!}

  @component('back.components.plain', ['class' => ''])

    @slot('titlePlain')
      Types
    @endslot


    <div class="text-center">
      <h3 >Post</h3>
      <p>
        ...
      </p>
    </div>


    @include('back.partials.formG', ['name' => 'title', 'type' => 'text', 'text' => 'Title', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'link', 'type' => 'url', 'text' => 'Video', 'class'=>'', 'required' => true,'additionalInfo' => []])
    @include('back.partials.formG', ['name' => 'body', 'type' => 'textarea', 'text' => 'Text', 'class'=>'', 'required' => true,'additionalInfo' => [ 'id' => 'body']])
    @include('back.partials.formG', ['name' => 'role', 'type' => 'select','selected' => null, 'text' => 'Qui peut voire sa', 'class'=>'', 'required' => true, 'array' => ArrayHolder::post_roles() ,'additionalInfo' => []])

    <hr />
    <div class="text-center">
      <h3 >Tagger les autres dans le post</h3>
      <p>
        ...
      </p>
    </div>


    @include('back.partials.formG', ['name' => 'users', 'type' => 'select','selected' => null, 'text' => 'Users', 'class'=>'' , 'required' => true, 'array' => $users,'additionalInfo' => ['id' => 'users', 'multiple' => 'multiple']])





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

  <script src="{{ asset('select2/select2.min.js') }}"></script>

  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>


  <script type="text/javascript">
    $('#users').select2({tags: true});

    var body = document.getElementById("body");
    CKEDITOR.replace(body,{
      language:'en-gb'
    });


    CKEDITOR.config.allowedContent = true;
  </script>

@endsection
