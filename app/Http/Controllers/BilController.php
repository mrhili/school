<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Bil,
  History
};
use Auth;

use Application;

class BilController extends Controller
{
    //

    public function manage(){

      $bils = Bil::paginate(20);

      return view('back.bils.manage', compact('bils'));
    }


    public function post(Request $request){

      $bil = Bil::create([
        'service' => $request->service,
        'price' => $request->price
      ]);



      if( $bil ){

        $info = 'nom <strong>'.$bil->service.'</strong> et le prix <strong>'.$bil->price .'</strong>.';

        Application::toHistory(
                      $bil,
                      [
                        37,
                        'info',
                        $info
                      ],
                      $request
                  );


        return response()->json([
          'service' => $bil->service,
          'price' => $bil->price
        ]);

      }


    }



}
