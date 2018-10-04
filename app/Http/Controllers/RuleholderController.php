<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  Rule,
  Ruleholder
};

use Application;
use Auth;
class RuleholderController extends Controller
{
    //





    public function delete(Request $request, $ruleholder){

      $ruleholder = Ruleholder::find( $ruleholder );


      if( $ruleholder->user_id == Auth::id() || Auth::user()->role >= 5 ){

        $info = 'la loi <strong>'. $ruleholder->rule->rule.'</strong> et rejeter par '. Auth::user()->full_name;



        $ruleholder->delete();

        Application::toHistory(
          $ruleholder,
          [
            51,
            'info',
            $info
          ]
        );

        response()->json( true );
      }else{
        response()->json( ['message' => 'error'] , 500);
      }



    }
}
