<?php

namespace App\Http\Controllers;
use App\{
  User
};
use Illuminate\Http\Request;
use Auth;

use Session;
class AdminController extends Controller
{

  public function profile(User $user){

    $year = Session::get('yearId');


    /****************/
    $passInfo = false;
    $passChangeInfo = false;
    if( Auth::check() ){

      if( Auth::user()->role >= 4 ){
        $passChangeInfo = true;

        $passInfo = true;

      }

    }





    /*****************/

    return view('back.admins.profile', compact('passInfo', 'user', 'passChangeInfo'));


  }




  public function docs($selected=null){
      /****************/



      $array =
      [
        'links' => [
          [
            "title" => "coucou" ,
            "panels" => [
              [
                "title" => "panels 1 ",
                "videos" => [
                  [
                    "title" => "video 1",
                    "href" => "https://www.youtube.com/embed/XNBeUmd5O9s",
                  "p" => "Lorem ipsum represents a fans."
                  ]
                ]
              ]


            ]
          ]


        ]
      ];

      return view('back.docs.index',compact('array', 'selected'));
  }
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
