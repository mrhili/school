
@if( empty( $id ) )
  @php $id = 'modal';@endphp
@endif

@if( empty( $idbutton ))

  @php $idbutton = 'send-form';@endphp

@endif

@if( empty( $title ))

  @php $title = 'Informations';@endphp

@endif



  <div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{ $title }}</h4>
        </div>

        <div class="modal-body">

            {{ $slot }}


            <div class="clearfix"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
