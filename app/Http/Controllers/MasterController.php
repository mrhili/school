<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class MasterController extends Controller
{
    //

    public function myProfile(){
        /****************/

        $passInfo = true;
        $passChangeInfo = true;
        /*****************/
        $user = Auth::user();

        return view('back.masters.profile',compact('passInfo', 'user', 'passChangeInfo'));
    }


    public function profile(User $user){
      /****************/
      $passInfo;
      $passChangeInfo;

      $passInfo = false;
      $passChangeInfo = false;

      if( Auth::check() ){

        if( Auth::user()->id == $user->id ){

          $passInfo = true;
          $passChangeInfo = true;

        }

      }




      /*****************/

      return view('back.masters.profile', compact('passInfo', 'user', 'passChangeInfo'));

    }
}
