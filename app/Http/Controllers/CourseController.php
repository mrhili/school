<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
	Course,
	User,
	History
};
use Auth;

class CourseController extends Controller
{
    //


	public function list(){
		
		$courses = Course::all();

		return view('back.courses.list', compact('courses'));
	}

	public function store(Request $request){

$crsArr = [
            'name' => $request->namefield,
            'objective' => $request->objective,
            'introduction' => $request->introduction,
            'content' => $request->content,
            'teaser_type' => $request->teaser
            ];
        
		if( $request->teaser == 0 ){
			$crsArr['teaser_text'] = $request->teaser_text;
		}elseif( $request->teaser == 1 ){
			$crsArr['teaser_video'] = $request->teaser_video;
		}

		$course = Course::create( $crsArr );


        $admin = User::find( Auth::id() );

        $creation = [

            'id_link' => $course->id,
            'comment' => $request->comment, 
            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh 
            'info' => 'just talk',
            'hidden_note' => $request->hidden_note,
            'by-admin' => $admin->id,

            'category_history_id' => 25,
            'class' => 'success',
            //'id_link' => $request->id_link,

            ];
       

        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté un course qui porte le nombre <strong>'.$course->name.' </strong> .'  ;

        History::create( $creation );

        if( $course ){
            return response()->json([


            	'id' => $course->id,
	            'name' => $course->name,
	            'objective' => $course->objective,
	            'introduction' => $course->numberfield,
	            'content' => $course->content,
	            'teaser_type' => $course->teaser,
	            'teaser_text' => $course->teaser_text,
	            'teaser_video' => $course->teaser_video
            	]);
        }

    }
}
