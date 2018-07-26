@if(Auth::user()->role >= 2)

  <strong><i class="fa fa-phone margin-r-5"></i> CIN</strong>
  <p class="text-muted">{{  Auth::user()->phone2 }}</p>

  <hr>

@endif
<strong><i class="fa fa-transgender margin-r-5"></i> gender</strong>
<p class="text-muted">{{ ArrayHolder::gender( Auth::user()->gender) }}</p>

<hr>

<strong><i class="fa fa-calendar margin-r-5"></i> date de naissance</strong>
<p class="text-muted">{{  Auth::user()->birth_date }}</p>

<hr>
<strong><i class="fa fa-globe-africa margin-r-5"></i> place de naissance</strong>
<p class="text-muted">{{  Auth::user()->birth_place }}</p>

<hr>
<strong><i class="fa fa-phone margin-r-5"></i> Numero de téléphone</strong>
<p class="text-muted">{{  Auth::user()->phone }}</p>
<hr>

@if(Auth::user()->role >= 2)

  <hr>
  <strong><i class="fa fa-phone margin-r-5"></i> Numero de téléphone 2</strong>
  <p class="text-muted">{{  Auth::user()->phone2 }}</p>

  <hr>
  <strong><i class="fa fa-phone margin-r-5"></i> Numero de téléphone 3</strong>
  <p class="text-muted">{{  Auth::user()->phone3 }}</p>

  <hr>
  <strong><i class="fa fa-phone margin-r-5"></i> Numero de téléphone fix</strong>
  <p class="text-muted">{{  Auth::user()->fix }}</p>

@endif

<strong><i class="fa fa-whatsapp margin-r-5"></i> Whatsapp</strong>
<p class="text-muted">{{  Auth::user()->whatsapp }}</p>

<hr>
<strong><i class="fa fa-facebook margin-r-5"></i> facebook</strong>
<p class="text-muted">{{  Auth::user()->facebook }}</p>

<hr>


<strong><i class="fa fa-map-marker margin-r-5"></i> ville</strong>
<p class="text-muted">{{ Auth::user()->city }}</p>

<hr>

<strong><i class="fa fa-hashtag margin-r-5"></i> zip code</strong>
<p class="text-muted">{{ Auth::user()->zip_code }}</p>

<hr>

<strong><i class="fa fa-map-marker margin-r-5"></i> adress</strong>
<p class="text-muted">{{ Auth::user()->adress }}</p>

<hr>

{{ $slot }}
