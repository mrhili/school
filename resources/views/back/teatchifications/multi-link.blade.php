

@section('title')
Linnké multi matiere a multi class
@endsection

@extends('back.layouts.app')





@section('page_header')
Linnké multi matiere a multi class
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Linnké multi matiere a multi class</a></li>

@endsection

@section('styles')
<style media="screen">

select[multiple] {
    height: 300px !important;
}
</style>

@endsection

@section('content')

{!! Form::open(['route' => 'teatcherifications.store-multi-link', 'files' => false, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau etudient

  @endslot


  @slot('sectionPlain')

    {{ csrf_field() }}


    <div class="text-center">
      <h3 >Classement</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'teatchers[]', 'type' => 'select','selected' => null, 'text' => 'Les maitres', 'class'=>'', 'required' => true, 'array' => $teatchers,'additionalInfo' => ['multiple' => 'multiple']])

    @include('back.partials.formG', ['name' => 'subject_classes[]', 'type' => 'select','selected' => null, 'text' => 'Matiere et class', 'class'=>'', 'required' => true, 'array' => $selection,'additionalInfo' => ['multiple' => 'multiple']])

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

@endsection
