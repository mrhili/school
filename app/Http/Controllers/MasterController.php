<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    //

    public function myProfile(){
      return 'you arriveed at your profile MASTER';
    }


    public function profile(){
      return view('back.masters.my-profile');

    }
}
