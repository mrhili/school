



  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('index') }}" class="navbar-brand">{{ GetSetting::getConfig('site-name') }}</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            @foreach (\App\CMS::descendantsOf(\App\CMS::where('slug', 'navigation')->first()->id ) as $key => $link)
              <li class=""><a href="{{ route('pages.facade', $link->id ) }}">{{ $link->txt }} <span class="sr-only">(current)</span></a></li>

            @endforeach
          </ul>

        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->



        @include('back.partials.navbarcustommenu')




        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
