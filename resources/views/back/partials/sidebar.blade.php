  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          {!! Html::image(CommonPics::ifImg( ArrayHolder::roles_routing( Auth::user()->role ) ,  Auth::user()->img ),'User Image', ['class' => 'img-circle'] ) !!}
        </div>
        <div class="pull-left info">
          @if(Auth::check())
            <p> {{ Auth::user()->name }} {{ Auth::user()->last_name }} </p>
          @else

          @endif
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ (Route::is('home')? 'active': '') }}"><a href="{{route('home')}}"><i class="fa fa-link"></i> <span>Home</span></a></li>
        <li><a href="{{ route('my-profile') }}"><i class="fa fa-link"></i> <span>Mon profile</span></a></li>

        <li><a href="{{ route('docs') }}"><i class="fa fa-link"></i> <span>Documentaire</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
