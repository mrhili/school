<div class="col-xs-12">
  <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-aqua-active">
      <h3 class="widget-user-username">{{ Auth::user()->name }} {{ Auth::user()->last_name }} dashboard</h3>
      <h5 class="widget-user-desc">{{ ArrayHolder::roles( Auth::user()->role ) }}</h5>
    </div>
    <div class="widget-user-image">
      <img class="img-circle" src="{{ CommonPics::ifImg( 'students',  Auth::user()->img ) }}" alt="User Avatar">
    </div>
    <div class="box-footer">
      <div class="row">

        {{ $slot }}
        
      </div>
      <!-- /.row -->
    </div>
  </div>
  <!-- /.widget-user -->
</div>
