@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')

<h1 style="text-center">{{ Session::get('yearName') }}</h1>

        <!-- Small boxes (Stat box) -->
        <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
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

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
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
          </div>
        <!-- /.row -->

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

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>H</h3>
              <p><a href="{{ route('classes.list') }}">Historique</a></p>

              <p>...</p>
            </div>
            <div class="icon">
              <i class="fa fa-history"></i>
            </div>
            <a href="{{ route('histories.master') }}" class="small-box-footer">Historique <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>A</h3>
              <p><a href="{{ route('classes.list') }}">Application Configuration</a></p>

              <p>...</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="{{ route('configs.index') }}" class="small-box-footer">Application Configuration <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>S</h3>
              <p><a href="{{ route('classes.list') }}">School Configuration</a></p>

              <p>...</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="{{ route('configs.index') }}" class="small-box-footer">School Configuration <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



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
