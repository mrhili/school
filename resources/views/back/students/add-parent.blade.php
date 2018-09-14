

@section('title')
L'ajout dun parent
@endsection

@extends('back.layouts.app')



@section('styles')


@endsection

@section('page_header')
L'ajout dun parent
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> L'ajout dun parent</li>
@endsection

@section('content')

{!! Form::open(['route' => ['students.add-parent-post', $student], 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

Nouveau parent

  @endslot


  @slot('sectionPlain')

    {{ csrf_field() }}



    @include('back.partials.add-parent-form')





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
