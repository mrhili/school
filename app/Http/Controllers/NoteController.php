<?php

namespace App\Http\Controllers;

use App\{
    Note,
    Subjectclass,
    User,
    TheClass,
    Testyearsubclass,
    Unity
};
use Illuminate\Http\Request;
use Auth;
use Yajra\Datatables\Datatables;
use Session;
use Application;

use Math;

use RealRashid\SweetAlert\Facades\Alert;


class NoteController extends Controller
{
    protected $finalResult = [];
/*
    public function addBySubectclass(Subject $subject, TheClass $class){



      return view( 'back.notes.add-by-subjectclass' );

    }
*/
public function bySubject(User $student, Subject $subject){


  $notes_arr = [];

  $subjectClass = Subjectclass::where('the_class_id', $student->the_class_id )
  ->where('subject_id', $subject->id)->first();

    if(  $subjectClass ){

      $notes = Note::where('subject_the_class_id', $subjectClass->id)
      ->where('student_id', $student->id)
      ->get();

      foreach ($notes as $key => $note) {
        $notes_arr[ $note->id ]['name'] = $note->testyearsubclass->test->title;
        $notes_arr[ $note->id ]['note'] = $note->note;
      }

    }else{
      return view('outils.message')->with('message_array', ['message' => 'pas de subject class']);
    }


  }



  return view('back.notes.by-subunity', compact('student', 'subunity','sub_note'));
}



public function bySubunity(User $student, Subunity $subunity){

  $subjects = $student->the_class->subjects;

  $sub_note = [];

  foreach ($subjects as $key => $subject) {

    $subunity = $subject->subunity;


    $subjectClass = Subjectclass::where('the_class_id', $student->the_class_id )
    ->where('subject_id', $subject->id)->first();

    if(  $subjectClass ){


      $notes = Note::where('subject_the_class_id', $subjectClass->id)
      ->where('student_id', $student->id)
      ->get();

      if($notes->isEmpty()){
        $sub_note[ $subject->id ]['name'] = $subject->name;
        $sub_note[ $subject->id ]['note'] = 'Pas de notes';
      }else{
        $sub_note[ $subject->id ]['note'] = $notes->avg('note') * ( $subjectClass->parameter / $subjectClasses->sum('parameter') );
      }
    }



  }



  return view('back.notes.by-subunity', compact('student', 'subunity','sub_note'));
}



  public function byUnity(User $student, Unity $unity){

$subjects = $student->the_class->subjects;
$subunites = [];
foreach ($subjects as $key => $subject) {

  $subunity = $subject->subunity;


  $subjectClass = Subjectclass::where('the_class_id', $student->the_class_id )
  ->where('subject_id', $subject->id)->first();

  if(  $subjectClass ){


    $notes = Note::where('subject_the_class_id', $subjectClass->id)
    ->where('student_id', $student->id)
    ->get();


    if( array_key_exists( $subunity->id , $subunites ) ){

      $subunites[ $subunity->id ]['note'] = ($subunites[ $subunity->id ]['note'] + $notes->avg('note') * ( $subjectClass->parameter / $subjectClasses->sum('parameter') )) / 2;

    }else{

        $subunites[ $subunity->id ]['name'] = $subunity->name;
        $subunites[ $subunity->id ]['note'] = $notes->avg('note') * ( $subjectClass->parameter / $subjectClasses->sum('parameter') );

    }


  }



}



    return view('back.notes.by-unity', compact('student','unity', 'subunities'));
  }



  public function byStudent(User $student){




/////////////
$subjects = $student->the_class->subjects;


  // name => notes
  $unites = [];

  foreach ($subjects as $key => $subject) {
    // code...
    $unity = $subject->subunity->unity;

    $subjectClass = Subjectclass::where('the_class_id', $student->the_class_id )
    ->where('subject_id', $subject->id)->first();

    if(  $subjectClass ){


      $notes = Note::where('subject_the_class_id', $subjectClass->id)
      ->where('student_id', $student->id)
      ->get();


      if( array_key_exists( $unity->id , $unites ) ){

        $unites[ $unity->id ]['note'] = ($unites[ $unity->id ]['note'] + $notes->avg('note') * ( $subjectClass->parameter / $subjectClasses->sum('parameter') )) / 2;

      }else{

          $unites[ $unity->id ]['name'] = $unity->name;
          $unites[ $unity->id ]['note'] = $notes->avg('note') * ( $subjectClass->parameter / $subjectClasses->sum('parameter') );

      }


    }


  }
  /////////////


    return view('back.notes.by-student', compact('student', 'unites'));

  }



  public function finalByClass(TheClass $class){

    return view('back.notes.final-by-class', compact('class'));

  }


  public function finalByClassData(TheClass $class){

    return Datatables::of( User::where('the_class_id', $tysc->id) ->where('role', 1 )->get() )


    ->editColumn('name', function( $model ){

        return $model->full_name;

    })
    ->editColumn('final', function( $model ){

        return Math::countFinalResult( $student );

    })

    ->editColumn('detail', function( $model ){

        return link_to_route('notes.by-student', 'Detail', [ $model->id ], ['class' => 'btn btn-info btn-circle', 'target' => '_blank']);


    })


    ->make(true);

  }



    public function see(Note $note){

      if($note->test_passed_fine){


        $type = $note->testyearsubclass->test->kind;


        if($type != 2 ){

            $answers_images = json_decode( $note->answers ,true);

            if(! is_array($answers_images)){
              $answers_images = [];
            }



            return view('back.notes.see', compact('note', 'answers_images'));
        }else{
          return view('outils.message')->with('message_array', ['message' => 'Cest un test online']);
        }



      }else{
        return view('outils.message')->with('message_array', ['message' => 'Le test nest pas bien passé ou il est meme pas passé ou les infos ne sont pas encore ecris , merci']);

      }




    }


    public function storeInfo(Request $request, Note $note){

      dd( $request->test_passed_fine );

      if( $request->test_passed_fine ){
        $note->test_passed_fine = true;
      }else{
        $note->test_passed_fine = false;
      }

      $note->note = $request->note;
      $note->done_minutes = $request->done_minutes;

      $ifTrue = $note->save();

      if( $ifTrue ){

        Alert::success('Enregistrer', 'Enregistrer');

        return back();

      }else{

        Alert::error('Error', 'Pas enregistrer');

        return back()->withInput();

      }

    }



    public function modify(Note $note){

      $type = $note->testyearsubclass->test->kind;


      if($type != 2 ){

          $answers_images = json_decode( $note->answers ,true);

          return view('back.notes.modify', compact('note', 'answers_images'));
      }else{
        return 'Its online';
      }



    }


    public function byTYSCData(Testyearsubclass $tysc){

      return Datatables::of( Note::where('testyearsubclass_id', $tysc->id )

        ->where('year_id', $this->selected_year )
      )


      ->editColumn('student_id', function( $model ){

          return $model->student->full_name;

      })
      ->editColumn('modify', function( $model ){

          return link_to_route('notes.modify', 'Modifié', [ $model->id ], ['class' => 'btn btn-danger btn-circle', 'target' => '_blank']);


      })


      ->make(true);

    }

    public function byTYSC(Testyearsubclass $tysc){

      return view('back.notes.by-tysc', compact('tysc'));
    }


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

        ->editColumn('info', function( $model ){

            return link_to_route('notes.see', 'Voire', [ $model->id ], ['class' => 'btn btn-info btn-circle', 'target' => '_blank']);

        })

        ->make(true);
    }


}
