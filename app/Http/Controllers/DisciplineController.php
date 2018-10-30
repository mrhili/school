<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Discipline
};
class DisciplineController extends Controller
{
    //
    //
    public function list(){

      $disciplines = Discipline::all();

      $disciplinesArray = Discipline::pluck('name', 'id')->toArray();

      return view('back.disciplines.list', compact('disciplines', 'disciplinesArray'));


    }

    public function store(Request $request)
    {
        //
        $discipline = Discipline::create(  ['name' => $request->namefield ] );


        if( $discipline ){



            return response()->json(['id' => $discipline->id, 'name' => $discipline->name ]);
        }


    }





}
