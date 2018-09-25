<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  Transparancy
};

class TransparancyController extends Controller
{
    //

    public function toFlip(){


      $totalTransMines = Transparancy::where('mines',  true )->where('flip',  false )->sum('amount');
      $totalTrans = Transparancy::where('mines',  false )->where('flip',  false )->sum('amount');

      return view('back.transparancies.to-flip', compact('totalTrans', 'totalTransMines'));

    }


    public function dataTrans(){

      return Datatables::of( Transparancy::where('mines',  false )->where('flip',  false )->get() )


       ->editColumn('complet_name', function( $model ){

           return $model->user->name;

        })

       ->editColumn('flip', function( $model ){

           return 'flip';

        })

       ->rawColumns(['flip'])

       ->make(true);

    }




    public function dataTransMines(){

      return Datatables::of( Transparancy::where('mines',  true )->where('flip',  false )->get() )


       ->editColumn('complet_name', function( $model ){

           return $model->user->name;

        })

       ->editColumn('flip', function( $model ){

           return 'flip';

        })

       ->rawColumns(['flip'])

       ->make(true);

    }





}
