<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    //
    public function profile(){
      return view('back.masters.my-profile');

    }
}
