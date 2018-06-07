<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    User,
    Objctype,
    History
};

use Auth;

class ObjctypeController extends Controller
{
    //


   
    public function list ()
    {
        # code...
        $objctypes = Objctype::all();
        
        $objctype_names = Objctype::pluck('name')->toJson();
        
        
        return view('back.objctypes.list', compact('objctypes', 'objctype_names'));
    }
    
    
   public function store(Request $request)
    {
        $objctype = Objctype::create(  [
            'name' => $request->namefield

            ] );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $objctype->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];
       

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté un type dobject qui porte le nom <strong>'.$request->namefield.' </strong> .'  ;

        History::create( $creation );

        if( $objctype ){
            return response()->json(['id' => $objctype->id, 'name' => $objctype->name ]);
        }
        

        

        //return response()->json([ 'parameter' => $request->parameter ]);
    }


}
