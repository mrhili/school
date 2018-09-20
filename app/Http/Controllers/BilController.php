<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Bil,
  History
};
use Auth;

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

        $histArr = [

            'id_link' => $bil->id,
            'comment' => $request->comment,
            'hidden_note' => $request->hidden_note,
            'by-admin' => Auth::id(),

            'category_history_id' => 37,
            'class' => 'info'

        ];

        $histArr['info'] = 'nom <strong>'.$bil->service.'</strong> et le prix <strong>'.$bil->price .'</strong>.';

        History::create( $histArr );


        return response()->json([
          'service' => $bil->service,
          'price' => $bil->price
        ]);

      }


    }



}
