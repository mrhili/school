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

<h3>Students</h3>

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

<hr />

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

<hr />

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
