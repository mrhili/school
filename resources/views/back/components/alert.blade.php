@if( empty( $class ) )
  @php $class = 'warning'; @endphp
@endif

@if( empty( $icon ) )
  @php $icon = ''; @endphp
@else
  @php $icon = '<i class="fa fa-'.$icon.'"></i>'; @endphp

@endif


  <div class="alert alert-{{ $class }}" role="alert">
    {!! $icon !!} {!! $slot !!}
  </div>
