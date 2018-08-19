@extends('back.layouts.app')

@section('title')
  Cours de:
@endsection


@section('styles')
@if($subcourse->language  == 1)
  .invoice{
    direction: rtl !important;
  }
@endif
@endsection




@section('page_header')
  Mes cours
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }} / class:
@endsection

@section('breadcrumbXXXXXXXXXXXXXXXXXXXXXXXXX')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
  </ol>
@endsection


@section('content')





<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{ $subcourse->title }}
            @if($subcourse->language  == 1)
                <small class="pull-left">{{ $subcourse->finishing_time }} دقيقة</small>
            @endif
            <small class="pull-right">{{ $subcourse->finishing_time }} min</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-xs-12">

          @component('back.components.panel',['title' => 'Introduction'])
            {!! $subcourse->introduction !!}
          @endcomponent
        </div>
        <div class="col-xs-12">
          @component('back.components.jumbotron')
            <h3>A Lire attentivement :</h3>
            {!! $subcourse->body !!}
            <hr />
            @component('back.components.alert', ['class' => 'success'])
              <h3>A retenire :</h3>
              {!! $subcourse->to_grasp !!}
            @endcomponent
          @endcomponent
        </div>

        <hr />
        <div class="col-xs-12">
          @component('back.components.panel',['title' => 'Sortie du cours'])
            {!! $subcourse->outro !!}
          @endcomponent
        </div>
        <hr />


      </div>
      <!-- /.row -->

      <!-- Table row -->

      <!-- /.row -->


      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" target="" class="btn btn-default pull-left"><i class="fa fa-print"></i> Print</a>
          <a href="#" target=""  class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Téléchargé PDF
          </a>
        </div>
      </div>
    </section>

    <div class="clearfix"></div>



    <section class="invoice">
          <!-- title row -->
          <div class="row">

            <div class="row no-print">
              <div class="col-xs-12">
                @if( $last )
                  <a href="{{ route('subcourses.show', [ $last->course_id, $last->subcourse_id ]) }}" target="" class="btn btn-default pull-left"><i class="fa fa-chevron-left"></i> Précédent: {{ $last->subcourse->title }}</a>
                @endif

                @if( $next )
                  <a href="{{ route('subcourses.show', [ $next->course_id, $next->subcourse_id ]) }}" target=""  class="btn btn-primary pull-right" style="margin-right: 5px;">
                    Suivant: {{ $last->subcourse->title }} <i class="fa fa-chevron-right"></i>
                  </a>
                @endif


              </div>
            </div>

          </div>
    </section>

    <div class="clearfix"></div>
@endsection
