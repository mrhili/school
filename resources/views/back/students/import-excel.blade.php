
@section('title')
L'ajout dune feuille des etudiant
@endsection

@extends('back.layouts.app')



@section('styles')


@endsection

@section('page_header')
L'ajout dune feuille des etudiant
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> L'ajout dune feuille des etudiant</li>
@endsection

@section('content')


  {!! Form::open(['route' => 'students.post-import-excel', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

  @component('back.components.plain')

    @slot('titlePlain')

      Ajouter feuille des etudiants

    @endslot




      {{ csrf_field() }}


      <div class="text-center">
        <h3 >Ajouter feuille des etudiants</h3>
        <p>
          ...
        </p>
      </div>

      <input type="file" name="sheet" />

    @slot('footerPlain')

      @component('back.components.button')

        @slot('value')
          Importer
        @endslot



      @endcomponent

    @endslot

  @endcomponent



@endsection
