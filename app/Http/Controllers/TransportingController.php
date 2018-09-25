<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Transporting
};
class TransportingController extends Controller
{
    //



    public function list(){

      $transportings = Transporting::paginate(10);

      return view('back.transportings.list', compact('transportings') );
    }

    public function store(Request $request){

      $transporting = Transporting::create( $request->all() );

      if( $transporting ){

        return response()->json([
          'id' => $transporting->id,
          'num_immatriculation' => $transporting->num_immatriculation,
          'imm_anterieure' => $transporting->imm_anterieure
        ]);

      }


    }


}
