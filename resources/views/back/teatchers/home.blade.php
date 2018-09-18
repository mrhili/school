@extends('back.layouts.app')

@section('title')
  Maitre Dashboard
@endsection


@section('styles')
<link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

<link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.print.min.css') !!}" media="print">



@endsection

@section('page_header')
  Teatcher Dashboard
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
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Examin posé</span>
      </div>
      <!-- /.description-block -->
    </div>
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Examin posé</span>
      </div>
      <!-- /.description-block -->
    </div>
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Sujet etudie</span>
      </div>
      <!-- /.description-block -->
    </div>
    <div class="col-sm-4 border-right">
      <div class="description-block">
        <h5 class="description-header">3,200</h5>
        <span class="description-text">Class etudie</span>
      </div>
      <!-- /.description-block -->
    </div>
  @endcomponent


  <!-- Small boxes (Stat box) -->
  <div class="row">






        <div class="col-md-6">


          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Cours pour demander une validation</h3>

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
                    <th>Validation</th>
                  </tr>
                  </thead>
                  <tbody>


                  @foreach( $courses2rValidate as $course2rValidate )

                    <tr>
                      <td><a href="{{ route('subcourses.add-link', $course2rValidate->course->id ) }}" target="_blank" class="btn btn-xs btn-info">
                        {{ $course2rValidate->course->name }}</a></td>
                      <td>{{ $course2rValidate->course->subcourses->count() }}</td>
                      <td>{{ $course2rValidate->subject->title }}</td>
                      <td>{{ $course2rValidate->class->name }}</td>
                      <td><a href="#" class="btn btn-xs btn-info btn-r-valide" data-id="{{$course2rValidate->id}}">{{ $course2rValidate->course->name }}</a></td>
                    </tr>

                  @endforeach

                  </tbody>
                </table>
              </div>



              <div class="col-xs-12">Info : <span class="label label-warning">Une demande recue</span> <span class="label label-default">Pas de demande</span></div>

              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Regardez tout</a>
            </div>
            <!-- /.box-footer -->
          </div>






        </div>









        <div class="col-md-6">


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
                    <th>Matiére</th>
                    <th>Class</th>
                    <th>Temps</th>
                    <th>Navigation</th>
                    <th>Type</th>
                    <th>Demande de Validation</th>
                  </tr>
                  </thead>
                  <tbody>


                  @foreach( $tests2rValidate as $test2rValidate )

                    <tr>
                      <td><a href="" target="_blank" class="btn btn-xs btn-info">{{ $test2rValidate->test->title }}</a></td>


                      <td>{{ $test2rValidate->subjectclass->subject->name }}</td>
                      <td>{{ $test2rValidate->subjectclass->the_class->name }}</td>
                      <td>{{ $test2rValidate->test->time_minutes }}</td>
                      <td>{{ Application::test_type_navigator($test2rValidate->navigator ) }}</td>
                      <td>{{ Application::test_type($test2rValidate->is_exercise ) }}</td>
                      <td><a href="#" class="btn btn-xs btn-info btn-r-valide-test" data-id="{{$test2rValidate->id}}">demander validation</a></td>

                    </tr>

                  @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Regardez tout</a>
            </div>
            <!-- /.box-footer -->
          </div>






        </div>

































    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
        <div class="inner">
          <h3>Mes cours créé</h3>
          <p><a href="{{ route('courses.teatcher-courses', Auth::user()->id) }}" class="small-box-footer"> Mes cours créé</a></p>
        </div>
        <div class="icon">
          <i class="fa fa-graduation-cap"></i>
        </div>
        <a href="{{ route('courses.teatcher-courses', Auth::user()->id) }}" class="small-box-footer"> Créé un coure <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
        <div class="inner">
          <h3>Mes tests créé</h3>
          <p><a href="{{ route('tests.teatcher-tests', Auth::user()->id) }}" class="small-box-footer"> Mes cours créé</a></p>
        </div>
        <div class="icon">
          <i class="fa fa-graduation-cap"></i>
        </div>
        <a href="{{ route('courses.teatcher-courses', Auth::user()->id) }}" class="small-box-footer"> Créé un coure <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>


    <!-- ./col -->

  </div>



  @component('back.components.plain')

    @slot('titlePlain')

      Calendrier

    @endslot

    <div class="calendarparent">

      {!! $calendar->calendar() !!}

    </div>

  @endcomponent




  @component('back.components.plain')

    @slot('titlePlain')

      Les etudiants

    @endslot


    @slot('sectionPlain')



      @component('back.components.table',['id' => 'students','columns' => ['img', 'namecomplet', 'dahboard'] ])

      @endcomponent


    @endslot


  @endcomponent



@endsection

@section('datatableScript')

<!-- DataTables -->
<script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>


@endsection

@section('scripts')
  <script src="{!! asset('adminl/bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/moment/moment.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fullcalendar/dist/fullcalendar.min.js"') !!}"></script>


  <script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

{!! $calendar->script() !!}
<!-- Morris.js charts -->

  <script type="text/javascript">
  $(function() {
      $('#students').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{!! route('students.by-teatcher', Auth::id() ) !!}",
          columns: [

              { data: 'img', name: '' },
              { data: 'namecomplet', name: '' },
              { data: 'dashboard', name: '' }
          ]
      });
  });

  </script>

<!-- Morris.js charts -->

<script src="{!! asset('adminl/bower_components/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/morris.js/morris.min.js') !!}"></script>
<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script>
  $(function () {
    "use strict";






  });
</script>

<script type="text/javascript">



  $(document).ready(function(){
    var btnrvalide = $('.btn-r-valide');
    var btnrvalidetest = $('.btn-r-valide-test');

    btnrvalide.click(function(e){
      e.preventDefault();
      $this = $(this);
      $this.attr('disabled', true);

      axios.post('/request-valid-course/'+ $this.attr('data-id'),{
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      .then(function (response) {

        $this.attr('disabled', false);
        swal({
          position: 'top-end',
          type: 'success',
          title: 'Demande de validation avec success',
          showConfirmButton: false,
          timer: 1500
        })

        $this.parent().parent().remove();

      })
      .catch(function (error) {

        console.log(error);
        $this.attr('disabled', false);
        swal(
          'Erreur de demande de validation',
          error,
          'error'
        )
        console.log( error );
      });



    });

    /*********************************/



        btnrvalidetest.click(function(e){
          e.preventDefault();
          $this = $(this);
          $this.attr('disabled', true);

          axios.post('/request-valid-test/'+ $this.attr('data-id'),{
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          })
          .then(function (response) {

            $this.attr('disabled', false);
            swal({
              position: 'top-end',
              type: 'success',
              title: 'Demande de validation avec success',
              showConfirmButton: false,
              timer: 1500
            })

            $this.parent().parent().remove();

          })
          .catch(function (error) {

            console.log(error);
            $this.attr('disabled', false);
            swal(
              'Erreur de demande de validation',
              error,
              'error'
            )
            console.log( error );
          });



        });



  });



</script>

@endsection
