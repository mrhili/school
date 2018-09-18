@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')

@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

Login de la class {{ $class->name }}

  @endslot


  @slot('sectionPlain')


<div class="table-responsive no-padding">

    <table class="table table-bordered table-striped" id="by-class-table">
        <thead>
            <tr>
                <th>site</th>
                <th>nomcomplet</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
    </table>

</div>




  @endslot


  @slot('footerPlain')

    <a target="_blank" href="{{route('students.inv',$class->id)}}" class="btn btn-lg btn-info">Generate invitation blocks</a>

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
          var theclass = {{ $class->id }};

$(function() {
    $('#by-class-table').DataTable({
          dom: 'lBfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,

        ajax: "{!! route('students.data-login-by-class', $class->id ) !!}",
        columns: [
            { data: 'site', name: '' },
            { data: 'nomcomplet', name: '' },
            { data: 'email', name: '' },
            { data: 'password', name: '' }
        ]
    });
});

</script>

<script type="text/javascript">

$( document ).ready(function() {



});



</script>
@endsection
