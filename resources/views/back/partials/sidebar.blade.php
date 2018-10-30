  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->

        <div class="user-panel">
        @if(Auth::check())
          <div class="pull-left image">
            {!! Html::image(CommonPics::ifImg( ArrayHolder::roles_routing( Auth::user()->role ) ,  Auth::user()->img ),'User Image', ['class' => 'img-circle'] ) !!}
          </div>
          <div class="pull-left info">
            <p> {{ Auth::user()->name }} {{ Auth::user()->last_name }} </p>
          </div>
        @endif
      </div>

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">LINKS</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ route('posts.index') }}"><i class="fa fa-newspaper-o"></i> <span>Nouvauté</span></a></li>
        <li class="{{ (Route::is('home')? 'active': '') }}"><a href="{{route('home')}}"><i class="fa fa-tachometer"></i> <span>Home</span></a></li>
        <li><a href="{{ route('my-profile') }}"><i class="fa fa-user"></i> <span>Mon profile</span></a></li>

        <li><a href="{{ route('docs') }}"><i class="fa fa-video-camera"></i> <span>Documentaire</span></a></li>
        <li><a href="{{ route('games.index') }}"><i class="fa fa-gamepad"></i> <span>Jeux</span></a></li>
        <li><a href="{{ route('applications.index') }}"><i class="fa fa-android"></i> <span>Application</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
