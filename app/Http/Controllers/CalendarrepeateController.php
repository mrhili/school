<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendarrepeate;
class CalendarrepeateController extends Controller
{
    //
    public function getRepeated(){

    	$cal = Calendarrepeate::select('title','start_date', 'end_date', 'dow', 'background_color', 'is_all_day' )->get();

    	return response()->json( $cal );
    }
}
