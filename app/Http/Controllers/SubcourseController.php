<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
	Subcourse,
	Course,
	History,
	PivotCoursub
};

use Auth;
use Relation;

class SubcourseController extends Controller
{

		public function show(Course $course, Subcourse $subcourse){


			$pivote = $course->subcourses()->where('subcourse_id', $subcourse->id )->first();

			if( $pivote ){

				$sorting =  $pivote->pivot->sorting;

				$next = PivotCoursub::where('course_id', $course->id)
					->where('sorting', $sorting + 1 )
					->first();

				$last = PivotCoursub::where('course_id', $course->id)

					->where('sorting', $sorting - 1 )
					->first();

				//dd( $next, $last );

				return view('back.subcourses.show', compact('subcourse', 'course', 'next', 'last'));

			}else{
				abort(500, 'Pivote pas trouvé.');
			}


		}

///{course}/{subcourse}

    public function linkSubCourse2CourseAfter(Request $request, Course $course, Subcourse $subcourse, Subcourse $subcourseAfter){


    			$sort = Relation::linkSubcourse2CourseAfter($course, $subcourse , $subcourseAfter->id);




		        $admin = Auth::user();

		        $creation = [

		            'id_link' => $subcourse->id,
		            'comment' => $request->comment,
		            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
		            'info' => 'just talk',
		            'hidden_note' => $request->hidden_note,
		            'by-admin' => $admin->id,

		            'category_history_id' => 26,
		            'class' => 'success',
		            //'id_link' => $request->id_link,

		            ];


		        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a crée un subcourse qui porte le titre <strong>'.$subcourse->title.' </strong> au coure qui porte le nom <strong>'.$course->name.' </strong> .'  ;

		        History::create( $creation );
		            return response()->json([

		            	'sort' => $sort,
		            	'id' => $subcourse->id,

			            'title'=> $subcourse->title,
			            'finishing_time'=> $subcourse->finishing_time,
			            'introduction'=> $subcourse->introduction,
		               'body'=> $subcourse->body,
		                'outro'=> $subcourse->outro,
		                'to_grasp'=> $subcourse->to_grasp
		            	]);







    }

//Route::put('/link-subcourse-before/{course}/{subcourse}/{subcourseBefore}', 'SubcourseController@linkSubCourse2CourseBefore')->name('subcourses.link-course-before');
    public function linkSubCourse2CourseBefore(Request $request, Course $course, Subcourse $subcourse, Subcourse $subcourseBefore){


    			$sort = Relation::linkSubcourse2CourseBefore($course, $subcourse ,$subcourseBefore->id);




		        $admin = Auth::user();

		        $creation = [

		            'id_link' => $subcourse->id,
		            'comment' => $request->comment,
		            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
		            'info' => 'just talk',
		            'hidden_note' => $request->hidden_note,
		            'by-admin' => $admin->id,

		            'category_history_id' => 26,
		            'class' => 'success',
		            //'id_link' => $request->id_link,

		            ];


		        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a crée un subcourse qui porte le titre <strong>'.$subcourse->title.' </strong> au coure qui porte le nom <strong>'.$course->name.' </strong> .'  ;

		        History::create( $creation );
		            return response()->json([

		            	'sort' => $sort,
		            	'id' => $subcourse->id,

			            'title'=> $subcourse->title,
			            'finishing_time'=> $subcourse->finishing_time,
			            'introduction'=> $subcourse->introduction,
		               'body'=> $subcourse->body,
		                'outro'=> $subcourse->outro,
		                'to_grasp'=> $subcourse->to_grasp
		            	]);







    }




    public function storeSubCourse2CourseAfter(Request $request, Course $course, Subcourse $subcourse){

    		$newsubcourse = Subcourse::create([
                'title'=> $request->titlefield,
                'finishing_time' => $request->finishing_time,
                'introduction' => $request->introduction,
               'body'=> $request->body,
                'outro'=> $request->outro,
                'to_grasp'=> $request->to_grasp
    		]);

    		if( $newsubcourse ){
    			$sort = Relation::linkSubcourse2CourseAfter($course, $newsubcourse ,$subcourse->id);


/****/


		        $admin = Auth::user();

		        $creation = [

		            'id_link' => $newsubcourse->id,
		            'comment' => $request->comment,
		            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
		            'info' => 'just talk',
		            'hidden_note' => $request->hidden_note,
		            'by-admin' => $admin->id,

		            'category_history_id' => 26,
		            'class' => 'success',
		            //'id_link' => $request->id_link,

		            ];


		        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a crée un subcourse qui porte le titre <strong>'.$newsubcourse->title.' </strong> au coure qui porte le nom <strong>'.$course->name.' </strong> .'  ;

		        History::create( $creation );
		            return response()->json([

		            	'sort' => $sort,
		            	'id' => $newsubcourse->id,

			            'title'=> $newsubcourse->title,
			            'finishing_time'=> $newsubcourse->finishing_time,
			            'introduction'=> $newsubcourse->introduction,
		               'body'=> $newsubcourse->body,
		                'outro'=> $newsubcourse->outro,
		                'to_grasp'=> $newsubcourse->to_grasp
		            	]);



/*******/


    		}




    }














    public function storeSubCourse2CourseBefore(Request $request, Course $course, Subcourse $subcourse){

    		$newsubcourse = Subcourse::create([
                'title'=> $request->titlefield,
                'finishing_time' => $request->finishing_time,
                'introduction' => $request->introduction,
               'body'=> $request->body,
                'outro'=> $request->outro,
                'to_grasp'=> $request->to_grasp
    		]);

    		if( $newsubcourse ){
    			$sort = Relation::linkSubcourse2CourseBefore($course, $newsubcourse ,$subcourse->id);


/****/


		        $admin = Auth::user();

		        $creation = [

		            'id_link' => $newsubcourse->id,
		            'comment' => $request->comment,
		            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
		            'info' => 'just talk',
		            'hidden_note' => $request->hidden_note,
		            'by-admin' => $admin->id,

		            'category_history_id' => 26,
		            'class' => 'success',
		            //'id_link' => $request->id_link,

		            ];


		        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a crée un subcourse qui porte le titre <strong>'.$newsubcourse->title.' </strong> au coure qui porte le nom <strong>'.$course->name.' </strong> .'  ;

		        History::create( $creation );
		            return response()->json([

		            	'sort' => $sort,
		            	'id' => $newsubcourse->id,

			            'title'=> $newsubcourse->title,
			            'finishing_time'=> $newsubcourse->finishing_time,
			            'introduction'=> $newsubcourse->introduction,
		               'body'=> $newsubcourse->body,
		                'outro'=> $newsubcourse->outro,
		                'to_grasp'=> $newsubcourse->to_grasp
		            	]);



/*******/


    		}




    }

/*
	Route::post('/replace-subcourse/{course}/{subcourse}', 'SubcourseController@storeSubCourse2CourseAndDetachSubcourse')->name('subcourses.replace-new');
	Route::put('/replace-link-subcourse/{course}/{subcourse}/{detach}', 'SubcourseController@linkSubCourse2CourseAndDetachSubcourse')->name('subcourses.replace-link');
*/



	public function storeSubCourse2CourseAndDetachSubcourse(Request $request, Course $course, Subcourse $subcourse){

		$pivot = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $subcourse->id)->first();
		$pivot->delete();


		return $this->storeSubCourse2Course( $request, $course);


	}

	public function linkSubCourse2CourseAndDetachSubcourse(Request $request, Course $course, Subcourse $subcourse, Subcourse $detach){

		$pivot = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $detach->id)->first();
		$pivot->delete();

		return $this->linkSubCourse2Course( $request, $course, $subcourse);

	}













    /*

Route::get('/add-subcourse/{course}', 'SubcourseController@addSubCourse2Course')->name('subcourses.add-link');
	Route::post('/add-subcourse/{course}', 'SubcourseController@storeSubCourse2Course')->name('subcourses.store-link');
	Route::put('/link-subcourse/{course}/{subcourse}', 'SubcourseController@linkSubCourse2Course')->name('subcourses.link-course');

    */

    public function addSubCourse2Course(Course $course){

        $uSubcourses = $course->subcourses->pluck('id')->toArray();

        $subcoursesArrayFull = Subcourse::pluck('id')->toArray();

        $subcoursesArrayIds = array_diff( $subcoursesArrayFull, $uSubcourses );

        $unutilSubcourses = Subcourse::find($subcoursesArrayIds)->pluck('title', 'id')->toArray();

        $unutilSubcoursesJs = Subcourse::find($subcoursesArrayIds)->pluck('id')->toJson();

    	return view('back.subcourses.course-subcourse', compact('course', 'unutilSubcourses', 'unutilSubcoursesJs'));

    }


    public function storeSubCourse2Course(Request $request, Course $course){

    	$subcourse = Subcourse::create([
                'title'=> $request->titlefield,
                'finishing_time' => $request->finishing_time,
                'introduction' => $request->introduction,
               'body'=> $request->body,
                'outro'=> $request->outro,
                'to_grasp'=> $request->to_grasp
    		]);

    	if( $subcourse ){

    			$sort = Relation::linkSubcourse2Course($course , $subcourse) ;

		        $admin = Auth::user();

		        $creation = [

		            'id_link' => $subcourse->id,
		            'comment' => $request->comment,
		            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
		            'info' => 'just talk',
		            'hidden_note' => $request->hidden_note,
		            'by-admin' => $admin->id,

		            'category_history_id' => 26,
		            'class' => 'success',
		            //'id_link' => $request->id_link,

		            ];


		        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a crée un subcourse qui porte le titre <strong>'.$subcourse->title.' </strong> au coure qui porte le nom <strong>'.$course->name.' </strong> .'  ;

		        History::create( $creation );
		            return response()->json([

		            	'sort' => $sort,
		            	'id' => $subcourse->id,

			            'title'=> $subcourse->title,
			            'finishing_time'=> $subcourse->finishing_time,
			            'introduction'=> $subcourse->introduction,
		               'body'=> $subcourse->body,
		                'outro'=> $subcourse->outro,
		                'to_grasp'=> $subcourse->to_grasp
		            	]);



    	}

    }

    public function linkSubCourse2Course(Request $request, Course $course, Subcourse $subcourse){


    			$sort = Relation::linkSubcourse2Course($course , $subcourse) ;

		        $admin = Auth::user();

		        $creation = [

		            'id_link' => $subcourse->id,
		            'comment' => $request->comment,
		            //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
		            'info' => 'just talk',
		            'hidden_note' => $request->hidden_note,
		            'by-admin' => $admin->id,

		            'category_history_id' => 27,
		            'class' => 'success',
		            //'id_link' => $request->id_link,

		            ];


		        $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a linké un subcourse qui porte le titre <strong>'.$subcourse->title.' </strong> au coure qui porte le nom <strong>'.$course->name.' </strong> .'  ;

		        History::create( $creation );
		            return response()->json([

		            	'sort' => $sort,
		            	'id' => $subcourse->id,
			            'title'=> $subcourse->title,
			            'finishing_time'=> $subcourse->finishing_time,
			            'introduction'=> $subcourse->introduction,
		               'body'=> $subcourse->body,
		                'outro'=> $subcourse->outro,
		                'to_grasp'=> $subcourse->to_grasp
		            	]);



    }

/*

	Route::delete('/detach/{course}/{subcourse}', 'SubcourseController@detachSubcourseFromCourse')->name('subcourses.detach');
	Route::delete('/destroy-subcourse-from-course/{course}/{subcourse}', 'SubcourseController@')->name('subcourses.destroy');

*/


	public function detachSubcourseFromCourse(Request $request, Course $course, Subcourse $subcourse){

		$pivot = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $subcourse->id)->first();
		$pivot->delete();

		return response()->json( true );
	}


	public function destroy(Request $request ,Subcourse $subcourse){

		$subcourse->delete();

		return response()->json( true );
	}

}
