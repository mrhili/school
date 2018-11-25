<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
	Local
};

class LocalApiController extends Controller
{
    //
    public function check(Request $request){



    	$i = 1;

    	foreach (config('app.locales') as $cl => $config_local) { 
    		# code...
    		# 
    		$local = Local::findOrFail($i);

    		if( $local->name != $cl ){

    			return response()->json(['state' => false , 'message' => 'error in '.$cl ], 200);

    		}

    		$i++;
    	}

    	return response()->json(['state' => true , 'message' => 'Good'], 200);

   }



    public function fix(Request $request){



    	$i = 1;

    	foreach (config('app.locales') as $cl => $config_local) { 
    		# code...
    		# 
    		$local = Local::findOrFail($i);

    		$local->name = $i;

    		$local->save();

    		$i++;
    	}

    	return response()->json(['state' => true , 'message' => 'Fixed'], 200);

   }


}
