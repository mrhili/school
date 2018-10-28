@extends('back.layouts.app')

@section('title')
  Notes du {{ $unity->name }}
@endsection

@section('datatableCss')


@endsection


@section('styles')



@endsection




@section('page_header')
  Notes du classs
@endsection

@section('page_header_desc')
  année selectioné: {{ Session::get('yearName') }}
@endsection

@section('breadcrumbXXXX')
  <ol class="breadcrumb">
    <li><a href="{{ route('index') }}"><i class="fa fa-dashboard"></i> Acceuill</a></li>
    <li class="active"><a href="{{ route('home') }}">Dashboard</a></li>
  </ol>
@endsection



@section('content')

@component('back.components.plain')

  @slot('titlePlain')
    Notes des éléves du class {{ $student->fill_name }}
  @endslot


  <div class="row">
    <div class="col-xs-12 table-responsive no-padding">

        <table class="table table-bordered table-striped" id="tests">
            <thead>
                <tr>
                  <th>Subunité</th>
                  <th>Note</th>
                  <th>Details</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($subunities as $key => $subunity)

                <tr>
                  <td>{{ $subunity['name'] }}</td>
                  <td>{{ $subunity['note'] }}</td>
                  <td><a  href="{{ route('notes.by-subunity', $key ) }}">Details</a></td>
                </tr>

              @endforeach

            </tbody>
        </table>

    </div>
      <!-- /.col -->
  </div>


@endcomponent


@endsection

@section('datatableScript')


@endsection




@section('scripts')

  <script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
  <script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

<!-- Morris.js charts -->

<script src="{!! asset('axios/axios.min.js') !!}"></script>

<script type="text/javascript">


          var year = {{ Session::get('yearId') }};




</script>


@endsection
