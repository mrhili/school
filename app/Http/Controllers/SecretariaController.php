<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    //
    public function home(){

      return view('back.secretarias.home');

    }

    public function myProfile(){
        /****************/

        $passInfo = true;
        /*****************/
        $user = Auth::user();
        return view('back.secretarias.my-profile',compact('passInfo', 'user'));
    }

}
