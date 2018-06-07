<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    User,
    Roomtype,
    History
};

use Auth;
class RoomtypeController extends Controller
{
    //
    



  
    public function list()
    {
        # code...
       
        $roomtypes = Roomtype::all();
        
        $roomtype_names = Roomtype::pluck('name')->toJson();
        
         return view('back.roomtypes.all', compact('roomtypes', 'roomtype_names'));
    }
    
    
   public function store(Request $request)
    {
        $roomtype = Roomtype::create(  [
            'name' => $request->namefield

            ] );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $roomtype->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];
       

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté type de chambre qui porte le nom <strong>'.$request->namefield.' </strong> .'  ;

        History::create( $creation );

        if( $roomtype ){
            return response()->json(['id' => $roomtype->id, 'name' => $roomtype->name]);
        }
        

        

        //return response()->json([ 'parameter' => $request->parameter ]);
    }




    
}
