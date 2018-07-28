@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')



@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')


<div class="table-responsive no-padding">

    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th>nom de fourniture</th>
                <th>prix dans le marché</th>
                <th>plus d'information</th>
                <th>pour</th>
                <th>importante</th>
                <th>exist</th>
                <th>statu</th>
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
<script src="{!! asset('axios/axios.min.js') !!}"></script>
<script type="text/javascript">

$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('fournitures.data-child-fournitures', $child->id ) !!}",
        columns: [

        	{ data: 'name', name: '' },
          { data: 'average_price', name: '' },
          { data: 'additional_info', name: '' },
          { data: 'for', name: '' },
          { data: 'required', name: '' },
          { data: 'exist', name: '' },
          { data: 'statu', name: '' }

        ]
    });
});

</script>

<script type="text/javascript">

$( document ).ready(function() {

  $("#table").on("click", ".btn-exist", function(){


     // your code goes here
              $button = $(this)

              id = $button.attr('data-id');

              $button.attr('disabled',true);


                axios.post('/switch-exist-fourniture/'+id,{
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }

                })
                  .then(function (response) {
                    var returnedArray = response.data;
                    console.log(returnedArray);

                    $id = $('#exist-'+id);
                    $statu = $('#statu-'+id);
                    $id.text( returnedArray['icon'] );
                    $id.removeClass('btn-danger btn-success');
                    $id.addClass( returnedArray['class'] );
                    $statu.text(returnedArray['statu']);

                    $button.attr('disabled',false);

                  })
                  .catch(function (error) {

                    $button.attr('disabled',false);


                    alert(error);
                    console.log( error );
                  });


  });

});


</script>

@endsection
