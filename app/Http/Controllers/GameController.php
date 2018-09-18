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

}
