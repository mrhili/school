<?php

namespace App\Http\Controllers;

use App\Fourniture;
use App\User;
use App\History;
use Illuminate\Http\Request;
use App\{
  TheClass,
  Demandefourniture
};
use Auth;
use Relation;
use Session;

class FournitureController extends Controller
{
    //{student}/{fourniture}/{howmany}
    public function demande(Request $request, User $student, Fourniture $fourniture, $howmany){
      $totalmoney = $howmany * $fourniture->average_price;

      $demande = Demandefourniture::create([
        'fourniture_id' => $fourniture->id ,
        'parent_id' => Auth::id(),
        'student_id' => $student->id,
        'howmany' => $howmany,
        'totalmoney' => $totalmoney,
        'message' => $request->message
      ]);

      if( $demande ){

        $creation = [

            'id_link' => $demande->id,
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => Auth::id(),
            'comment' => 'Cette fonction et faite par un parent',
            'category_history_id' => 29,
            'class' => 'info',

            ];

          $creation['info'] = 'Le parent : <strong>'.Auth::user()->name .' '.
          Auth::user()->last_name .'</strong> a demander '.$howmany.' fourniture qui porte le nom <strong>'.
          $fourniture->name.' </strong> la charge sera' . $totalmoney . ' </strong>.'  ;

          History::create( $creation );

          return response()->json(['id' => $fourniture->id, 'name' => $fourniture->name, 'average_price' => $fourniture->average_price, 'howmany' => $howmany ,'totalmoney' => $totalmoney ]);
      }



    }

    public function list(){

        $fournitures = Fourniture::all();

        $fournituresArray = Fourniture::pluck('name', 'id')->toArray();

        return view('back.fournitures.list', compact('fournitures', 'fournituresArray'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fourniture = Fourniture::create(  [
            'name' => $request->name,
            'additional_info' => $request->additional_info,
            'for' => $request->forfield,
            'required' => $request->required,
            'average_price' => $request->average_price,
            'got' => $request->got

            ] );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $fourniture->id,
            'comment' => $request->comment,
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 12,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];
        $necessary;

        if ($request->required) {
            $necessary = 'necessaire';

        }else{
            $necessary = 'nest pas trop necessaire';
        }

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté une fourniture qui porte le nom <strong>'.$request->name.' </strong> avec les informations suivantes <strong>'.$request->additional_info.' </strong>
        et cette fourniture  <strong>'.$necessary.' </strong>
        pour <strong>'.$request->for.' </strong>
        Il ya dans les ecole <strong>'.$request->got.' piece</strong>
        peut etre son prix est  <strong>'.$request->average_price.' </strong> .'  ;

        History::create( $creation );

        if( $fourniture ){
            return response()->json(['id' => $fourniture->id, 'id' => $fourniture->got,'name' => $fourniture->name, 'additional_info' => $fourniture->additional_info ,'for' => $fourniture->for,'required' => $fourniture->required,'name' => $fourniture->average_price ]);
        }




        //return response()->json([ 'parameter' => $request->parameter ]);
    }



    public function byClass($class){

        $class = TheClass::find($class);

        $fournitures = $class->fournitures;

        $fournituresMines = $class->fournitures->pluck('id')->toArray();

        $fournituresArrayFull = Fourniture::pluck('id')->toArray();

        $fournituresArrayIds = array_diff( $fournituresArrayFull, $fournituresMines );

        $fournituresArray = Fourniture::find($fournituresArrayIds)->pluck('name', 'id')->toArray();

        return view('back.fournitures.byClass', compact('class', 'fournitures', 'fournituresArray'));

    }


    public function linkClass(Request $request,$class, $fourniture_id){

        $the_class = TheClass::find( $class );

        $fourniture = Fourniture::find( $fourniture_id );

        $pivot = $the_class->fournitures()->attach( $fourniture_id );

        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $fourniture->id,
            'comment' => $request->comment,
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 24,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté une fourniture qui porte le nom <strong>'.$fourniture->name.' </strong> au class qui porte le nom' . $the_class->name . ' </strong>.'  ;

        History::create( $creation );

        Relation::fillStudentsFournituration( $the_class, $fourniture  );



        if( $fourniture ){
            return response()->json(['id' => $fourniture->id, 'name' => $fourniture->name, 'additional_info' => $fourniture->additional_info ,'for' => $fourniture->for,'required' => $fourniture->required,'name' => $fourniture->average_price ]);
        }

    }




}
