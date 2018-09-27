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
            "title" => "Tutorials" ,
            "panels" => [
              [
                "title" => "Outils",
                "videos" => [

                  [
                    "title" => "Login",
                    "href" => "https://www.youtube.com/embed/8WFaTQWzj8Y",
                  "p" => "Login"
                  ],
                  [
                    "title" => "Changement d'anné",
                    "href" => "https://www.youtube.com/embed/fMRK1xRMjhU",
                  "p" => "Changement d'année"
                  ],

                  [
                    "title" => "Changement d'informations",
                    "href" => "https://www.youtube.com/embed/MXhogIxD3Xs",
                  "p" => "Changement d'infos"
                  ],
                  [
                    "title" => "Retour au dashboard",
                    "href" => "https://www.youtube.com/embed/xKBAlyhjtrMs",
                  "p" => "Retour au dashboard"
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
