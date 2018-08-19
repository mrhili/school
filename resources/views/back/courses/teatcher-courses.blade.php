@extends('back.layouts.app')

@section('title')
  Cours de: {{ $teatcher->name }} {{ $teatcher->last_name }}
@endsection


@section('styles')

@endsection




@section('page_header')
  Mes cours
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }}
@endsection

@section('breadcrumbXXXXXXXXXXXXXXXXXXXXXXXXX')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
  </ol>
@endsection


@section('content')



    <div class="row">
      <div class="col-xs-12">


        <div class="box box-solid">
            <div class="box-body">

                <div class="media">

                    <div class="media-body">
                        <div class="clearfix">
                            <p class="pull-right">
                                <a href="{{ route('courses.list-4-teatcher', Auth::id() ) }}" class="btn btn-success btn-sm ad-click-event">
                                    Ajouter un cours sans linké a un class
                                </a>
                                <a href="{{ route('courses.choose') }}" class="btn btn-success btn-sm ad-click-event">
                                    Linké un cours a un class et matiére
                                </a>
                            </p>

                            <h4 style="margin-top: 0">Ajouter un cours</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>



      </div>
    </div>
















  @forelse( $courseYSC as $course )


            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">



                  <li class=""><a href="#subcourse-{{ $course->id }}" data-toggle="tab" aria-expanded="false">Les subcoures</a></li>
                  <li class=""><a href="#objective-{{ $course->id }}" data-toggle="tab" aria-expanded="false">Objective</a></li>
                  <li class=""><a href="#content-{{ $course->id }}" data-toggle="tab" aria-expanded="false">Content</a></li>
                  <li class=""><a href="#teaser-{{ $course->id }}" data-toggle="tab" aria-expanded="false">Teaser</a></li>
                  <li class="active"><a href="#intro-{{ $course->id }}" data-toggle="tab" aria-expanded="true">Introduction</a></li>

                  <li class="pull-left header"><i class="fa fa-th"></i> {{ $course->subjectclass->subject->name }} : {{ $course->course->name }} </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="#intro-{{ $course->id }}">
                    {!! $course->course->introduction !!}
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="teaser-{{ $course->id }}">
                    @if( $course->course->teaser_type == 0 )

                      {!! $course->course->teaser_text !!}

                    @else
                      <iframe width="100%" height="500"

                      src="{{ $course->course->teaser_video }}"

                      frameborder="0" allow="autoplay; encrypted-media"

                      allowfullscreen>

                      </iframe>
                    @endif



                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="content-{{ $course->id }}">
                    {!! $course->course->content !!}
                  </div>
                  <div class="tab-pane" id="objective-{{ $course->id }}">
                    {!! $course->course->objective !!}
                  </div>
                  <div class="tab-pane" id="subcourse-{{ $course->id }}">
                    Subcourses
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>

  @empty

    @component('back.components.alert')

      pas de cours

    @endcomponent



  @endforelse


  {!! $courseYSC->links() !!}


@endsection
