<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
    User,
    Objctype,
    Room,
    Objct,
    History
};

use Auth;
use ArrayHolder;

class ObjctController extends Controller
{



    public function list()
    {
        # code...
       
        $objcts = Objct::all();

        $objctypes = Objctype::pluck('name', 'id')->toArray();

        $rooms = Room::pluck('name', 'id')->toArray();

        return view('back.objcts.list', compact('objctypes', 'rooms', 'objcts'));
    }
    
    
   public function store(Request $request, Room $room, Objctype $objctype)
    {


        $obj = Objct::create(  [
            'name' => $request->namefield,
            'description' => $request->description,
            'objctype_id' => $objctype->id,
            'state' => $request->state,
            'room_id' => $room->id
            ] );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $room->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];
        $description;

        if( $request->description ){

        	$description = 'sa discription est <strong>'. $request->description .'</strong>';

        }else{

        	$description = 'sans description';

        }
       

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name ;
        $creation['info'] .='</strong> a ajouté un object qui porte le nom <strong>'.$obj->name;
        $creation['info'] .= '  </strong> en type <strong>'. $objctype->name ;
         $creation['info'] .= '</strong> et qui est dans la chambre <strong> N'. $room->name; 
         $creation['info'] .='</strong> son etat est <strong>'. $obj->state;
        $creation['info'] .= '</strong> '. $description .' .'  ;

        History::create( $creation );

        if( $obj ){
            return response()->json(['id' => $obj->id, 'name' => $obj->name, 'description' => $obj->description, 'objctype' => $objctype->name, 'state' => ArrayHolder::states( $obj->state ), 'room' => $room->name ]);
        }
        

        

        //return response()->json([ 'parameter' => $request->parameter ]);
    }



}
