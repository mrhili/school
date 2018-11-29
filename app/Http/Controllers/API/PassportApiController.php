<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\{
	User
};
class PassportApiController extends Controller
{
    //
    public function login(Request $request ){

    	if(Auth::attempt([ 
    		'email' => $request->email,
    		'password' => $request->password
    	  ]) ){
    	  	$user = Auth::user();

    	  	return response()->json(['message' => 'message', 'token' => $user->createToken('Token')->accessToken ], 200);

    	}else{
    		return response()->json(['message' => 'fail'], 401);
    	}

    }

    public function register(Request $request ){

    	$success;

	    $validator = Validator::make($request->all(), [
	        'name' => 'required|string|max:255',
	        'email' => 'required|string|email|max:255|unique:users',
	        'password' => 'required|string|min:6',
	        'confirmed_password' => 'required|string|min:6|same:password',
	    ]);

    	if( !$validator->fails() ){
    	  	$input = $request->all();
    	  	$input['password'] = bcrypt( $request->password );
    	  	$user = User::create($input);
    	  	$success['name'] = $user->name;
    	  	$success['token'] = $user->createToken('Token')->accessToken;
    	  	return response()->json(['message' => 'message', 'success' => $success], 200);

    	}else{
    		return response()->json(['error' => $validator->errors() ,'message' => 'fail'], 401);
    	}

    }

    public function getDetails(){
    	return response()->json(['message' => 'detail'], 200);
    }



}
