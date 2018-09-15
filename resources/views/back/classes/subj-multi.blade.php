

@section('title')
Linker plusier subject à plusieur class
@endsection

@extends('back.layouts.app')


@section('page_header')
Linker plusier subject à plusieur class
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li><a href="{{ route('classes.list')  }}"><i class="fa fa-dashboard"></i> Classes</a></li>
  <li class="active"> Linker plusier subject aà plusieur class</li>
@endsection

@section('styles')
<style media="screen">

select[multiple] {
    height: 300px !important;
}
</style>

@endsection

@section('content')

{!! Form::open(['route' => 'classes.store-multiple-subjs', 'files' => false, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Linker plusier subject à plusieur class

  @endslot


  @slot('sectionPlain')

    {{ csrf_field() }}


    <div class="text-center">
      <h3 >Classement</h3>
      <p>
        ...
      </p>
    </div>

    @include('back.partials.formG', ['name' => 'classes[]', 'type' => 'select','selected' => null, 'text' => 'Class', 'class'=>'', 'required' => true, 'array' => $classes,'additionalInfo' => ['multiple' => 'multiple']])

    @include('back.partials.formG', ['name' => 'subjects[]', 'type' => 'select','selected' => null, 'text' => 'Matiéres', 'class'=>'', 'required' => true, 'array' => $subjects,'additionalInfo' => ['multiple' => 'multiple']])

    @include('back.partials.formG', ['name' => 'parameter', 'type' => 'number', 'text' => 'Cohéficiant', 'class'=>'', 'required' => true,'additionalInfo' => []])

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
