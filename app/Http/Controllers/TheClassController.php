<?php

namespace App\Http\Controllers;

use App\{
  TheClass,
  User,
  Student,
  StudentsPayment,
  Fourniture,
  Fournituration,
  History,
  Testyearsubclass,
  Subjectclass,
  Note,
  Subject

};
use Illuminate\Http\Request;
use Relation;

use RealRashid\SweetAlert\Facades\Alert;

class TheClassController extends Controller
{

  public function multipleSubjects()
  {
    $classes = TheClass::get(['id','name'])->pluck('name','id')->toArray();
    $subjects = Subject::get(['id','name'])->pluck('name','id')->toArray();

    return view('back.classes.subj-multi', compact('classes','subjects') );
  }

  public function storeMultipleSubjects(Request $request)
  {

    foreach ($request->classes as $class) {

      $class = TheClass::find( $class );

      foreach ( $request->subjects as $subject ) {

        $subject = Subject::find( $subject );

        if(!$subject){  dd($request->subjects, $subject );  }

        Relation::linkClass2Subj($class, $subject, $request );

      }

    }

    Alert::success('Les classes en etait bien linké', 'Success Message');

    return back();
  }


    public function multipleFournitures()
    {
      $classes = TheClass::get(['id','name'])->pluck('name','id')->toArray();
      $fournitures = Fourniture::get(['id','name'])->pluck('name','id')->toArray();

      return view('back.classes.four-multi', compact('classes','fournitures') );
    }

    public function storeMultipleFournitures(Request $request)
    {

      foreach ($request->classes as $class) {

        $class = TheClass::find( $class );

        foreach ( $request->fournitures as $fourniture ) {

          $fourniture = Fourniture::find( $fourniture );

          Relation::linkClass2Subj($class, $fourniture, $request );


        }

      }

      Alert::success('Les classes en etait bien link', 'Success Message');

      return back();

      //return dd($request->subjects, $request->classes );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $classes = TheClass::get();

        return view('back.classes.list', compact( 'classes' ) );
    }

    public function change4StudentPage(User $student)
    {
      $myClass = TheClass::find($student->the_class_id);
        //
        if( $student->role == 1.0 && $student->the_class_id ){

          $classes = TheClass::where('id','!=', $student->the_class_id )
          //->where('name', 'LIKE', substr($myClass->name, 0, 2). '%' )
          ->get(['id','name'])
          ->pluck('name','id')
          ->toArray();
          return view('back.classes.change-4-student', compact( 'student', 'classes','myClass'  ) );

        }else{
          return back();
        }

    }
    /*

    *change classs id in the student
    *change class in studentpayments
    ---Yes Just change but if not same class  give a req to change with consideration of payments ;)
    *take the consideration of the fournitures
    ---Just change theclassid in the existe fourniture and delete others

    -should steel have his notes even if class changed
    ---If the same class and diff sub class keep notes



    */

    public function change4Student(Request $request, User $student){

      Relation::changeClass4Student($request, $student) ;

      Alert::success('Success Title', 'Changement avec success');

      return redirect()->route('students.profile', $student->id );

    }


}
