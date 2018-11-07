<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index(){

      return view('games.index');

    }


    public function g2048(){

      return view('games.g2048');

    }
    public function chess3d(){

      return view('games.3dchess');

    }
    public function gridgarden(){

      return view('games.gridgarden');

    }

    public function flexfrog(){

      return view('games.flexfrog');

    }

    public function sudoku(){

      return view('games.sudoku');

    }
    public function ttt(){

      return view('games.ttt');

    }
    public function typing(){

      return view('games.typing');

    }

    public function fast_typing(){

      return view('games.fast_typing');

    }

    public function bubble_typing(){

      return view('games.bubble_typing');

    }

    public function world_maps(){

      return view('games.world_maps');

    }
    public function marche_verbe(){

      return view('games.marche_verbe');

    }

    public function math(){

      return view('games.math');

    }

    public function letters(){

      return view('games.letters');

    }

    public function front_face(){

      return view('games.front_face');

    }

    public function js_quiz(){

      return view('games.js_quiz');

    }

    public function quiz_collector(){

      return view('games.quiz_collector');

    }


    public function simple_quiz(){

      return view('games.simple_quiz');

    }

    public function hangman(){

      return view('games.hangman');

    }

    public function battleship_table(){

      return view('games.battleship_table');

    }

}
