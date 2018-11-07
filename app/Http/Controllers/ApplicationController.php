<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
    public function index(){

      return view('applications.index');

    }

    public function quran(){

      return view('applications.quran');

    }

    public function morse(){

      return view('applications.morse');

    }

    public function triangle(){

      return view('applications.triangle');

    }

    public function quiz(){

      return view('applications.quiz');

    }

    public function math_quiz(){

      return view('applications.math_quiz');

    }

    public function periodic_table(){

      return view('applications.periodic_table');

    }
    public function atmospher(){

      return view('applications.atmospher');

    }

    public function colors(){

      return view('applications.colors');

    }

    public function multi(){

      return view('applications.multi');

    }

    public function universe(){

      return view('applications.universe');

    }

}
