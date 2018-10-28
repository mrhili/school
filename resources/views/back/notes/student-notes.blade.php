@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')



@endsection

@section('content')





    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Notes
          </h2>
        </div>
        <!-- /.col -->
      </div>

      <!-- Table row -->
      <div class="row">
			<div class="col-xs-12 table-responsive no-padding">

			    <table class="table table-bordered table-striped" id="tests">
			        <thead>
			            <tr>
                    <th>Type</th>
			            	<th>Matiere</th>
                    <th>Maitre</th>
			              <th>Examin</th>
                    <th>Recherche</th>
                    <th>Durée passé done_minutes / time_minutes</th>
			              <th>Note</th>
                    <th>Plus d'info</th>
			            </tr>
			        </thead>
			    </table>

			</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->

      <!-- this row will not appear when printing -->

    </section>


@endsection

@section('datatableScript')


<!-- DataTables -->
<script src="{!! asset('adminl/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('adminl/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}"></script>


<!-- SlimScroll -->
<script src="{!! asset('adminl/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>


<!-- FastClick -->
<script src="{!! asset('adminl/bower_components/fastclick/lib/fastclick.js') !!}"></script>

@endsection

@section('scripts')

<script type="text/javascript">

$(function() {
    $('#tests').DataTable({
        processing: true,
        serverSide: true,

        ajax: "{!! route('notes.data-student-notes', $student->id ) !!}",
        columns: [
          { data: 'type', name: '' },
        	{ data: 'subject', name: '' },
          { data: 'teatcher', name: '' },
            { data: 'test_title', name: '' },
            { data: 'navigator', name: '' },
            { data: 'minutes', name: '' },
            { data: 'note', name: '' },
            { data: 'info', name: '' }

        ]
    });
});

</script>

@endsection
