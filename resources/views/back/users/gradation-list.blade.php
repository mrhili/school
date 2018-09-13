
@extends('back.layouts.app')

@section('styles')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('content')


@component('back.components.plain')

  @slot('titlePlain')

Les grand gent dans le site

  @endslot


  @slot('sectionPlain')



    <div class="table-responsive no-padding">

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>role</th>
                    <th>graduation</th>
                </tr>
            </thead>
        </table>

    </div>



  @endslot


  @slot('footerPlain')



  @endslot


@endcomponent


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
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('users.data-big-list' ) !!}",
        columns: [

            { data: 'name', name: '' },
            { data: 'role', name: '' },
            { data: 'grad', name: '' }
        ]
    });
});

</script>

<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script src="{!! asset('validate/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('helpers/helpers.js') !!}"></script>
<script type="text/javascript">

var addFourniture = $('#add-fourniture');
var fournitures = $('#fournitures');
var schoolLink = "{{ route('index') }}";
var imgLink = "{{ 'images/config/'. GetSetting::getConfig('no-image') }}";

var comment, hidden_note, name;

$(document).ready(function(){



});

</script>
@endsection
