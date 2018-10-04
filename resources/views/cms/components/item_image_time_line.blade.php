@if (empty($icon))

  @php
    $icon = 'flag';
  @endphp

@endif

@if (empty($title))

  @php
    $title = 'Sans titre';
  @endphp

@endif

@if (empty($body))

  @php
    $body = '<p>...</p>';
  @endphp

@endif

@if (empty($img))

  @php
    $img = null;
  @endphp

@endif

@if (empty($time))

  @php
    $time = '...';
  @endphp

@endif


<li>
  <i class="fa fa-{{ $icon }} bg-purple"></i>

  <div class="timeline-item">
    <span class="time"><i class="fa fa-clock-o"></i> {{ Carbon::parse($time)->diffForHumans() }} </span>

    <h3 class="timeline-header">{{ $title }}</h3>

    <div class="timeline-body">
      <img src="{{ CommonPics::ifImg('cms', $img ) }}" alt="..." class="img-responsive">
      <div>{!! $body !!}</div>
    </div>
  </div>
</li>
