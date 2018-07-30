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


@foreach($childs as $child)








  @component('back.components.plain')

    @slot('titlePlain')

  Informations a propos le l'enfant: <b>{{ $child->name }} {{ $child->last_name }}</b>

    @endslot


    @slot('sectionPlain')

                    <ul class="users-list clearfix">


                      <li class="fix-users-li">
                        <a class="users-list-name" href="">
                          {!! Html::image(CommonPics::ifImg( 'students' ,  $child->img ),'User Image', ['class' => ''] ) !!}
                        </a>

                        <a class="users-list-name" href="">...</a>




                            <a href=""><span class="users-list-date">...</span></a>

                      </li>

                    </ul>

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

                    </div>

    @endslot


    @slot('footerPlain')



    @endslot


  @endcomponent










@endforeach































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
