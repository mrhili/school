  <header class="main-header">

    <!-- Logo -->
    <a href="{{ route('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>{{ GetSetting::getConfig('site-name'){0} }}</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ GetSetting::getConfig('site-name') }}</b></span>
    </a>

    <!-- Header Navbar -->
    @include('back.partials.navbar')
  </header>
