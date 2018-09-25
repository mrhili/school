<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
	Meetingtype,
	User,
	History
};

use Auth;

use Session;

use ArrayHolder;

use Illuminate\Support\Str;

class MeetingtypeController extends Controller
{
    //




    public function list()
    {
        # code...

        $meetingtypes = Meetingtype::all();

        $roles = ArrayHolder::roles();

        $meetingtype_names = Meetingtype::pluck('name')->toJson();

         return view('back.meetingtypes.all', compact('meetingtypes', 'meetingtype_names'));
    }


   public function store(Request $request)
    {
        $meetingtype = Meetingtype::create(  [
            	'name' => $request->namefield,
            	'roles' => $request->roles
            ] );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $meetingtype->id,
            'comment' => $request->comment,
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by_admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];

        $rolesDecode = json_decode( $request->roles, true );

         $roles = [];

		foreach ($rolesDecode as $value) {
			# code...

			array_push($roles ,  Str::plural( ArrayHolder::roles( (int) $value )   ) );

		}


        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté un type de meeting qui porte le nom <strong>'.$meetingtype->name.'</strong> et les role appeler sont  <strong>'. implode(",", $roles ) .'</strong> .'  ;

        History::create( $creation );

        if( $meetingtype ){
            return response()->json(['id' => $meetingtype->id, 'name' => $meetingtype->name, 'roles' => $meetingtype->roles ]);
        }

        //return response()->json([ 'parameter' => $request->parameter ]);
    }


}
