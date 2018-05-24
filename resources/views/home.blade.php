@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')


@if(Auth::check())

    @if(Auth::user()->role == 1)

      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $mytests}}</h3>
              <p><a href="{{ route('tests.mytests') }}">My tests</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol"></i>
            </div>
            
          </div>
        </div>



      </div>
      <!-- /.row -->

    @endif

@endif

      <!-- Small boxes (Stat box) -->
      <div class="row">
      <h1 style="text-center">{{ Session::get('yearName') }}</h1>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{ $students }}</h3>

                  <p><a href="{{ route('students.all') }}" class="text-white">Etudients</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="{{ route('students.add') }}" class="small-box-footer">Ajouter un etudient maintenent <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $parents }}</h3>

              <p><a href="{{ route('parents.all') }}" class="text-white">Parents</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">Ajouter un parent maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $teatchers }}</h3>

              <p><a href="{{ route('users.add', 3) }}" class="text-white">Professeurs</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-pencil"></i>
            </div>
            <a href="#" class="small-box-footer">Ajouter un parent maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $secretarias }}</h3>

              <p><a href="{{ route('users.add', 4) }}" class="text-white">Secretairs</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-laptop"></i>
            </div>
            <a href="#" class="small-box-footer">Ajouter un parent maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->





      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $admins }}</h3>

              <p><a href="{{ route('users.add', 5) }}" class="text-white">Directeurs</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-tachometer"></i>
            </div>
            <a href="#" class="small-box-footer">Ajouter un parent maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $masters }}</h3>

              <p><a href="{{ route('users.add', 6) }}" class="text-white">Masters</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-asterisk"></i>
            </div>
            <a href="#" class="small-box-footer">Ajouter un parent maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


      </div>
      <!-- /.row -->


      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $classes}}</h3>
              <p><a href="{{ route('classes.list') }}">Classes</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol"></i>
            </div>
            <a href="" class="small-box-footer">Ajouter un master maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $subjects}}</h3>
              <p><a href="{{ route('subjects.list') }}">Subjects</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol"></i>
            </div>
            <a href="{{ route('subjects.add') }}" class="small-box-footer">Ajouter une matiére maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $tests}}</h3>
              <p><a href="{{ route('tests.index') }}">Tests</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('tests.add') }}" class="small-box-footer">Ajouter un test maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


      </div>
      <!-- /.row -->






@component('back.components.plain')

  @slot('titlePlain')

Outils

  @endslot


  @slot('sectionPlain')

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
