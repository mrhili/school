@extends('back.layouts.topnav')

@section('styles')

  {!! $page->styles !!}

@endsection

@section('content')

  <h1>{{ $page->title }}</h1>

  <div class="row">


    @foreach ($page->page_partials as $page_partial)

          @component('cms.partials.'.$page_partial->partial->slug, json_decode($page_partial->json, true))


            @foreach( $page_partial->particompos as $particon )


              @component('cms.components.'.$particon->component->slug, json_decode($particon->json, true) )

              @endcomponent

            @endforeach


          @endcomponent

    @endforeach


  </div>




@endsection




@section('scripts')

  @foreach ($page->page_partials as $page_partial)

        @component('cms.partials.js.'.$page_partial->partial->slug, json_decode($page_partial->json, true))


          @foreach( $page_partial->particompos as $particon )


            @component('cms.components.js.'.$particon->component->slug, json_decode($particon->json, true) )

            @endcomponent

          @endforeach


        @endcomponent

  @endforeach


@endsection
