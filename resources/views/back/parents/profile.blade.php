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

              @if($user->role == 1)
                @component('back.components.student_info', ['user' => $user])

                @endcomponent
              @endif

              @if($passInfo)

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
            </ul>
            <div class="tab-content">

              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">

                @if ($passChangeInfo)
                  @component('back.components.change_info')

                  @endcomponent
                @endif



              </div>
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





</script>
@endsection
