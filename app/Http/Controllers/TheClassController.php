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

      $the_class = TheClass::find( $request->class );

      //change s payments

      $spayments = StudentsPayment::where('user_id', $student->id )
        ->where('year_id', $this->selected_year )
        ->where('the_class_id', $student->the_class_id )
        ->get();


      foreach ($spayments as $sp ) {
        // code...
        $sp->the_class_id = $request->class;
        $sp->save();
      }

      //change fournituration and check if repeated
      foreach ($the_class->fournitures as $fourniture) {
          # code...

          $exist = Fournituration::where('student_id', $student->id )
            ->where('year_id', $this->selected_year )
            ->where('the_class_id', $student->the_class_id )
            ->first();

          if ( $exist ) {
            // code...
            $exist->the_class_id = $request->class;
            $exist->save();
          }else{
            // code...
            Fournituration::create([
                'student_id' => $student->id,
                'year_id' => $this->selected_year,
                'the_class_id' => $request->class,
                'fourniture_id' => $fourniture->id
            ]);

          }

      }

      $notInClassFournitures = Fournituration::where('student_id', $student->id )
        ->where('year_id', $this->selected_year )
        ->where('the_class_id', $student->the_class_id )
        ->get();

      foreach ($notInClassFournitures as $fourniture) {

        if ( $fourniture->exist && $fourniture->confirmed ) {
          // code...
          $fourniture->the_class_id = $request->class;
          $fourniture->save();
        }else {
          Fournituration::find( $fourniture->id )->delete();
        }

      }

      //Copy notes

      $new_sc_ids = Subjectclass::where('the_class_id', $request->class)->get(['the_class_id'])->toArray();

      if (!empty($new_sc_ids)) {
       // list is empty.

        $tests = Testyearsubclass::whereIn('subject_the_class_id', $new_sc_ids)->where('publish', true )->get();

        foreach($tests as $test ){
          $alt_test = Note::Testyearsubclass('year_id', $this->selected_year  )
            ->where('the_class_id', $student->the_class_id )
            ->where('subject_id', $test->subject_id )
            ->where('publish', true )
            ->where('navigator', $test->navigator )
            ->where('is_exercise', $test->is_exercise )
            ->first();

            $oldnote = Note::where('year_id', $this->selected_year  )
              ->where('student_id', $student->id )
              ->where('testyearsubclass_id', $test->id )
              ->first();

          if ($alt_test && $oldnote) {
            // code...
              $oldnote->testyearsubclass_id = $alt_test->id;
              $oldnote->the_class_id = $request->class;
              $oldnote->subject_the_class_id = $alt_test->subject_the_class_id;
              $oldnote->save();

          }else {

            Note::create([
              'testyearsubclass_id' => $test->id,
              'year_id' => $year,
              'the_class_id' => $test->subjectclass->the_class->id,
              'subject_id' => $test->subjectclass->subject->id,
              'subject_the_class_id' => $test->subjectclass->id,
              'teatcher_id' => $test->teatcher->id,
              'student_id' => $student->id,
              'note' => 0,
              'done_minutes' => 0
            ]);


          }

        }

      }

      //endcopy notes
      $shoudlDelNotes = Note::where('year_id', $this->selected_year  )
                    ->where('student_id', $student->id )
                    ->where('the_class_id', $student->the_class_id )
                    ->get();

      foreach($shoudlDelNotes as $shoudlDelNote ){

        Note::find( $shoudlDelNote->id )->delete();

      }


      $student->the_class_id = $request->class;

      $student->save();

      return redirect()->route('students.profile', $student->id );

    }

}
