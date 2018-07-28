@extends('back.layouts.app')

@section('styles')
  Dashboard
@endsection


@section('styles')



@endsection


@section('page_header')
  Dashboard
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
                          <a class="users-list-name" href="#">{{ $parent->name }} {{ $parent->last_name }}</a>
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
                        @foreach(Auth::user()->relashionshipsParentsStudent as $parent)
                        <li>
                          {!! Html::image(CommonPics::ifImg( 'parents' ,  $parent->img ),'User Image', ['class' => ''] ) !!}
                          <a class="users-list-name" href="#">{{ $parent->name }} {{ $parent->last_name }}</a>
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

      <div class="overlay spin-months-bd">
              En attendent que le chart des benifits et deficites se charge
              <i class="fa fa-refresh fa-spin"></i>
      </div>

      <div class="chart" id="bar-chart" style="height: 300px;"></div>







  @endslot



  @slot('footerPlain')



  @endslot





@endcomponent



        <!-- Small boxes (Stat box) -->
      <div class="row">



      </div>
      <!-- /.row -->
@endsection

@section('datatableScript')




@endsection

@section('scripts')

<!-- Morris.js charts -->

<script src="{!! asset('adminl/bower_components/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/morris.js/morris.min.js') !!}"></script>
<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script>
  $(function () {
    "use strict";


axios.get('/months-bd/')
                .then(function (response) {
                  //BAR CHART
                  var bar = new Morris.Bar({
                    element: 'bar-chart',
                    resize: true,
                    data: response.data ,
                    barColors: ['#00a65a', '#f56954'],
                    xkey: 'y',
                    ykeys: ['a', 'b'],
                    labels: ['Bennefits', 'Deficits'],
                    hideHover: 'auto'
                  });
                  $('.spin-months-bd').hide();
                })
                .catch(function (error) {
                  alert(error);
                  console.log( error );
                });



  });
</script>

@endsection
