<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\{
  Contact
};

use Auth;
use Application;

use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    //

    public function send(ContactRequest $request)
    {
      // code...

      $array = $request->all();

      $exterior = null;

      if( Auth::check() ){

        $array['user_id'] = Auth::id();

      }else{
        $exterior = $request->name;
      }

      $info = 'Un message aetait envoyé depuis ' .
        ( Auth::check()? 'User_name: '.Auth::user()->full_name : $request->name ).
        'qui contien <br/> <p> '.$request->body.'</p>'.
        '<p>' . ( Auth::check()? 'User_tel: '.Auth::user()->tel :'tel: '. $request->tel ) .'</p>';

      $contact = Contact::create($array);

      Application::toHistory($contact,[
        54,
        'info',
        $info,
        $exterior

      ]);

      Alert::success(
        'le message a bien etait envoyer',
        'En vas te repondre si tu nous a laisser une trace a plutard'
      );

      return back();

    }


}
