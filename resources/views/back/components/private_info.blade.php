@if($user->role >= 2)

  <strong><i class="fa fa-phone margin-r-5"></i> CIN</strong>
  <p class="text-muted">{{  $user->phone2 }}</p>

  <hr>

@endif

@if( $user->gender )
  <strong><i class="fa fa-transgender margin-r-5"></i> gender</strong>
  <p class="text-muted">{{ ArrayHolder::gender( $user->gender ) }}</p>



<hr>
@endif
@if( $user->birth_date )
<strong><i class="fa fa-calendar margin-r-5"></i> date de naissance</strong>
<p class="text-muted">{{  $user->birth_date }}</p>

<hr>
@endif
@if( $user->birth_place )
<strong><i class="fa fa-globe-africa margin-r-5"></i> place de naissance</strong>
<p class="text-muted">{{  $user->birth_place }}</p>

<hr>
@endif

@if( $user->phone )
<strong><i class="fa fa-phone margin-r-5"></i> Numero de téléphone</strong>
<p class="text-muted">{{  $user->phone }}</p>
<hr>
@endif
@if($user->role >= 2)

  @if( $user->phone2 )
  <strong><i class="fa fa-phone margin-r-5"></i> Numero de téléphone 2</strong>
  <p class="text-muted">{{  $user->phone2 }}</p>

  <hr>
  @endif

  @if( $user->phone3 )
  <strong><i class="fa fa-phone margin-r-5"></i> Numero de téléphone 3</strong>
  <p class="text-muted">{{  $user->phone3 }}</p>

  <hr>
  @endif

  @if( $user->fix )
  <strong><i class="fa fa-phone margin-r-5"></i> Numero de téléphone fix</strong>
  <p class="text-muted">{{  $user->fix }}</p>

  <hr />
  @endif
@endif


@if( $user->whatsapp )
<strong><i class="fa fa-whatsapp margin-r-5"></i> Whatsapp</strong>
<p class="text-muted">{{  $user->whatsapp }}</p>

<hr>

@endif


@if( $user->facebook )
<strong><i class="fa fa-facebook margin-r-5"></i> facebook</strong>
<p class="text-muted">{{  $user->facebook }}</p>

<hr>
@endif

@if( $user->city )
<strong><i class="fa fa-map-marker margin-r-5"></i> ville</strong>
<p class="text-muted">{{ $user->city }}</p>

<hr>
@endif

@if( $user->zip_code )
<strong><i class="fa fa-hashtag margin-r-5"></i> zip code</strong>
<p class="text-muted">{{ $user->zip_code }}</p>

<hr>
@endif

@if( $user->facebook )
<strong><i class="fa fa-map-marker margin-r-5"></i> adress</strong>
<p class="text-muted">{{ $user->adress }}</p>

<hr>
@endif

{{ $slot }}
