
@extends('back.layouts.topnav')

@section('content')

  <div class="row">
    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          2048

        @endslot
        <a href ="{{ route('games.g2048') }}">
          <img src="{{ asset('games/2048/2048.png') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.g2048') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>



    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          3D Chess

        @endslot

        <a href ="{{ route('games.3dchess') }}">
          <img src="{{ asset('games/3dchess/3dchess.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.3dchess') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Grid garden

        @endslot

        <a href ="{{ route('games.gridgarden') }}">
          <img src="{{ asset('games/gg/gg.png') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.gridgarden') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>


    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Flexbox Froggy

        @endslot

        <a href ="{{ route('games.flexfrog') }}">
          <img src="{{ asset('games/ff/ff.png') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.flexfrog') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>




  </div>



@endsection
