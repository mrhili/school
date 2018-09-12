


@extends('back.layouts.app')

@section('title')
Changer une class pour {{ $student->name }} {{ $student->lastname }}
@endsection

@section('page_header')
Changer une class pour {{ $student->name }} {{ $student->lastname }}
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> Changer une class pour {{ $student->name }} {{ $student->lastname }}</li>
@endsection

@section('content')
  {!! Form::open(['route' => ['classes.change-4-student', $student->id], 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

  @component('back.components.plain')

    @slot('titlePlain')
      Changer une class pour {{ $student->name }} {{ $student->lastname }} qui a etait dans {{ $myClass->name }}.
    @endslot

    @component('back.components.alert')
      Tu doit choisire just lalternative de meme niveau
    @endcomponent

    {{ csrf_field() }}


    @include('back.partials.formG', ['name' => 'class', 'type' => 'select','selected' => null, 'text' => 'Class', 'class'=>'', 'required' => true, 'array' => $classes,'additionalInfo' => []])

    @slot('footerPlain')

  	@component('back.components.button')

  	  @slot('value')

  	  	Changer

  	  @endslot

  	@endcomponent

    @endslot

  @endcomponent
  {!! Form::close() !!}


@endsection
