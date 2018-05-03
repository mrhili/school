@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')



      <!-- Small boxes (Stat box) -->
      <div class="row">
      <h1 style="text-center">{{ Session::get('yearName') }}</h1>
      <a href="{{ route('students.add') }}">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>150</h3>

                  <p>Nouveau etudients</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <div class="small-box-footer">Ajouter un etudient maintenent <i class="fa fa-arrow-circle-right"></i></div>
              </div>
            </div>
        </a>
        <!-- ./col -->
      <a href="{{ route('parents.add') }}">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Nouveau parent</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <div  class="small-box-footer">Ajouter un parent maintenent <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div>
        </a>
        <!-- ./col -->
        <a href="{{ route('teatchers.add') }}">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Nouveau professeur</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <div href="#" class="small-box-footer">Ajouter un professeur maintenent <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div>
        </a>
        <!-- ./col -->
        <a href="{{ route('secretarias.add') }}">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Nouveau secretaire</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <div href="#" class="small-box-footer">Ajouter un ouveau secretaire maintenent <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div>
        </a>
        <!-- ./col -->
      </div>
      <!-- /.row -->





      <!-- Small boxes (Stat box) -->
      <div class="row">

        <a href="{{ route('admins.add') }}">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Nouveau directeur</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <div href="#" class="small-box-footer">Ajouter un nouveau directeur maintenent <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div>
        </a>

        <a href="">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Nouveau Master</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <div href="#" class="small-box-footer">Ajouter un master maintenent <i class="fa fa-arrow-circle-right"></i></div>
          </div>
        </div>
        </a>


      </div>
      <!-- /.row -->


      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>6</h3>
              <p>Classes</p>

              <p><a href="{{ route('classes.list') }}">Lister les classses </a></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="" class="small-box-footer">Ajouter un master maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



      </div>
      <!-- /.row -->






@component('back.components.plain')

  @slot('titlePlain')

Outils

  @endslot


  @slot('sectionPlain')

      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>H</h3>
              <p>Historique</p>

              <p>...</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('histories.master') }}" class="small-box-footer">Historique <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>A</h3>
              <p>Application Configuration</p>

              <p>...</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('configs.index') }}" class="small-box-footer">Application Configuration <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>S</h3>
              <p>School Configuration</p>

              <p>...</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('configs.index') }}" class="small-box-footer">School Configuration <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



      </div>
      <!-- /.row -->

  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')




@endsection

@section('scripts')


@endsection
