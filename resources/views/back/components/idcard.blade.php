
<img class="profile-user-img img-responsive img-circle" src="{{ CommonPics::ifImg( $placement,  $user->img ) }}" alt="{{ $user->name }} photo">

<h3 class="profile-username text-center">{{ $user->name }} {{ $user->last_name }}</h3>

<h3 class="profile-username text-center">{{ $user->arabic_name }} {{ $user->arabic_last_name }}</h3>

<p class="text-muted text-center">{{ ArrayHolder::roles( $user->role ) }}</p>

{{ $slot }}
