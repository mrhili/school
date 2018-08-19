@if(empty($title))
  @php $title=''; @endphp
@else
  @php $title = '<div class="panel-heading">
    <h3 class="panel-title">'. $title .'</h3>
  </div>'; @endphp
@endif

@if(empty($footer))
  @php $footer='';@endphp
@else
  @php $footer = '<div class="panel-footer">'.$footer.'</div>'; @endphp
@endif

@if(empty($class))
  @php $class='panel-default'; @endphp
@endif

<div class="panel {{ $class }}">
  {!! $title !!}
  <div class="panel-body">
    {!! $slot !!}
  </div>
  {!! $footer !!}
</div>
