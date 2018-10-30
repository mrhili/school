<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Team,
  User
};
class TeamController extends Controller
{
    //
    public function list(){

      $teams = Team::all();

      $members = User::pluck('name', 'id')->toArray();

      $teamsArray = Team::pluck('name', 'id')->toArray();

      return view('back.teams.list', compact('teams', 'teamsArray', 'members'));


    }

    public function store(Request $request)
    {


        //
        $team = Team::create(  ['name' => $request->namefield ] );


        if( $team ){

            $team->members()->attach( $request->members);

            return response()->json(['id' => $team->id, 'name' => $team->name ]);
        }


    }
}
