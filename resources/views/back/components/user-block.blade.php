@if(empty( $link ))
  @php $link = '#'; @endphp
@endif
@if(empty( $desc ))
  @php $desc = ''; @endphp
@endif

<div class="post">
    <div class="user-block">
      <a href="{{ $link }}">{{ $img }}</a>
          <span class="username">
            <a href="{{ $link }}">{{ $name }}</a>
          </span>
      <span class="description">{{ $desc }}</span>
    </div>

    {{ $slot }}
  </div>
