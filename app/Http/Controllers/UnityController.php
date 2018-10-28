<?php

namespace App\Http\Controllers;

use App\{
        History,
        User,
        Unity,
        TheClass,
        Teatchification,
        Unityclass
};
use Illuminate\Http\Request;
use Auth;
use Relation;
use Session;

class UnityController extends Controller
{
  public function list(){

      $unities = Unity::all();

      $unitiesArray = Unity::pluck('name', 'id')->toArray();

      return view('back.unities.list', compact('unities', 'unitiesArray'));

  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
      $unity = Unity::create(  ['name' => $request->namefield] );


      if( $unity ){
          return response()->json(['id' => $unity->id, 'name' => $unity->name ]);
      }else{
        return response()->json(['message' => 'Cant register'], 500);
      }

  }
}
