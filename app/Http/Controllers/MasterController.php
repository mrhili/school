<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class MasterController extends Controller
{
    //

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

          ]
        ];

        return view('back.docs.index',compact('array', 'selected'));
    }




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
