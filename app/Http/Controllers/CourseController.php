<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
	Course,
	User,
	History,
	TheClass,
	Subject,
	Courseyearsubclass,
	SubjectClass
};
use Auth;
use Session;


class CourseController extends Controller
{
    //


		public function storeLinked(Request $request, TheClass $class, Subject $subject){

			$year = Session::get('yearId');

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


			if( $course ){

				$subjectClass = SubjectClass::where('the_class_id', $class->id )
					->where('subject_id', $subject->id )
					->where('year_id' , $year)->first();

				if($subjectClass){

					$courseYSC = Courseyearsubclass::create([
						'subject_the_class_id' => $subjectClass->id,
						'subject_id' => $subject->id,
						'the_class_id' => $class->id,
						'course_id' => $course->id,
						'year_id' => $class->id,
						'teatcher_id' => Auth::user()->id
					]);

					if( $courseYSC ){



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

								$creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté un course qui porte le nombre <strong>'.$course->name.' </strong> .'.
								'et la linké au course <strong>'. $course->name .  '</strong> et au matiére <strong>'. $subject->name . '</strong>' ;

				        $history = History::create( $creation );

								if( $history ){
				            return response()->json([


				            	'id' => $course->id,
					            'name' => $course->name,
					            'objective' => $course->objective,
					            'introduction' => $course->introduction,
					            'content' => $course->content,
					            'teaser_type' => $course->teaser,
					            'teaser_text' => $course->teaser_text,
					            'teaser_video' => $course->teaser_video,
											'subject' => $subject->name,
											'class' => $class->name
				            	]);
				        }

					}else{

						return response()->json(['error' => 'cant create courseyearsubjectclass'], 403);

					}

/*********************/

				}else{

					return response()->json(['error' => 'cant find subject class'], 403);

				}


			}else{
				return response()->json(['error' => 'cant create course'], 403);
			}


	    }


	public function addLinked(TheClass $class,  Subject $subject, $language = null){

      if( $language == null ){

          $language = 'fr';
      }

			$year = Session::get('yearId');

			$courses = Courseyearsubclass::where('the_class_id', $class->id)
			->where('subject_id', $subject->id)
			->where('year_id', $year)
			->paginate(10);

      return view('back.courses.add-linked',compact('subject', 'class','language', 'courses'));
  }


	public function languageLinked(TheClass $class, Subject $subject){
			return view('back.courses.language-linked', compact('class', 'subject'));
	}


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
	            'introduction' => $course->introduction,
	            'content' => $course->content,
	            'teaser_type' => $course->teaser,
	            'teaser_text' => $course->teaser_text,
	            'teaser_video' => $course->teaser_video
            	]);
        }

    }
}
