<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariaController extends Controller
{

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

      return view('back.secretarias.home');

    }

    public function myProfile(){
        /****************/

        $passInfo = true;
        /*****************/
        $user = Auth::user();
        return view('back.secretarias.my-profile',compact('passInfo', 'user'));
    }

}
