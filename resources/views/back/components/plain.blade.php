@if(empty( $footerPlain ))
  @php $footerPlain = ''; @endphp
@endif
@if(empty( $sectionPlain ))
  @php $sectionPlain = ''; @endphp
@endif

@if(empty( $class ))
  @php $class = ''; @endphp
@endif


      <!-- Default box -->
      <div class="box {{ $class }}">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $titlePlain }}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          {{ $sectionPlain }}
          {{ $slot }}
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{ $footerPlain }}
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
