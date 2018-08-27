<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  User
};
use Auth;

use Session;

class ParentController extends Controller
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

    public function profile(User $user){

      $year = Session::get('yearId');


      /****************/
      $passInfo = true;
      $passChangeInfo = false;
      if( Auth::check() ){

        if( Auth::user()->role > 1 ){
          $passChangeInfo = true;

        }

      }


      /*****************/

      return view('back.parents.profile', compact('passInfo', 'user', 'passChangeInfo'));


    }





    public function myProfile(){


        /****************/

        $passInfo = true;
        /*****************/
        $user = Auth::user();
        return view('back.parents.my-profile',compact('passInfo', 'user'));
    }

    public function all(){
    	$parents = User::where('role', 2)->get();
        return view('back.parents.all',compact('parents'));
    }

    public function home(){

        $user = Auth::user();

        $childs = $user->relashionshipsStudentsParent;

        $year = Session::get('yearId');

        return view('back.parents.home',compact('childs', 'year'));
    }

}
