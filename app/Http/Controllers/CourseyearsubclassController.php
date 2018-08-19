<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
  Courseyearsubclass
};
class CourseyearsubclassController extends Controller
{
    //

    public function show(Courseyearsubclass $course){

  			return view('back.courses.show', compact('course'));

  	}


    public function valid(Request $request, Courseyearsubclass $course) {

      $course->publish = true;

      if( $course->save() ){

        return response()->json(true);

      }else{

        return response()->json([
            'errors' => 'Sorry, something went wrong.'
        ], 500);

      }


    }



    public function requestValidation(Request $request, Courseyearsubclass $course) {

      $course->req_publish = true;

      if( $course->save() ){

        return response()->json(true);

      }else{

        return response()->json([
            'errors' => 'Sorry, something went wrong.'
        ], 500);

      }


    }










}
