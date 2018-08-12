
@extends('back.layouts.app')


@section('styles')



@endsection



@section('content')
<div class="row">
        <a href="{{ route('courses.add-linked', [$class,  $subject, 'ar']) }}">
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
        <a href="{{ route('courses.add-linked', [$class,  $subject, 'fr' ]) }}">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Latin</span>
              <span class="info-box-number">Latin</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </a>
        <!-- /.col -->



        <!-- /.col -->
      </div>

@endsection



@section('scripts')

@endsection
