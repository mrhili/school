<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{
    User,
    Year,
    TheClass,
    Subject,
    Subjectclass,
    Testyearsubclass
};

use ArrayHolder;

use Yajra\Datatables\Datatables;

class SubjectclassController extends Controller
{
    //
    public function tests(Subjectclass $subclass){

      return Datatables::of( Testyearsubclass::where('year_id', $this->selected_year )
        ->where('subject_the_class_id', $subclass->id )->get() )

        ->editColumn('subject_id', function( $model ){

            return $model->subjectclass->subject->name;
       })
       ->editColumn('test_id', function( $model ){

           return $model->test->title;
      })
      ->editColumn('kind', function( $model ){

          return ArrayHolder::testTypes( $model->test->kind )[1];

      })
      ->editColumn('teatcher_id', function( $model ){

          return $model->teatcher->full_name;
      })
      ->editColumn('course_id', function( $model ){

         return optional( $model->course )->name;
      })
      ->editColumn('publish', function( $model ){

        return ($model->publish? 'Déja publié': 'Non publié');
      })
      ->editColumn('end', function( $model ){

       return $model->end;
      })
      ->editColumn('navigator', function( $model ){

      return $model->navigator;
      })
      ->editColumn('is_exercise', function( $model ){

      return ($model->is_exercise? 'Exercice': 'Un vrai test');
      })
      ->editColumn('show', function( $model ){
        return 'show';
      //  return link_to_route('users.gradation', 'Graduation', [ $model->id ], ['class' => 'btn btn-info btn-circle', 'target' => '_blank']);

      })
      ->editColumn('notes', function( $model ){

        return link_to_route('notes.by-tysc', 'Les notes', [ $model->id ], ['class' => 'btn btn-info btn-circle', 'target' => '_blank']);

      })
       ->make(true);
    }
}
