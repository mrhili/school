@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">


              @component('back.components.idcard',['user' => $user])


                @slot('placement')
                    students
                @endslot
              @endcomponent

              <ul class="list-group list-group-unbordered">

                {{--<li class="list-group-item">
                  <b><a href="{{ route('fournitures.my-fournitures') }}">Fournitures</a></b> <a class="pull-right">{{ $fournitures }}</a>
                </li>--}}

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

                @component('back.components.private_info',['user' => $user])

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
              <li class="active"><a href="#rules" data-toggle="tab">Lois</a></li>
              <li class=""><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="rules">

                @component('back.components.rules',['holders' => $holders ])

                @endcomponent
              </div>

              <div class="tab-pane" id="settings">

                @component('back.components.change_info',['user' => $user])

                @endcomponent
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
