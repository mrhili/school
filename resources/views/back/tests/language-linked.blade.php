
@extends('back.layouts.app')


@section('styles')



@endsection



@section('content')
<div class="row">
        <a href="{{ route('tests.add-linked', [$class_id,  $subject_id, 'ar-TN']) }}">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Arabic</span>
              <span class="info-box-number">Arabic</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <!-- /.col -->
        <a href="{{ route('tests.add-linked', [$class_id,  $subject_id, 'fr-FR' ]) }}">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Frensh</span>
              <span class="info-box-number">Frensh</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>


        <a href="{{ route('tests.add-linked', [$class_id,  $subject_id, 'en-US']) }}">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">English</span>
              <span class="info-box-number">English</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>

        <!-- /.col -->
      </div>

@endsection



@section('scripts')

@endsection