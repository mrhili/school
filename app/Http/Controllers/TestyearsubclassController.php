<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Testyearsubclass
};
class TestyearsubclassController extends Controller
{
    //



    public function valid(Request $request, Testyearsubclass $test) {

      $test->publish = true;

      if( $test->save() ){

        Relation::beginNoteCollections( $test );

        return response()->json(true);

      }else{

        return response()->json([
            'errors' => 'Sorry, something went wrong.'
        ], 500);

      }


    }



    public function requestValidation(Request $request, Testyearsubclass $test) {

      $test->req_publish = true;

      if( $test->save() ){

        return response()->json(true);

      }else{

        return response()->json([
            'errors' => 'Sorry, something went wrong.'
        ], 500);

      }


    }


}
