@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')

@endsection

@section('content')



@component('back.components.plain')

  @slot('titlePlain')

Login des maitre ets autres

  @endslot


  @slot('sectionPlain')


<div class="table-responsive no-padding">

    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th>site</th>
                <th>nomcomplet</th>
                <th>Email</th>
                <th>Password</th>
                <th>Log</th>
                <th>Log informations</th>
            </tr>
        </thead>
    </table>

</div>


  @endslot


  @slot('footerPlain')

    <a target="_blank" href="{{route('users.workers-inv')}}" class="btn btn-lg btn-info">Generate invitation blocks</a>

  @endslot




  @component('back.components.modal')

    <div>
      <table class="table">
          <thead>
            <tr>
              <th>Ip</th>
              <th>Agent</th>

            </tr>
          </thead>
          <tbody id="informations">
          </tbody>
        </table>
    </div>

  @endcomponent





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

        ajax: "{!! route('users.data-login' ) !!}",
        columns: [
            { data: 'site', name: '' },
            { data: 'nomcomplet', name: '' },
            { data: 'email', name: '' },
            { data: 'password', name: '' },
            { data: 'log', name: '' },
            { data: 'log_info', name: '' }
        ]
    });
});

</script>

<script type="text/javascript">


$( document ).ready(function() {

  $("#table").on("click", ".btn-info", function(){
    axios.get('/get-logs/'+ $(this).attr('data-id'),{
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    } )
    .then(function(response){

      arrayInfos = response.data['infos'];
      alert('heheh');
      console.log(response);

      $('.btn-info').attr('disabled', false);

      $('#informations').html('');


      arrayInfos.map(function(item){

        $('#informations').append( $('<tr>\
                      <td>'+ item['user_ip'] +'</td>\
                      <td>'+ item['user_agent'] +'</td>\
                    </tr>'));

      })



      $('#modal').modal('show');


    })
    .catch(function(error){
      $('.btn-info').attr('disabled', false);
      alert(error);
      console.log( error );
    });
  });

});



</script>
@endsection
