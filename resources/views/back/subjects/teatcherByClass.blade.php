
@extends('back.layouts.app')


@section('styles')



@endsection



@section('content')






<div class="row" id="subjects">


    @foreach( $subjectclass as $subjectclass  )


        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $subjectclass->subject->name }}</h3>
              <h5 class="widget-user-desc">...</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="{{ route('tests.language-linked',[$class->id,$subjectclass->subject->id]) }}">Click pour ajouter un test <span class="pull-right badge bg-aqua">+</span></a></li>

                <li><a href="{{ route('tests.add-linked-linking',[$class->id,$subjectclass->subject->id]) }}">Clicker ici pour linker un test <span class="pull-right badge bg-green">V</span></a></li>


                <li><a href="{{ route('courses.language-linked',[$class->id,$subjectclass->subject->id]) }}">Click pour ajouter un Coure <span class="pull-right badge bg-aqua">+</span></a></li>

                <li><a href="{{ route('courses.add-linked-linking',[$class->id,$subjectclass->subject->id]) }}">Clicker ici pour linker un Coure <span class="pull-right badge bg-green">V</span></a></li>

                <li><a href="{{ route('preperfications.mine-by-sub-class',[$class->id,$subjectclass->subject->id]) }}">Preperfication <span class="pull-right badge bg-green">+</span></a></li>

              </ul>




            </div>
          </div>
          <!-- /.widget-user -->
        </div>

    @endforeach

</div>




@endsection

@section('datatableScript')



@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>

<script type="text/javascript">

var subjects = $('#subjects');

var the_class = {{ $class->id }};

</script>
@endsection
