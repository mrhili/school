
@extends('back.layouts.app')

@section('title')
Linker un maitre
@endsection

@section('page_header')
Linker un maitre
@endsection

@section('page_header_desc')
L'année selectionée est {{ Session::get('yearId') }}
@endsection

@section('breadcrumb')
  <li><a href="{{ route('index')  }}"><i class="fa fa-dashboard"></i> Index</a></li>
  <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li><a href="{{ route('courses.teatcher-courses', Auth::id())  }}"><i class="fa fa-dashboard"></i> dashboard</a></li>
  <li class="active"> Matiers : Linker un cour</li>
@endsection


@section('content')

@forelse($classes as $class)
  @component('back.components.plain')
    @slot('titlePlain')
      {{ $class->name }}
    @endslot

    @foreach( $class->subjects as $subject )

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $subject->name }}</h3>
              <h5 class="widget-user-desc">Coéfficient: {{ $subject->pivot->parameter }}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="{{ route('tests.language-linked',[$class->id,$subject->id]) }}">Click pour ajouter un test <span class="pull-right badge bg-aqua">+</span></a></li>

                <li><a href="{{ route('tests.add-linked-linking',[$class->id,$subject->id]) }}">Clicker ici pour linker un test <span class="pull-right badge bg-green">V</span></a></li>


                <li><a href="{{ route('courses.language-linked',[$class->id,$subject->id]) }}">Click pour ajouter un Coure <span class="pull-right badge bg-aqua">+</span></a></li>

                <li><a href="{{ route('courses.add-linked-linking',[$class->id,$subject->id]) }}">Clicker ici pour linker un Coure <span class="pull-right badge bg-green">V</span></a></li>
              </ul>




            </div>
          </div>
          <!-- /.widget-user -->
        </div>

      @endforeach


  @endcomponent


@empty

  @component('back.components.alert')
    Tu a pas le droit de créé aucun cours demande a ladministration de te linké a une class
  @endcomponent

@endforelse




@endsection
