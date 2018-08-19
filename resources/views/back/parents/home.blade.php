@extends('back.layouts.app')

@section('title')
  Parent Dashboard
@endsection

@section('styles')
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">
@endsection

@section('page_header')
  Parent Dashboard
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }}
@endsection

@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
  </ol>
@endsection


@section('content')



  @component('back.components.dashboard_head')



    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Action fait</span>
      </div>
      <!-- /.description-block -->
    </div>
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Meeting arrivé</span>
      </div>
      <!-- /.description-block -->
    </div>
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Observation collécté</span>
      </div>
      <!-- /.description-block -->
    </div>
  @endcomponent


  <!-- Small boxes (Stat box) -->
  <div class="row">






  </div>

  @php

  $array4Childs = [];

  $countChilds = 0;

  @endphp


@foreach($childs as $child)

  @component('back.components.plain')

    @slot('titlePlain')

  Informations a propos le l'enfant: <b>{{ $child->name }} {{ $child->last_name }}</b>

    @endslot


    @slot('sectionPlain')

                    <ul class="users-list clearfix">


                      <li class="fix-users-li">
                        <a class="users-list-name" href="{{ route('students.profile', $child->id) }}">
                          {!! Html::image(CommonPics::ifImg( 'students' ,  $child->img ),'User Image', ['class' => ''] ) !!}
                        </a>

                        <a class="users-list-name" href="{{ route('students.profile', $child->id) }}">{{ $child->name }} {{ $child->las_name }}</a>
                        <a href=""><span class="users-list-date">...</span></a>

                      </li>

                    </ul>

                    <hr />

                    @php

                    $array4Childs[] = Application::loadCalendarForClass( \App\TheClass::find( $child->the_class_id ))

                    @endphp




                    <div class="row">

                      <div class="col-xs-12 calendarsparent">
                        {!! $array4Childs[ $countChilds ]->calendar() !!}
                      </div>

                    </div>

                    <hr />

                    <div class="row">


                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
                          <div class="inner">
                            <h3>Ses fournitures</h3>
                            <p>...</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-graduation-cap"></i>
                          </div>
                          <a href="{{ route('fournitures.child-fournitures', $child->id) }}" class="small-box-footer"> Mes fournitures<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>


                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
                          <div class="inner">
                            <h3>Ses payments</h3>
                            <p>...</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-graduation-cap"></i>
                          </div>
                          <a href="{{ route('studentspayments.child-payments', $child->id) }}" class="small-box-footer"> Mes fournitures<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>

                      <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
                          <div class="inner">
                            <h3>Ses Cours</h3>
                            <p>...</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-graduation-cap"></i>
                          </div>
                          <a href="{{ route('courses.student-courses', $child->id) }}" class="small-box-footer"> Mes fournitures<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>



                    </div>

                    <hr />

                    <div class="row">

                      <h3 class="text-center">Ses maitres</h3>
                      <div class="col-xs-4">
                        @php
                        $teatchifications =  Relation::uniqueTeatchificationFromstudent($year, $child);

                        @endphp

                        @foreach ($teatchifications as $teatchification)

                          @component('back.components.user-block')
                            @slot('link'){{ route('teatchers.profile', $teatchification->teatcher->id) }}@endslot

                            @slot('img')
                              {!! Html::image(CommonPics::ifImg( 'teatchers' ,  $teatchification->teatcher->img ),'User Image', ['class' => 'img-circle img-bordered-sm'] ) !!}
                            @endslot

                            @slot('name')
                                  {{ $teatchification->teatcher->name }} {{ $teatchification->teatcher->last_name }}
                            @endslot

                          @endcomponent

                        @endforeach


                      </div>





                    </div>

    @endslot


    @slot('footerPlain')



    @endslot


  @endcomponent








@php
$countChilds++;
@endphp

@endforeach































@endsection

@section('datatableScript')




@endsection

@section('scripts')

  <script src="{!! asset('adminl/bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/moment/moment.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.js"') !!}"></script>


  <script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>


@foreach( $array4Childs as $childScript )

  {!! $childScript->script() !!}

@endforeach
<!-- Morris.js charts -->

<script src="{!! asset('adminl/bower_components/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/morris.js/morris.min.js') !!}"></script>
<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script>
  $(function () {
    "use strict";






  });
</script>

@endsection
