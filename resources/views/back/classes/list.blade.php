@extends('back.layouts.app')



@section('styles')



@endsection

@section('content')





      <!-- Small boxes (Stat box) -->
      <div class="row">



      </div>
      <!-- /.row -->






@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')



    <div class="row">




      <div class="col-xs-12">

          <h3>Biling</h3>

          @foreach($classes as $class)
                  <div class="col-lg-4 col-xs-6">
                        <div class="info-box bg-yellow ">
                          <span class="info-box-icon"><i class="fa fa-hashtag"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">{{ $class->name }}</span>
                            <span class="info-box-number">5,200</span>

                            <div class="progress">
                              <div class="progress-bar" style="width: 50%"></div>
                            </div>
                            <span class="progress-description">
                                  <a href="{{ route('bilings.by-class', $class->id) }}">Biling <i class="fa fa-arrow-circle-right"></i></a>
                                </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>

                  </div>

          @endforeach
      </div>




    <div class="col-xs-12">

        <h3>Profils</h3>

        @foreach($classes as $class)
                <div class="col-lg-4 col-xs-6">
                      <div class="info-box bg-yellow ">
                        <span class="info-box-icon"><i class="fa fa-hashtag"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">{{ $class->name }}</span>
                          <span class="info-box-number">5,200</span>

                          <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                          </div>
                          <span class="progress-description">
                                <a href="{{ route('students.profile-by-class', $class->id) }}">lISTER Le Profile des etudiants <i class="fa fa-arrow-circle-right"></i></a>
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>

                </div>

        @endforeach
    </div>
    </div>
        <hr />

<div class="row">
<div class="col-xs-12">

    <h3>Login</h3>

    @foreach($classes as $class)
            <div class="col-lg-4 col-xs-6">
                  <div class="info-box bg-yellow ">
                    <span class="info-box-icon"><i class="fa fa-hashtag"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">{{ $class->name }}</span>
                      <span class="info-box-number">5,200</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                      </div>
                      <span class="progress-description">
                            <a href="{{ route('students.login-by-class', $class->id) }}">lISTER Le LOGIN DES ETUDIANTS <i class="fa fa-arrow-circle-right"></i></a>
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>

            </div>

    @endforeach
</div>
</div>
    <hr />




<div class="row">
<div class="col-xs-12">
        <h3>Notes</h3>

        @foreach($classes as $class)

                <div class="col-lg-4 col-xs-6">
                      <div class="info-box bg-yellow ">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">{{ $class->name }}</span>
                          <span class="info-box-number">5,200</span>

                          <div class="progress">
                            <div class="progress-bar" style="width: 50%"></div>
                          </div>
                          <span class="progress-description">
                                <a href="{{ route('notes.by-class', $class->id ) }}" >Notes<i class="fa fa-arrow-circle-right"></i></a>
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                </div>

        @endforeach
</div>
      </div>
          <hr />




      <div class="row">
<div class="col-xs-12">

    <h3>Emploi de temps</h3>

    @foreach($classes as $class)

            <div class="col-lg-4 col-xs-6">
                  <div class="info-box bg-yellow ">
                    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">{{ $class->name }}</span>
                      <span class="info-box-number">5,200</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                      </div>
                      <span class="progress-description">
                            <a href="{{ route('calendarteatchifications.manage-byclass', $class->id) }}" >Emploi du temps<i class="fa fa-arrow-circle-right"></i></a>
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
            </div>

    @endforeach
</div>
  </div>
      <hr />




  <div class="row">
<div class="col-xs-12">
<h3>Payements</h3>

@foreach($classes as $class)
        <div class="col-lg-4 col-xs-6">
              <div class="info-box bg-yellow ">
                <span class="info-box-icon"><i class="fa fa-hashtag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">{{ $class->name }}</span>
                  <span class="info-box-number">5,200</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                        <a href="{{ route('students.by-class', $class->id) }}" >lISTER LES ETUDIANTS <i class="fa fa-arrow-circle-right"></i></a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>

        </div>

@endforeach
</div>
</div>
    <hr />




<div class="row">
<div class="col-xs-12">



<h3>Subjects</h3>

@foreach($classes as $class)
        <div class="col-lg-4 col-xs-6">
              <div class="info-box bg-white ">
                <span class="info-box-icon"><i class="fa fa-hashtag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">{{ $class->name }}</span>
                  <span class="info-box-number">5,200</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                        <a href="{{ route('subjects.by-class', $class->id) }}" >lister les Matiers <i class="fa fa-arrow-circle-right"></i></a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>

        </div>

@endforeach



</div>
</div>

    <hr />
<div class="row">
<div class="col-xs-12">
  <div class="col-lg-4 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
      <div class="inner">
        <h3>Matiére et classes</h3>
        <p><a href="#">Linker plusieru matiéres a plusieur classes</a></p>
      </div>
      <div class="icon">
        <i class="fa fa-list-ol"></i>
      </div>
      <a href="{{ route('classes.multiple-subjs') }}" class="small-box-footer">Linker plusieru matiéres a plusieur classe<i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

</div>




</div>

    <hr />




<div class="row">
<div class="col-xs-12">
<h3>Fournitures</h3>

@foreach($classes as $class)
        <div class="col-lg-4 col-xs-6">
              <div class="info-box bg-black ">
                <span class="info-box-icon"><i class="fa fa-hashtag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">{{ $class->name }}</span>
                  <span class="info-box-number">5,200</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                        <a href="{{ route('fournitures.by-class', $class->id) }}" >lister les Fournitures <i class="fa fa-arrow-circle-right"></i></a>
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>

        </div>

@endforeach
</div>
</div>
<hr />

<div class="col-xs-12">
  <div class="row">


    <div class="col-lg-4 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-{{ ArrayHolder::backgroundColors()  }}">
        <div class="inner">
          <h3>Matiére et classes</h3>
          <p><a href="#">Linker plusieru matiéres a plusieur classes</a></p>
        </div>
        <div class="icon">
          <i class="fa fa-list-ol"></i>
        </div>
        <a href="{{ route('classes.multiple-subjs') }}" class="small-box-footer">Linker plusieru matiéres a plusieur classe<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>


  </div>

</div>



<hr />


  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


@endsection

@section('datatableScript')




@endsection

@section('scripts')


</script>
@endsection
