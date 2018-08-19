<?php

namespace App\Http\Controllers;

use App\{
    Note,
    Subjectclass,
    User
};
use Illuminate\Http\Request;
use Auth;
use Yajra\Datatables\Datatables;
use Session;
use Application;
class NoteController extends Controller
{



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
