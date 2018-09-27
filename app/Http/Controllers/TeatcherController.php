<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Relation;

use Session;

use Auth;

use Application;

use App\{
  User,
  Courseyearsubclass,
  Testyearsubclass
};

class TeatcherController extends Controller
{


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

      return view('back.teatchers.profile', compact('passInfo', 'user', 'passChangeInfo'));


    }



    public function home(){

      $user = Auth::user();

      $year = Session::get('yearId');

      $calendar = Application::loadCalendarForTeatcher( $user );

      $courses2rValidate = Courseyearsubclass::where('publish', false)
        ->where('year_id', $year)
        ->where('teatcher_id', $user->id )
        ->where('req_publish', false )
        ->where('publish', false )
        ->take(10)
        ->get();

        //dd($courses2rValidate);



        $tests2rValidate = Testyearsubclass::where('publish', false)
          ->where('year_id', $year)
          ->where('teatcher_id', $user->id )
          ->where('req_publish', false )
          ->where('publish', false )
          ->take(10)
          ->get();

        return view('back.teatchers.home', compact('calendar', 'courses2rValidate', 'tests2rValidate') );
    }

    public function myProfile(){


        $passChangeInfo = false;
        /****************/
        $passInfo = true;
        /*****************/
        $user = Auth::user();

        return view('back.teatchers.my-profile',compact('passInfo','passChangeInfo', 'user'));
    }

    public function add(){

    	return view('back.teatchers.add');

    }
}
