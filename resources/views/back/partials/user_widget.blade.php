@if(empty($class))
    @php $class = 'col-md-4'; @endphp
@endif

@if(empty($add_class))
    @php $add_class = ''; @endphp
@endif

@if(empty($bg_color))
  @php $bg_color = ArrayHolder::backgroundColors(); @endphp
@endif



<div class="{{ $class }} {{ $add_class }}">
  <!-- Widget: user widget style 1 -->
  <div class="box box-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-{{ $bg_color  }}">
      <div class="widget-user-image">
        {!! $img !!}
      </div>
      <!-- /.widget-user-image -->
      <h3 class="widget-user-username">{{ $h3 }}</h3>

      <h5 class="widget-user-desc">{{ $desc }}</h5>
    </div>
    <div class="box-footer no-padding">
      <ul class="nav nav-stacked">
        @foreach ($array_of_links as $link)

          @if(empty( $link['badge_text'] ))
            @php $badg = ''; @endphp
          @else
            @php $badg = '<span class="pull-{{ $link[\'badge_orientation\'] }} badge bg-{{ $link[\'badge_text\'] }}">{{ $link[\'badge_text\'] }}</span>'; @endphp
          @endif

          @if(empty( $link['class'] ))
            @php $link_class = ''; @endphp
          @else
            @php $link_class = $link['class']; @endphp
          @endif

          @if(empty( $link['id'] ))
            @php $link_id = ''; @endphp
          @else
            @php $link_id = $link['id']; @endphp
          @endif

          @if(empty( $link['data-id'] ))
            @php $data_id = ''; @endphp
          @else
            @php $data_id = $link['data-id']; @endphp
          @endif

          <li><a href="{{ $link['link'] }}" id="{{ $link_id }}" class="{{ $link_class }}" data-id="{{ $data_id }}">{{ $link['text'] }} {{ $badg }}</a></li>

        @endforeach

      </ul>
    </div>
  </div>
  <!-- /.widget-user -->
</div>
