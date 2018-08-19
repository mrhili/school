@extends('back.layouts.app')

@section('title')
  Cours de: {{ $student->name }} {{ $student->last_name }}
@endsection


@section('styles')

@endsection




@section('page_header')
  Mes cours
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }} / class: {{  $student->the_class->name  }}
@endsection

@section('breadcrumbXXXXXXXXXXXXXXXXXXXXXXXXX')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
  </ol>
@endsection


@section('content')


  @forelse( $courseYSC as $course )


            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">




                  <li class=""><a href="#subcourse-{{ $course->id }}" data-toggle="tab" aria-expanded="false">Les subcoures</a></li>
                  <li class=""><a href="#objective-{{ $course->id }}" data-toggle="tab" aria-expanded="false">Objective</a></li>
                  <li class=""><a href="#content-{{ $course->id }}" data-toggle="tab" aria-expanded="false">Content</a></li>
                  <li class=""><a href="#teaser-{{ $course->id }}" data-toggle="tab" aria-expanded="false">Teaser</a></li>
                  <li class="active"><a href="#intro-{{ $course->id }}" data-toggle="tab" aria-expanded="true">Introduction</a></li>

                  <li class="pull-left header"><i class="fa fa-th"></i> {{ $course->subjectclass->subject->name }} : {{ $course->course->name }}</li>
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



                    <ul class="products-list product-list-in-box">
                      @foreach( $course->course->subcourses as $subcourse)
                      <li class="item">

                        <div class="product-info">
                          <a href="{{ route('subcourses.show',[$course->course->id, $subcourse->id] ) }}" class="product-title">{{ $subcourse->title }}
                            <span class="label label-warning pull-right">{{ $subcourse->finishing_time }} min</span></a>
                          <span class="product-description">
                                {{ $subcourse->introduction }}
                              </span>
                        </div>
                      </li>

                    @endforeach
                    </ul>


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
