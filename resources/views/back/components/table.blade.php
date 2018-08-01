@if(empty( $id ))
  @php $id = ''; @endphp
@endif

@if(empty( $class ))
  @php $class = 'table table-bordered table-striped'; @endphp
@endif

<table class="{{ $class}}" id="{{ $id }}">
    <thead>
        <tr>

          @forelse($columns as $column)
            <th>{{ $column }}</th>
          @empty

            <div class="alert alert-warning" role="alert">Pas de column</div>

          @endforelse

        </tr>
    </thead>
    {{ $slot }}
</table>
