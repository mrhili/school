  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

      <li class="active"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>

      @if (Auth::check())

        @if (Auth::user()->role == 6)

          <li class=""><a href="#master-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>

        @endif

      @endif

    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->

      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane active" id="control-sidebar-settings-tab">

        <h3 class="control-sidebar-heading">Année selectioné:</h3>

        @foreach( $years as $y => $year)
        <ul class="control-sidebar-menu">
          <li>
            <a href="#" class="change-year" id="year-{{ $y }}" data-id="{{ $y }}">
              <i class="menu-icon fa fa-birthday-cake {{ $y == Session::get('yearId') ? 'bg-green' : 'bg-red' }}"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">{{ $year }}</h4>
                <p>{{ $y == Session::get('yearId') ? 'V - cet anée est selectionée' : 'X - selectionne cet année' }}</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->
        @endforeach

      </div>
      <!-- /.tab-pane -->


      @if (Auth::check())

        @if (Auth::user()->role == 6)

      <div class="tab-pane" id="master-sidebar-settings-tab">

        <h3 class="control-sidebar-heading">EN/Able Debuggar bar:</h3>

        <ul class="control-sidebar-menu">

          @foreach (ArrayHolder::roles_routing() as $rr => $roles_routing)
            <li>
              <a href="#" class="change-debug" id="debug-{{ $rr }}" data-role="{{ $rr }}">
                <i class="menu-icon fa fa-bug {{ Application::setDebuggar( $rr )? 'bg-green':'bg-red' }}"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">{{ $roles_routing }}</h4>
                  <p>...</p>
                </div>
              </a>
            </li>
          @endforeach

        </ul>
        <!-- /.control-sidebar-menu -->

      </div>

      @endif

    @endif


      <!---->






    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
