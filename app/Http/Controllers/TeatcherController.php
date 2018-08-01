<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Relation;

use Session;

use Auth;

class TeatcherController extends Controller
{
    //
    public function home(){

        return view('back.teatchers.home' );
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
