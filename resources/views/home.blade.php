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


  @component('back.components.dashboard_head')


    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">dodododo</span>
      </div>
      <!-- /.description-block -->
    </div>

  @endcomponent

  <div class="row">

    <div class="col-xs-6">


      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Courses pour validé</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Title</th>
                <th>Nombre du Subcourses</th>
                <th>Matiére</th>
                <th>Class</th>
                <th>Teatcher</th>
                <th>Demande de validation</th>
                <th>Validation</th>
              </tr>
              </thead>
              <tbody>


              @foreach( $courses2Validate as $course2Validate )

                <tr>
                  <td><a href="{{ route('subcourses.add-link', $course2Validate->course->id ) }}" target="_blank" class="btn btn-xs btn-info">{{ $course2Validate->course->name }}</a></td>
                  <td>{{ $course2Validate->course->subcourses->count() }}</td>
                  <td>{{ $course2Validate->subject->title }}</td>
                  <td>{{ $course2Validate->class->name }}</td>
                  <td>{{ $course2Validate->teatcher->name }} {{ $course2Validate->teatcher->last_name }}</td>
                  <td><span class="label label-{{ $course2Validate->req_publish? 'warning':'default' }}">Demande de validation</span></td>
                  <td><a href="#" class="btn btn-xs btn-info btn-valide" data-id="{{$course2Validate->id}}">{{ $course2Validate->course->name }}</a></td>
                </tr>

              @endforeach

              </tbody>
            </table>
          </div>

          <!-- /.table-responsive -->
          <div class="col-xs-12">Info : <span class="label label-warning">Une demande recue</span> <span class="label label-default">Pas de demande</span></div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">

          <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Regardez tout</a>
        </div>
        <!-- /.box-footer -->
      </div>






    </div>









    <div class="col-xs-6">


      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Tests pour validé</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th>Title</th>
                <th>Maitre</th>
                <th>Matiére</th>
                <th>Class</th>
                <th>Temps</th>
                <th>Navigation</th>
                <th>Type</th>
                <th>Demande de validation</th>
                <th>Temps de fin</th>
                <th>Validation</th>
              </tr>
              </thead>
              <tbody>


              @foreach( $tests2Validate as $test2Validate )

                <tr>
                  <td><a href="{{ route('tests.show', $test2Validate->test->id) }}" target="_blank" class="btn btn-xs btn-info">{{ $test2Validate->test->title }}</a></td>
                  <td>{{ $test2Validate->subjectclass->subject->name }}</td>
                  <td>{{ $test2Validate->teatcher->name }} {{ $test2Validate->teatcher->last_name }}</td>
                  <td>{{ $test2Validate->subjectclass->the_class->name }}</td>
                  <td>{{ $test2Validate->test->time_minutes }}</td>
                  <td>{{ Application::test_type_navigator($test2Validate->navigator ) }}</td>
                  <td>{{ Application::test_type($test2Validate->is_exercise ) }}</td>
                  <td><span class="label label-{{ $test2Validate->req_publish? 'warning':'default' }}">Demande de validation</span></td>

                  <td>{{ Carbon::parse($test2Validate->end)->diffForHumans()  }}</td>
                  <td><a href="#" class="btn btn-xs btn-info btn-valide-test" data-id="{{$test2Validate->id}}">Validé</a></td>
                </tr>

              @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->

          <div class="col-xs-12">Info : <span class="label label-warning">Une demande recue</span> <span class="label label-default">Pas de demande</span></div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">

          <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Regardez tout</a>
        </div>
        <!-- /.box-footer -->
      </div>






    </div>















  </div>


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
      </div>
      <div class="row">




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


          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
              <div class="inner">
                <h3>Xcl</h3>

                <p><a href="{{ route('students.import-excel') }}" class="text-white">Importer les etudiants depuis excel</a></p>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap"></i>
              </div>
              <a href="{{ route('students.import-excel') }}" class="small-box-footer">Importer les etudiants depuis excel <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>




        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>{{ $studentsNonValidate }}</h3>

              <p><a href="{{ route('students.validat-them') }}" class="text-white">Valider les Etudients depuis massar</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="{{ route('students.add') }}" class="small-box-footer">Ajouter un etudient maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>MG</h3>

              <p><a href="#" class="text-white">Mighration groupé</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="{{ route('students.migration') }}" class="small-box-footer">Ajouter un etudient maintenent <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



    <!-- ./col -->
      </div>

      <div class="row">





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
            <a href="{{ route('parents.add') }}" class="small-box-footer">Linker un parent a un eleve <i class="fa fa-arrow-circle-right"></i></a>
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
    <div class="row">


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
            <div class="inner">
              <h3>G L</h3>

              <p><a href="{{ route('users.big-list') }}" class="text-white">Grduations</a></p>
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
              <h3>Login</h3>

              <p>..</p>
            </div>
            <div class="icon">
              <i class="fa fa-tachometer"></i>
            </div>
            <a href="{{route('users.login')}}" class="small-box-footer">Login<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


    </div>
    <!-- /.row -->

<hr>
<h2 class="text-center">Dashboard</h2>
      <!-- Small boxes (Stat box) -->

      <div class="row">
          <div class="col-xs-12">
            <h3>Transporting</h3>
            <div class="row">





              <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
                  <div class="inner">
                    <h3>T</h3>
                    <p>Transport Management</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-list-ol"></i>
                  </div>
                  <a href="{{ route('transportings.list') }}" class="small-box-footer">Transport Management<i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
                  <div class="inner">
                    <h3>T</h3>
                    <p>Transport Defecite Management</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-list-ol"></i>
                  </div>
                  <a href="{{ route('transportings.deficites') }}" class="small-box-footer">Transport Defecite Management<i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

            </div>

          </div>
        </div>

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
            <a href="{{ route('demandefournitures.list') }}" class="small-box-footer">Demande fourniture list<i class="fa fa-arrow-circle-right"></i></a>
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
              <h3>Num</h3>
              <p><a href="{{ route('teatcherifications.multi-link') }}">...</a></p>
            </div>
            <div class="icon">
              <i class="fa fa-list-ol"></i>
            </div>
            <a href="{{ route('teatcherifications.multi-link') }}" class="small-box-footer">Management des teatchers et etudes<i class="fa fa-arrow-circle-right"></i></a>
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

<script type="text/javascript">
  $(document).ready(function(){
    var btnvalide = $('.btn-valide');

    var btnvalidetest = $('.btn-valide-test');

    btnvalide.click(function(e){
      e.preventDefault();
      $this = $(this);
      $this.attr('disabled', true);

      axios.post('/valid-course/'+ $this.attr('data-id'),{
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      .then(function (response) {

        $this.attr('disabled', false);
        swal({
          position: 'top-end',
          type: 'success',
          title: 'Validé avec success',
          showConfirmButton: false,
          timer: 1500
        })

        $this.parent().parent().remove();

      })
      .catch(function (error) {

        console.log(error);
        $this.attr('disabled', false);
        swal(
          'Erreur de validation',
          error,
          'error'
        )
        console.log( error );
      });



    });

/*****************************/

btnvalidetest.click(function(e){
  e.preventDefault();
  $this = $(this);
  $this.attr('disabled', true);

  axios.post('/valid-test/'+ $this.attr('data-id'),{
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
  .then(function (response) {

    $this.attr('disabled', false);
    swal({
      position: 'top-end',
      type: 'success',
      title: 'Validé avec success',
      showConfirmButton: false,
      timer: 1500
    })

    $this.parent().parent().remove();

  })
  .catch(function (error) {

    console.log(error);
    $this.attr('disabled', false);
    swal(
      'Erreur de validation',
      error,
      'error'
    )
    console.log( error );
  });



});


  });
</script>

@endsection
