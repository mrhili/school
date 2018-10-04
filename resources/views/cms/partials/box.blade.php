@if(empty( $footer ))
  @php $footer = ''; @endphp
@endif
@if(empty( $title ))
  @php $title = ''; @endphp
@endif

@if(empty( $class ))
  @php $class = 'col-xs-12'; @endphp
@endif

<div class="{{ $class }}">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">{{ $title }}</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      {{ $slot }}
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      {{ $footer }}
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

</div>
