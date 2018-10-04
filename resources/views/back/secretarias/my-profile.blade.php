@extends('back.layouts.app')

@section('styles')



@endsection

@section('content')
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">


              @component('back.components.idcard')
                @slot('placement')
                    students
                @endslot
              @endcomponent

              <ul class="list-group list-group-unbordered">

                {{--<li class="list-group-item">
                  <b><a href="{{ route('fournitures.my-fournitures') }}">Fournitures</a></b> <a class="pull-right">{{ $fournitures }}</a>
                </li>--}}

              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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

              @if(Auth::user()->role == 1)
                @component('back.components.student_info')

                @endcomponent
              @endif

              @if($passInfo)

                @component('back.components.private_info')

                @endcomponent

              @endif





              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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

              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">


              <div class="active tab-pane" id="rules">

                @component('back.components.rules',['holders' => $holders ])

                @endcomponent
              </div>

              <div class="tab-pane" id="settings">

                @component('back.components.change_info')

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
