<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\{Ruleholder, User};

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

        $holders = Ruleholder::where('user_id', Auth::id())->get();

        $posts = Auth::user()->appears()->paginate(10);

        return view('back.masters.my-profile',compact('holders', 'passInfo', 'user', 'passChangeInfo', 'posts'));
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

      $holders = Ruleholder::where('user_id', Auth::id())->get();

      $posts = $user->appears()->paginate(10);


      /*****************/

      return view('back.masters.profile', compact('posts','holders', 'passInfo', 'user', 'passChangeInfo'));

    }
}
