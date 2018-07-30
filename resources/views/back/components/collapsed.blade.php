
            <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">{{ $heading }}</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->

              </div>
              <!-- /.box-header -->
            <div class="box-body" id="{{ $id }}">

                  {{ $slot }}

            </div>
            <!-- /.box-body -->
          </div>
