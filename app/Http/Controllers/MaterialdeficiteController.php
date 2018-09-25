<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  Transporting,
  Materialdeficite
};

use ArrayHolder;
use Application;
use Relation;

class MaterialdeficiteController extends Controller
{
    //
    public function add(){

      $types = ArrayHolder::deficiteTypes();

      $models = Transporting::get(['num_immatriculation', 'id'])->pluck('num_immatriculation','id')->toArray();

      return view('back.materialdeficites.add', compact('types', 'models'));

    }

    public function store(Request $request){

      $array = $request->toarray();

      $array['year_id'] = $this->selected_year;
      $deficite = Materialdeficite::create( $array );



      if( $deficite ){

        $model = Relation::modelOf( $request->type, $request->id_model );

        $info = 'Une material deficite a etait enregistrer pour '.
          ArrayHolder::deficiteTypes( $request->type ).

          'le nom est'. ( ArrayHolder::deficiteTypes( $request->type ) == 0 ? $model->num_immatriculation : $model->name).
          'mantent de '. $request->price.
          ($request->paid ? ' est Payé': ' Non payé').
          'la raison est '. $request->reason;

        $history = Application::toHistory(
                              $deficite,
                              [
                                47,
                                'warning',
                                $info
                              ]
                          );

        if( $history ){
          Application::toWallet(
            $history,
            $request->price * -1
          );

          return response()->json([
            'id' => $deficite->id
          ]);
        }



      }

    }
}
