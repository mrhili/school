<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
    User,
    Etage,
    History
};

use Auth;

class EtageController extends Controller
{
    //
    
    public function list ()
    {
        # code...
        $etages = Etage::all();
        
        $etage_numbers = Etage::pluck('number')->toJson();
        
        
        return view('back.etages.list', compact('etages', 'etage_numbers'));
    }
    
    
   public function store(Request $request)
    {
        $etage = Etage::create(  [
            'number' => $request->numberfield

            ] );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $etage->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by_admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];
       

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté un etage qui porte le nombre <strong>'.$request->numberfield.' </strong> .'  ;

        History::create( $creation );

        if( $etage ){
            return response()->json(['id' => $etage->id, 'number' => $etage->number]);
        }
        

        

        //return response()->json([ 'parameter' => $request->parameter ]);
    }
    
    
    
    
    
}
