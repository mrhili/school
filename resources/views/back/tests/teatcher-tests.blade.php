@extends('back.layouts.app')

@section('title')
  Tests de: {{ $teatcher->name }} {{ $teatcher->last_name }}
@endsection


@section('styles')

@endsection




@section('page_header')
  Mes tests
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }}
@endsection

@section('breadcrumbXXXXXXXXXXXXXXXXXXXXXXXXX')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
  </ol>
@endsection


@section('content')



    <div class="row">
      <div class="col-xs-12">


        <div class="box box-solid">
            <div class="box-body">

                <div class="media">

                    <div class="media-body">
                        <div class="clearfix">
                            <p class="pull-right">
                                <a href="{{ route('tests.language' ) }}" class="btn btn-success btn-sm ad-click-event">
                                    Ajouter un test sans linké a un class
                                </a>
                                <a href="{{ route('courses.choose') }}" class="btn btn-success btn-sm ad-click-event">
                                    Linké un test a un class et matiére
                                </a>
                            </p>

                            <h4 style="margin-top: 0">Ajouter un test</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>



      </div>
    </div>
















  @forelse( $testYSC as $test )


    <div class="col-md-4">
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-yellow">
          <div class="widget-user-image">
            <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
          </div>
          <!-- /.widget-user-image -->
          <h3 class="widget-user-username">{{ $test->title }}</h3>
          <h5 class="widget-user-desc">Lead Developer</h5>
        </div>
        <div class="box-footer no-padding">
          <ul class="nav nav-stacked">
            <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
          </ul>
        </div>
      </div>
      <!-- /.widget-user -->
    </div>

  @empty

    @component('back.components.alert')

      pas de test

    @endcomponent



  @endforelse


  {!! $testYSC->links() !!}


@endsection
