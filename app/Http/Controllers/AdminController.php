<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function myProfile(){
        /****************/

        $passInfo = true;
        /*****************/
        return view('back.secretarias.my-profile',compact('passInfo'));
    }
}
