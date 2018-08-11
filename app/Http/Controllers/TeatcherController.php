<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Relation;

use Session;

use Auth;

use Application;

class TeatcherController extends Controller
{
    //
    public function home(){

      $user = Auth::user();

      $calendar = Application::loadCalendarForTeatcher( $user );

        return view('back.teatchers.home', compact('calendar') );
    }

    public function myProfile(){

        /****************/
        $passInfo = true;
        /*****************/
        $user = Auth::user();
        return view('back.teatchers.my-profile',compact('passInfo', 'user'));
    }

    public function add(){

    	return view('back.teatchers.add');

    }
}
