<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
  Wallet
};

use Yajra\Datatables\Datatables;

class WalletController extends Controller
{
    //

    public function bilan($date = null){

      if( $date ){


      }

      $totalDef = Wallet::where('mines',  true )->sum('amount');
      $totalBen = Wallet::where('mines',  false )->sum('amount');

      return view('back.wallets.bilan', compact('date', 'totalBen', 'totalDef'));

    }


    public function dataBen($date = null){

      return Datatables::of( Wallet::where('mines', false )->get() )


       ->editColumn('reason', function( $model ){

           return 'reason';

        })

       ->editColumn('info', function( $model ){

           return 'info';

        })

       ->rawColumns(['reason','info'])

       ->make(true);

    }



    public function dataDef($date = null){

      return Datatables::of( Wallet::where('mines', true )->get() )


       ->editColumn('reason', function( $model ){

           return 'reason';

        })

       ->editColumn('info', function( $model ){

           return 'info';

        })

       ->rawColumns(['reason','info'])

       ->make(true);

    }


}
