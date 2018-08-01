@extends('back.layouts.app')

@section('title')
  User Dashboard
@endsection




@section('page_header')
  User Dashboard
@endsection

@section('page_header_desc')
  ...
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
        <span class="description-text">Exercice passé</span>
      </div>
      <!-- /.description-block -->
    </div>

  @endcomponent



        <!-- Small boxes (Stat box) -->
        <div class="row">



          </div>
        <!-- /.row -->

@component('back.components.plain')

  @slot('titlePlain')

    Vide

  @endslot


  @slot('sectionPlain')

  @endslot





@endcomponent




        <!-- Small boxes (Stat box) -->
      <div class="row">



      </div>
      <!-- /.row -->
@endsection
