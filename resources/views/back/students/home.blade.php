@extends('back.layouts.app')

@section('title')
  Etudiant Dashboard
@endsection


@section('styles')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">

@endsection




@section('page_header')
  Etudiant Dashboard
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }} / année scolaire: {{ Auth::user()->the_class->name }}
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
        <h5 class="description-header">{{ $teatchifications->count() }}</h5>
        <span class="description-text">Maitres</span>
      </div>
      <!-- /.description-block -->
    </div>
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">{{Auth::user()->relashionshipsParentsStudent->count() }}</h5>
        <span class="description-text">Parents</span>
      </div>
      <!-- /.description-block -->
    </div>

    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">{{Auth::user()->relashionshipsParentsStudent->count() }}</h5>
        <span class="description-text">Fournitures eu</span>
      </div>
      <!-- /.description-block -->
    </div>

    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">{{Auth::user()->relashionshipsParentsStudent->count() }}</h5>
        <span class="description-text">Fournitures non eu</span>
      </div>
      <!-- /.description-block -->
    </div>

    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Test passé</span>
      </div>
      <!-- /.description-block -->
    </div>
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Exercice passé</span>
      </div>
      <!-- /.description-block -->
    </div>
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Cours absenté</span>
      </div>
      <!-- /.description-block -->
    </div>
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
        <span class="description-text">Note posé</span>
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
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Année vecu</span>
      </div>
      <!-- /.description-block -->
    </div>
  @endcomponent

  <div class="row"></div>

  @component('back.components.plain')

    @slot('titlePlain')

      Calendrier

    @endslot

    <div class="calendarparent">

      {!! $calendar->calendar() !!}

    </div>

  @endcomponent



        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="inner">
                <h3>Mes fournitures</h3>
                <p>...</p>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
              <a href="{{ route('fournitures.my-fournitures') }}" class="small-box-footer"> Mes fournitures<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->



              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
                  <div class="inner">
                    <h3>Mes notes</h3>
                    <p>...</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <a href="{{ route('notes.my-notes') }}" class="small-box-footer"> Mes notes<i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
          <!-- ./col -->



          </div>
        <!-- /.row -->

@component('back.components.plain')

  @slot('titlePlain')

    Parents

  @endslot


  @slot('sectionPlain')


                      <ul class="users-list clearfix">
                        @foreach(Auth::user()->relashionshipsParentsStudent as $parent)
                        <li>
                          {!! Html::image(CommonPics::ifImg( 'parents' ,  $parent->img ),'User Image', ['class' => ''] ) !!}
                          <a class="users-list-name" href="{{ route('parents.profile', $parent->id) }}">{{ $parent->name }} {{ $parent->last_name }}</a>
                          <span class="users-list-date">relationship</span>
                        </li>
                        @endforeach

                      </ul>





  @endslot
  @slot('footerPlain')



  @endslot





@endcomponent


@component('back.components.plain')

  @slot('titlePlain')

    Les maitres

  @endslot


  @slot('sectionPlain')


                      <ul class="users-list clearfix">
                        @foreach( $teatchifications as $teatchification)
                        <li>
                          {!! Html::image(CommonPics::ifImg( 'teatchers' ,  $teatchification->teatcher->img ),'User Image', ['class' => ''] ) !!}
                          <a class="users-list-name" href="">{{ $teatchification->teatcher->name }} {{ $teatchification->teatcher->last_name }}</a>
                          <span class="users-list-date">...</span>
                        </li>
                        @endforeach

                      </ul>


  @endslot






@endcomponent



@component('back.components.plain')

  @slot('titlePlain')

Examins

  @endslot


  @slot('sectionPlain')

        <!-- Small boxes (Stat box) -->
        <div class="row">
<div class="col-xs-12">
        <h3>Mes tests</h3>


  @forelse($mytests as $test)

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>{{ $test->test->title }}</h3>
                    <p><a href="{{ route('tests.my-tests') }}">{{ $test->test->title }}</a></p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-graduation-cap"></i>
                  </div>
                  <a href="{{ route('tests.pass-test',[$test->test->id, $test->subject_the_class_id] ) }}" class="small-box-footer">... <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
          <!-- ./col -->

  @empty

          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Il ya pas de test maintenent.
          </div>

  @endforelse

</div>

          </div>
        <!-- /.row -->


  @endslot



  @slot('footerPlain')



  @endslot





@endcomponent











@component('back.components.plain')

  @slot('titlePlain')

    Payments

  @endslot

  @component('back.components.table',['id' => 'payments', 'columns'=>['Month' , 'Statut']])

  @endcomponent


@endcomponent






@endsection

@section('datatableScript')


@endsection




@section('scripts')

  <script src="{!! asset('adminl/bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/moment/moment.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.js"') !!}"></script>


  <script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

{!! $calendar->script() !!}
<!-- Morris.js charts -->

<script src="{!! asset('adminl/bower_components/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/morris.js/morris.min.js') !!}"></script>
<script src="{!! asset('axios/axios.min.js') !!}"></script>




@endsection
