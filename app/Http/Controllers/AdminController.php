<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function home(){
        return view('back.admins.home');
    }

    public function myProfile(){
        /****************/

        $passInfo = true;
        /*****************/
        $user = Auth::user();
        return view('back.admins.my-profile',compact('passInfo', 'user'));
    }
}
