
@if (empty($h1))

  @php
    $h1 = 'Titre';
  @endphp

@endif

@if (empty($class))

  @php
    $class = '';
  @endphp

@endif



<h1 class="">{{ $h1 }}</h1>
