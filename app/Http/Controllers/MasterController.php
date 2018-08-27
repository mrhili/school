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
