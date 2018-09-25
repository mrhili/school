@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')

@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

Bilan

  @endslot


  @slot('sectionPlain')
<div class="row">
  <div class="col-md-6">

    <div class="row">
      <div class="col-xs-12">

          <h1>Total Benefits</h1>

      </div>
    </div>


    <div class="table-responsive no-padding">

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>reson</th>
                    <th>Info</th>
                </tr>
            </thead>
        </table>

    </div>

    <div class="row">
      <div class="col-xs-12">
        @component('back.components.alert')
          <h1>Total Benefits: {{ $totalBen }}</h1>
        @endcomponent
      </div>
    </div>
  </div>


  <div class="col-md-6">

    <div class="row">
      <div class="col-xs-12">

          <h1 class="text-center">Total Deficits</h1>

      </div>
    </div>

    <div class="table-responsive no-padding">

        <table class="table table-bordered table-striped" id="table-mines">
            <thead>
                <tr>
                  <th>Amount</th>
                  <th>reson</th>
                  <th>Info</th>
                </tr>
            </thead>
        </table>

    </div>
    <div class="row">
      <div class="col-xs-12">
        @component('back.components.alert')
          <h1 class="text-center">Total Deficits: {{ $totalDef }}</h1>
        @endcomponent
      </div>
    </div>

  </div>


</div>








  @endslot






@endcomponent




@endsection

@section('datatableScript')


<!-- DataTables -->
<script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>


<!-- SlimScroll -->
<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>


<!-- FastClick -->
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

@endsection

@section('scripts')

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script type="text/javascript">


          var id, idOf, ad, statu_value, payment, month, comment, hoofield, users, user, exteriorinfo, exteriorname, exteriornamefield, exteriorinfos;
          var year = {{ Session::get('yearId') }};

$(function() {
    $('#table').DataTable({
          dom: 'lBfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,

        ajax: "{!! route('wallets.data-ben', $date ) !!}",
        columns: [
            { data: 'amount', name: 'amount' },
            { data: 'reason', name: '' },
            { data: 'info', name: '' }

        ]
    });

    $('#table-mines').DataTable({
          dom: 'lBfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,

        ajax: "{!! route('wallets.data-def', $date ) !!}",
        columns: [
          { data: 'amount', name: 'amount' },
          { data: 'reason', name: '' },
          { data: 'info', name: '' }

        ]
    });

});

</script>

<script type="text/javascript">

$( document ).ready(function() {



});



</script>
@endsection
