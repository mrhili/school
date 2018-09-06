
@if( empty( $id ) )
  @php $id = 'modal';@endphp
@endif

@if( empty( $formid ) )
  @php $formid = 'form';@endphp
@endif


@if( empty( $title ) )
  @php $title = 'Formulaire';@endphp
@endif

@if( empty( $comment ) )
  @php $comment = true ;@endphp
@endif

@if( empty( $hidden_note ) )
  @php $hidden_note = true ;@endphp
@endif

@if( empty( $idbutton ))

  @php $idbutton = 'send-form';@endphp

@endif

@if( empty( $txtbutton ))

  @php $txtbutton = 'Envoyer';@endphp

@endif



  <div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{ $title }}</h4>
        </div>
        <form id="{{ $formid }}" class="form-horizontal">
        <div class="modal-body">

            {{ $slot }}

            @if ( $comment )

              <div class="col-xs-12">

              @include('back.partials.formG', ['name' => 'comment', 'type' => 'textarea', 'text' => 'Comment', 'class'=>' to-validate', 'required' => true, 'additionalInfo' => ['id' =>  'commentfield'] ])
              </div>

            @endif

            @if( $hidden_note )

              <div class="col-xs-12">

              @include('back.partials.formG', ['name' => 'hidden_note', 'type' => 'textarea', 'text' => 'Une Note Secret pour toi', 'class'=>' to-validate', 'required' => false, 'additionalInfo' => ['id' =>  'hiddennotefield'] ])
              </div>

            @endif





            <div class="clearfix"></div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button id="{{ $idbutton }}" type="button" class="btn btn-primary">{{ $txtbutton }}</button>

        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
