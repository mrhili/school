<?php

namespace App\Http\Controllers;

use App\Year;
use Illuminate\Http\Request;

use Session;

class YearController extends Controller
{

    public function changeYear($id){

        $year = Year::find($id);

        $yearId = $year->id;
        $yearName = $year->name;

        Session::put('yearId', $yearId );
        Session::put('yearName', $yearName );

        return response()->json( ['yearId' => $yearId , 'yearName' => $yearName ] );
    }
}
