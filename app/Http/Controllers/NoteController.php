<?php

namespace App\Http\Controllers;

use App\{
    Note,
    Subjectclass,
    User,
    TheClass
};
use Illuminate\Http\Request;
use Auth;
use Yajra\Datatables\Datatables;
use Session;
use Application;

use Math;


class NoteController extends Controller
{
    protected $finalResult = [];
/*
    public function addBySubectclass(Subject $subject, TheClass $class){



      return view( 'back.notes.add-by-subjectclass' );

    }
*/
    public function databyClass(TheClass $class){

      $columns = [];


      $rows = Datatables::of(User::where('role', 1)->where('the_class_id', $class->id)->get() );

      $rows->addColumn('names', function(User $user) {


          return $user->name . ' '. $user->last_name;
      });



      foreach ($class->subjects as $s) {
        // code...


        $subjectclass = Subjectclass::where('subject_id', $s->id)
        ->where('the_class_id', $class->id)
        ->where('year_id', $this->selected_year)
        ->first();

        $columns[] = 'column-'. $subjectclass->id;

        //dd($subjectclass);
        $rows->addColumn('column-'. $subjectclass->id , function(User $user) use ($subjectclass) {



                    $sentence = '<div>';

                    $notes = Note::where('subject_the_class_id', $subjectclass->id)
                    ->where('student_id', $user->id)
                    ->get();


                    foreach( $notes as $note){
                      if($note->testyearsubclass_id ){
                        $sentence .= '<p>'.$note->testyearsubclass->test->title.'  <span class="label label-success pull-right">'.$note->note.'</span></p><hr />';
                      }else{
                        $sentence .= '<p>we dont know test  </p>  <span class="label label-success pull-right">'.$note->note.'</span><hr />';

                      }
                    }

                    $sentence .= '<div>';


                    return $sentence;

                });
      }





      $rows->addColumn('final', function(User $student) {


                  return  Math::countFinalResult( $student );
              });

      $rows->rawColumns($columns);


      return $rows->make(true);
    }

    public function byClass(TheClass $class)
    {
        $columns = ['Les noms'];
        $ajax = ['names'];

        foreach ($class->subjects as $s) {
          // code...
          $coheficiant = Subjectclass::where('subject_id', $s->id)
          ->where('the_class_id', $class->id)
          ->where('year_id', $this->selected_year)
          ->first();
          $columns[] = $s->name. ' - Cohéficiant :' . $coheficiant->parameter;
          $ajax[] = 'column-'.$coheficiant->id;
        }

        $columns[] = 'Resultat finale';
        $ajax[] = 'final';

        //dd( $class->subjects);

        return view('back.notes.by-class', compact('class', 'columns', 'ajax'));
    }


    public function studentNotes(User $student)
    {
        //
        return view('back.notes.student-notes', compact('student'));
    }


    public function dataStudentNotes(User $student)
    {
        //
        $year = Session::get('yearId');

        return Datatables::of( Note::where('student_id' , Auth::id() )->where('year_id' , $year )
            //->orderBy('created_at', 'desc')
            ->orderBy('created_at', 'desc')->get() )
        ->editColumn('subject', function( $model ){

            return $model->subject->name;

        })

        ->editColumn('type', function( $model ){

            return Application::test_type($model->testyearsubclass->is_exercise);

        })



        ->editColumn('teatcher', function( $model ){

            return $model->teatcher->name. ' '. $model->teatcher->last_name;

        })

        ->editColumn('test_title', function( $model ){

            return $model->testyearsubclass->test->title;

        })

        ->editColumn('navigator', function( $model ){

            return Application::test_type_navigator( $model->testyearsubclass->navigator );

        })

        ->editColumn('minutes', function( $model ){

            return $model->done_minutes.' / '.$model->testyearsubclass->test->time_minutes.':00';

        })

        ->editColumn('note', function( $model ){

            return $model->note . ' /100';

        })

        ->make(true);
    }


}
