
@if (empty($p))

  @php
    $p = 'Titre';
  @endphp

@endif

@if (empty($class))

  @php
    $class = '';
  @endphp

@endif



<p class="">{{ $p }}</p>
