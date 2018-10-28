<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  Unity,
  Subunity
};

class SubunityController extends Controller
{
    //
    public function getFromUnity(Request $request, Unity $unity){


      return response()->json($unity->subunities->toArray());

    }


    public function list(){

        $subunities = Subunity::all();

        $unitiesArray = Unity::pluck('name', 'id')->toArray();

        return view('back.subunities.list', compact('subunities', 'unitiesArray'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Unity $unity)
    {
        //
        $subunity = Subunity::create(  ['name' => $request->namefield, 'unity_id' => $unity->id ] );


        if( $subunity ){
            return response()->json([
              'id' => $subunity->id,
              'name' => $subunity->name,
              'unity_id' => $subunity->unity_id
            ]);
        }else{
          return response()->json(['message' => 'Cant register'], 500);
        }

    }



}
