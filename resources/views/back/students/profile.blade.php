@extends('back.layouts.app')

@section('styles')

@endsection

@section('content')
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">



              @component('back.components.idcard', ['user' => $user])
                @slot('placement')
                    users
                @endslot
              @endcomponent

              <ul class="list-group list-group-unbordered">



              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              @if($passInfo)
                @component('back.components.student_info', ['user' => $user])

                @endcomponent

                @component('back.components.private_info', ['user' => $user] )

                @endcomponent

              @endif

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>

              @if ($passChangeSensibleInfo)
              <li><a href="#sensible-settings" data-toggle="tab">Sensible Settings</a></li>
              @endif
            </ul>
            <div class="tab-content">


              <div class="active tab-pane" id="settings">

                @if ($passChangeInfo)
                  @component('back.components.change_info', ['user' => $user])

                  @endcomponent
                @endif



              </div>
              @if ($passChangeSensibleInfo)
              <div class="tab-pane" id="sensible-settings">
                <ul class="list-unstyled">
                  <li ><a class="btn btn-info btn-xs" href="{{route('classes.change-4-student-page', $user->id)}}">Changer la class</a></li>
                  <li><button id="delete-student" class="btn btn-danger btn-xs">Suprimer</button></li>
                </ul>

                {!! Form::open(['route' => ['students.delete', $user->id ],'id' => 'form-delete','method' => 'post' ,'class' => 'hidden']) !!}

                  {{ csrf_field() }}

                  <input name="hidden" type="hidden" value="do" />

                {!! Form::close() !!}

              </div>
              @endif
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

@endsection

@section('datatableScript')



@endsection

@section('scripts')



<script type="text/javascript">


$("#delete-student").click(function(){
  $("#form-delete").submit();
});


</script>
@endsection
