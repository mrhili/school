<img class="profile-user-img img-responsive img-circle" src="{{ CommonPics::ifImg( $placement,  Auth::user()->img ) }}" alt="{{ Auth::user()->name }} photo">

<h3 class="profile-username text-center">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h3>

<h3 class="profile-username text-center">{{ Auth::user()->arabic_name }} {{ Auth::user()->arabic_last_name }}</h3>

<p class="text-muted text-center">{{ ArrayHolder::roles( Auth::user()->role ) }}</p>

{{ $slot }}
