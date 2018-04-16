@extends('back.layouts.app')

@section('datatableCss')

  <link rel="stylesheet" href="{!! asset('adminl/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}">

@endsection

@section('styles')



@endsection

@section('content')

{!! Form::open(['route' => 'configs.store', 'files' => true, 'method' => 'post' ,'class' => 'form-horizontal']) !!}

@component('back.components.plain')

  @slot('titlePlain')

The Main Configuration Of the web application

  @endslot


  @slot('sectionPlain')

    <a class="btn btn-danger btn-xs">Delete all</a>
    <br />
    <br />



    <table class="table table-bordered table-striped" id="ads-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Price</th>
                <th>Position</th>
                <th>Category</th>
                <th>Business Category</th>
                <th>Action</th>
                <th>Del</th>
                <th>Created At</th>
            </tr>
        </thead>
    </table>


        <div class="modal fade" id="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">


                <p>price: <span class="price"></span></p>
                <p>land size: <span class="size_land"></span></p>
                <p>floor number: <span class="floor_number"></span></p>
                <p>rooms: <span class="rooms"></span></p>
                <p>apart number <span class="apart_number"></span></p>
                <p>bathrooms: <span class="bathrooms"></span></p>
                <p>kithens: <span class="kitchens"></span></p>
                <p>livingrooms: <span class="livingrooms"></span></p>
                <p>garages: <span class="garages"></span></p>
                <p>position: <span class="position"></span></p>
                <p>category: <span class="cat"></span></p>
                <p>business category: <span class="cat_business"></span></p>
                <p>land category: <span class="cat_land"></span></p>
                <p>roof category: <span class="cat_roof"></span></p>
                <p>discription: <span class="disc"></span></p>
                <p>number vues: <span class="vue"></span></p>
                <div>status: 
                <select class="status">
                  <option value="1">Valide</option>
                  <option value="2">Not valide</option>
                </select>

                <div>created at: <span class="created_at"></span></p>
                <p>updated at: <span class="updated_at"></span></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
                <button type="button" id="send-form" class="btn btn-success">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



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

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">







$(function() {
    $('#ads-table').DataTable({
        processing: true,
        serverSide: true,
        initComplete: function(settings, json) {
          var id, ad, statu_value;
          $('.btn-click').click(function(){

            id = $(this).attr('id');

              axios.get('/ads/'+id+'/get')
                .then(function (response) {

                  ad = response.data;

                  $('#modal').find('.modal-title').text(ad.title);
                  $('#modal').find('.price').text(ad.price);
                  $('#modal').find('.size_land').text(ad.size_land);
                  $('#modal').find('.floor_number').text(ad.floor_number);
                  $('#modal').find('.rooms').text(ad.rooms);
                  $('#modal').find('.apart_number').text(ad.apart_number);
                  $('#modal').find('.bathrooms').text(ad.bathrooms);
                  $('#modal').find('.kitchens').text(ad.kitchens);
                  $('#modal').find('.livingrooms').text(ad.livingrooms);
                  $('#modal').find('.garages').text(ad.garages);
                  $('#modal').find('.position').text(ad.position);
                  $('#modal').find('.cat').text(ad.cat);
                  $('#modal').find('.cat_business').text(ad.cat_business);
                  $('#modal').find('.cat_land').text(ad.cat_land);
                  $('#modal').find('.cat_roof').text(ad.cat_roof);
                  $('#modal').find('.disc').text(ad.disc);
                  $('#modal').find('.vue').text(ad.vue);
                  $('#modal').find('.status').find('option[value="'+ ad.status +'"]').attr('selected', 'selected');
                  $('#modal').find('.created_at').text(ad.created_at);
                  $('#modal').find('.updated_at').text(ad.updated_at);

                  $('#modal').modal('show');

                  $('#send-form').click(function(){

                      statu_value = $('#modal').find('.status').val();

                      axios({
                          method: 'put',
                          url: '/ads/'+id+'/change-status',
                          data: {
                            status: statu_value,
                            id: id
                          }
                        })
                        .then(function (response) {
                          $('#modal').find('.status').find('option[value="'+ statu_value +'"]').attr('selected', 'selected');
                          console.log(response);
                        })
                        .catch(function (error) {
                          console.log(error);
                        });

                  });

                  console.log(response);
                })
                .catch(function (error) {
                  console.log(error);
                });

            

            
          });
        },
        ajax: '{!! route('ads.datatable') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'price', name: 'price' },
            { data: 'position', name: 'position' },
            { data: 'cat', name: 'cat' },
            { data: 'cat_business', name: 'cat_business' },
            { data: 'action', name: '' },
            { data: 'del', name: '' },
            { data: 'created_at', name: 'created_at' },
        ]
    });
});

</script>
@endsection