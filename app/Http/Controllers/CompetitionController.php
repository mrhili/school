<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Discipline,
  Competition
};
class CompetitionController extends Controller
{
    //
    public function list(){

        $competitions = Competition::all();

        $competitionsArray = Competition::pluck('name', 'id')->toArray();

        $disciplines = Discipline::pluck('name', 'id')->toArray();

        return view('back.competitions.list', compact('competitions', 'competitionsArray', 'disciplines'));

    }



    public function store(Request $request, Discipline $discipline)
    {
        //
        $competition = Competition::create(  [
          'name' => $request->namefield,
          'type' => $request->type,
          'desc' => $request->desc,
          'discipline_id' => $discipline->id
          ] );





        if( $competition ){

            return response()->json(['id' => $competition->id, 'name' => $competition->name ]);
        }




        //return response()->json([ 'parameter' => $request->parameter ]);
    }











}
