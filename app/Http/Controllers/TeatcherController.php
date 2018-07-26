<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeatcherController extends Controller
{
    //
    public function myProfile(){


        /****************/

        $passInfo = true;
        /*****************/
        return view('back.teatchers.my-profile',compact('passInfo'));
    }


    public function add(){

    	return view('back.teatchers.add');

    }
}
