
@extends('back.layouts.topnav')

@section('styles')
<link rel="stylesheet" href="{!!asset('games/2048/style/main.css')!!}">
@endsection


@section('content')


  <div class="container container-game">
    <div class="heading">
      <h1 class="title">2048</h1>
      <div class="scores-container">
        <div class="score-container">0</div>
        <div class="best-container">0</div>
      </div>
    </div>

    <div class="above-game">
      <p class="game-intro">Join the numbers and get to the <strong>2048 tile!</strong></p>
      <a class="restart-button">New Game</a>
    </div>

    <div class="game-container">
      <div class="game-message">
        <p></p>
        <div class="lower">
	        <a class="keep-playing-button">Keep going</a>
          <a class="retry-button">Try again</a>
        </div>
      </div>

      <div class="grid-container">
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
      </div>

      <div class="tile-container">

      </div>
    </div>

    <p class="game-explanation">
      <strong class="important">Comment jouer:</strong> Utilise les  <strong>Fléshes</strong> pour . quand deux meme nombre sont pres l'un de lautre, <strong>press sur la bouton pour les form en un nombre!</strong>
    </p>

  </div>

@endsection


@section('scripts')

  <script src="{!! asset('games/2048/js/bind_polyfill.js') !!}"></script>

  <script src="{!! asset('games/2048/js/classlist_polyfill.js') !!}"></script>
  <script src="{!! asset('games/2048/js/animframe_polyfill.js') !!}"></script>
  <script src="{!! asset('games/2048/js/keyboard_input_manager.js') !!}"></script>
  <script src="{!! asset('games/2048/js/html_actuator.js') !!}"></script>
  <script src="{!! asset('games/2048/js/grid.js') !!}"></script>
  <script src="{!! asset('games/2048/js/tile.js') !!}"></script>
  <script src="{!! asset('games/2048/js/local_storage_manager.js') !!}"></script>
  <script src="{!! asset('games/2048/js/game_manager.js') !!}"></script>
  <script src="{!! asset('games/2048/js/application.js') !!}"></script>



@endsection
