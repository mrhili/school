@extends('back.layouts.app')

@section('styles')

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






  });
</script>

@endsection
