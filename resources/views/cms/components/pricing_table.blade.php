

@if (empty($table))

  @php
    $table = [];
  @endphp

@endif





<div class="table-responsive">
  <table class="table">

    @if(count( $table ) > 0)
      <thead>
        <tr>
          @foreach ($table['th'] as $th)

                <th>{{ $th }}</th>

          @endforeach
        </tr>
      </thead>
      <tbody>

@php
  $counter = 0;
@endphp
        @foreach ($table['tr'] as $tr)



          <tr class="{{ ( $counter % 2 == 0? ArrayHolder::bootstrapClasses() : '') }}">

            @foreach ($tr as $td)

              @if( $loop->first)
                <th scope="row">{{$td}}</th>

              @else

                <td>{{$td}}</td>

              @endif



            @endforeach

          </tr>



          @php
            $counter++;
          @endphp

        @endforeach
      </tbody>
    @endif

  </table>
</div>
