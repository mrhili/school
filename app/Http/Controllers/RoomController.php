<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
    User,
    Roomtype,
    Room,
    Etage,
    History
};

use Auth;

class RoomController extends Controller
{
    //


  
    public function list()
    {
        # code...
       
        $rooms = Room::all();

        $roomtypes = Roomtype::pluck('name', 'id')->toArray();

        $etages = Etage::pluck('number', 'id')->toArray();

        return view('back.rooms.list', compact('roomtypes', 'rooms', 'etages'));
    }
    
    
   public function store(Request $request, Etage $etage, Roomtype $roomtype)
    {
        $room = Room::create(  [
            'name' => $request->namefield,
            'description' => $request->desciption,
            'space' => $request->space,
            'etage_id' => $etage->id,
            'roomtype_id' => $roomtype->id
            ] );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $room->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by_admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];
       

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté une chambre qui porte le nom <strong>'.$room->name.'  </strong> en type <strong>'. $roomtype->name .'</strong> et qui est dans letage <strong> N'. $etage->number .'</strong> .'  ;

        History::create( $creation );

        if( $roomtype ){
            return response()->json(['id' => $roomtype->id, 'name' => $roomtype->name, 'desciption' => $roomtype->desciption, 'space' => $roomtype->space, 'etage' => $etage->number, 'roomtype' => $roomtype->name ]);
        }
        

        

        //return response()->json([ 'parameter' => $request->parameter ]);
    }


}
