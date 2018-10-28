@if(empty($pop))

  @php
    $pop = 'NON';
  @endphp

@endif


@if(empty($icon))

  @php
    $icon = 'warning';
  @endphp

@endif


@if(empty($title))

  @php
    $title = 'Message';
  @endphp

@endif

@if(empty($message))

  @php
    $message = '';
  @endphp

@endif

@if(empty($redirect))

  @php
    $redirect =  url()->previous() ;
  @endphp

@endif

@if(empty($redirect_text))

  @php
    $redirect_text =  'Retourner' ;
  @endphp

@endif



    <div class="error-page">
        <h2 class="headline text-yellow"> {{ $pop }}</h2>

        <div class="error-content">
          <h3><i class="fa fa-{{ $icon }} text-yellow"></i> {{ $title }}</h3>

          <p>
            {{ $message }}.
            <br />
            Tu peut toujours <a href="{{ $redirect }}">{{$redirect_text}}</a> ou aller a <a href="{{ route('index') }}">l'index</a>.
          </p>

          {{ $slot }}
        </div>
        <!-- /.error-content -->
      </div>
