
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

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Sudoku

        @endslot

        <a href ="{{ route('games.sudoku') }}">
          <img src="{{ asset('games/sudoku/sudoku.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.sudoku') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Tik Tak Toe

        @endslot

        <a href ="{{ route('games.ttt') }}">
          <img src="{{ asset('games/ttt/ttt.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.ttt') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Typing Game

        @endslot

        <a href ="{{ route('games.typing') }}">
          <img src="{{ asset('games/typing/typing.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.typing') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>


    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Fast Typing Game

        @endslot

        <a href ="{{ route('games.fast_typing') }}">
          <img src="{{ asset('games/fast_typing/fast_typing.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.fast_typing') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Bubble Typing Game

        @endslot

        <a href ="{{ route('games.bubble_typing') }}">
          <img src="{{ asset('games/bubble_typing/bubble_typing.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.bubble_typing') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>


    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          World Maps Game

        @endslot

        <a href ="{{ route('games.world_maps') }}">
          <img src="{{ asset('games/world_maps/world_maps.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.world_maps') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Marche à verbes

        @endslot

        <a href ="{{ route('games.marche_verbe') }}">
          <img src="{{ asset('games/marche_verbe/marche_verbe.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.marche_verbe') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>



    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Mathématique

        @endslot

        <a href ="{{ route('games.math') }}">
          <img src="{{ asset('games/math/math.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.math') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Letters

        @endslot

        <a href ="{{ route('games.letters') }}">
          <img src="{{ asset('games/letters/letters.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.letters') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>



    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Front Face

        @endslot

        <a href ="{{ route('games.front_face') }}">
          <img src="{{ asset('games/front_face/front_face.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.front_face') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Js Quiz

        @endslot

        <a href ="{{ route('games.js_quiz') }}">
          <img src="{{ asset('games/js_quiz/js_quiz.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.js_quiz') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>

    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Quiz Collector

        @endslot

        <a href ="{{ route('games.quiz_collector') }}">
          <img src="{{ asset('games/quiz_collector/quiz_collector.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.quiz_collector') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>


    <div class="col-md-6">
      @component('back.components.plain')

        @slot('titlePlain')

          Simple Quiz

        @endslot

        <a href ="{{ route('games.simple_quiz') }}">
          <img src="{{ asset('games/simple_quiz/simple_quiz.jpg') }}" class="img-responsive" alt="Cinque Terre">
        </a>
        @slot('footerPlain')

          <a class="btn btn-primary pull-right" href="{{ route('games.simple_quiz') }}">Jouer</a>

        @endslot


      @endcomponent
    </div>




  </div>



@endsection
