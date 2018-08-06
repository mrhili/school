@extends('back.layouts.app')

@section('styles')



@endsection

@section('page_header')
  Master Dashboard
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

<h1 class="text-center">{{ Session::get('yearName') }}</h1>

<h2 class="text-center">Personelle</h2>
<div class="row">




        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $observations }}</h3>
              <p><a href="{{ route('observations.my-obs') }}">Observations</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('observations.write') }}" class="small-box-footer">Voire observations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $mymeetings }}</h3>
              <p><a href="{{ route('meetings.mine') }}">MyMeetings</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="" class="small-box-footer">Voire observations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>





</div>

<hr>
<h2 class="text-center">Les gens</h2>
      <!-- Small boxes (Stat box) -->
      <div class="row">

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{ $users }}</h3>
                  <p><a href="{{ route('users.userlist') }}">Users</a></p>
                </div>
                <div class="icon">
                  <i class="fa fa-file"></i>
                </div>
                <a href="{{ route('users.userlist') }}" class="small-box-footer">Voire observations <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
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
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
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
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $teatchers }}</h3>

              <p><a href="{{ route('users.add', 3) }}" class="text-white">Professeurs</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-pen"></i>
            </div>
            <a href="#" class="small-box-footer">Ajouter un parent maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
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
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
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
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
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

<hr>
<h2 class="text-center">Dashboard</h2>
      <!-- Small boxes (Stat box) -->
      <div class="row">


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $demandefournitures }}</h3>
              <p><a href="{{ route('demandefournitures.list') }}">Demande fourniture list</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol"></i>
            </div>
            <a href="{{ route('demandefournitures.list') }}" class="small-box-footer">Management des teatchers et etudes<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>




        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>Num</h3>
              <p><a href="{{ route('teatcherifications.link') }}">...</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol"></i>
            </div>
            <a href="{{ route('teatcherifications.link') }}" class="small-box-footer">Management des teatchers et etudes<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
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
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $subjects}}</h3>
              <p><a href="{{ route('subjects.list') }}">Subjects</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol"></i>
            </div>
            <a href="{{ route('subjects.list') }}" class="small-box-footer">Ajouter une matiére maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $tests}}</h3>
              <p><a href="{{ route('tests.index') }}">Tests</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('tests.language') }}" class="small-box-footer">Ajouter un test maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $fournitures}}</h3>
              <p><a href="{{ route('fournitures.list') }}">Fournitures</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('fournitures.list') }}" class="small-box-footer">Ajouter un test maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $etages }}</h3>
              <p><a href="{{ route('etages.list') }}">Etages</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('etages.list') }}" class="small-box-footer">Ajouter un room maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $roomtypes }}</h3>
              <p><a href="{{ route('roomtypes.list') }}">Room types</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('roomtypes.list') }}" class="small-box-footer">Ajouter un room maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $rooms }}</h3>
              <p><a href="{{ route('rooms.list') }}">Rooms</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('rooms.list') }}" class="small-box-footer">Ajouter un room maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>






        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $objctypes }}</h3>
              <p><a href="{{ route('etages.list') }}">Type dobjet</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('objctypes.list') }}" class="small-box-footer">Ajouter un room maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $objcts }}</h3>
              <p><a href="{{ route('etages.list') }}">Obejcts</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="{{ route('objcts.list') }}" class="small-box-footer">Ajouter un room maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <a class="inner" href="{{ route('callings.all') }}">
              <h3>{{ $callings }}</h3>
              <p>Callings</p>
            </a>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <a href="{{ route('callings.new') }}" class="small-box-footer">Voire observations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <a class="inner" href="{{ route('meetingtypes.list') }}">
              <h3>{{ $meetingtypes }}</h3>
              <p>Meetingttypes</p>
            </a>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <a href="{{ route('meetingtypes.list') }}" class="small-box-footer">Voire observations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <a class="inner" href="{{ route('meetings.list') }}">
              <h3>{{ $meetings }}</h3>
              <p>Meetings</p>
            </a>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <a href="{{ route('meetings.list') }}" class="small-box-footer">Voire observations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <a class="inner" href="{{ route('meetingpopulatings.managelist') }}">
              <h3>{{ $meetingsCreatedbyme }}</h3>
              <p>Manage meeting</p>
            </a>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <a href="{{ route('meetingpopulatings.managelist') }}" class="small-box-footer">Voire observations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <a class="inner" href="{{ route('courses.list') }}">
              <h3>{{ $courses }}</h3>
              <p>Courses</p>
            </a>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <a href="{{ route('courses.list') }}" class="small-box-footer">Voire observations <i class="fa fa-arrow-circle-right"></i></a>
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
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
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
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>A</h3>
              <p><a href="{{ route('configs.index') }}">Application Configuration</a></p>

              <p>...</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="{{ route('configs.add') }}" class="small-box-footer">Application Configuration <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>S</h3>
              <p><a href="{{ route('schoolconfigs.index') }}">School Configuration</a></p>

              <p>...</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="{{ route('schoolconfigs.add') }}" class="small-box-footer">School Configuration <i class="fa fa-arrow-circle-right"></i></a>
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
