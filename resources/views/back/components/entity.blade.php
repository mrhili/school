<img src="{{ GetSetting::ifImg( 'logo' ) }}" alt="..." height="100px" width="auto"  class="block">
<p class="">
  <b>{{ GetSetting::getConfig( 'company' ) }}</b><br />
{{ GetSetting::getConfig( 'adress' ) }}<br />
Numéro et date de la licence {{ GetSetting::getConfig( 'licence' ) }}<br />
{{ GetSetting::getConfig( 'city' ) }}<br />
{{ GetSetting::getConfig( 'fix-number' ) }}<br />
</p>

{{ $slot }}
