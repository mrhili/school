<?php

namespace App\Helpers\Common;
use Illuminate\Http\Request;
use File;

use App\Helpers\Config\Setting;

use App\{
    Year,
    Month,
    User,
    StudentsPayment,
    Userspayment,
    History,
    HistoryCategory,
    Fournituration,
    Fourniture,
    TheClass,
    Transporting,
    Meetingtype,
    Meeting,
    Meetingpopulating,
    PivotCoursub,
    Subjectclass,
    Teatchification,
    Demandefourniture,
    Calendarteatchification,
    Course,
    Subcourse,
    Testyearsubclass,
    Note,
    Subject,
    Rule,
    Ruleholder

};



use Session;
use Carbon;
use Auth;

use ArrayHolder;
use Application;
class Relation {



    public static function my_related_classes(User $teatcher){

      $year_id = Session::get('yearId');

      $subject_classesArray = $teatcher->teatchifications
        ->where('year_id', $year_id)
        ->pluck('subject_the_class_id')
        ->toArray();

      $classes_id = SubjectClass::whereIn('id', $subject_classesArray )
        ->where('year_id',$year_id)
        ->distinct()->get(['the_class_id'])
        ->pluck('the_class_id')->toArray();

      return TheClass::whereIn('id', $classes_id)->get();



    }

  public static function if_teatcher_responsable(TheClass $class, Subject $subject, User $teatcher){

    $year = Session::get('yearId');

    $subCourse = Subjectclass::where('subject_id', $subject->id)
      ->where('the_class_id', $class->id )
      ->where('year_id', $year )
      ->first();

    if( $subCourse){


      $teatchification = Teatchification::where('subject_the_class_id', $subCourse->id)
        ->where('year_id', $year )
        ->where('user_id', $teatcher->id )
        ->first();

        if($teatchification){

          return true;

        }else{
          return false;
        }


    }



  }

  public static function linkRule(Rule $rule, User $user){


    $ruleHolder = Ruleholder::firstOrCreate([
      'rule_id' => $rule->id,
      'user_id' => $user->id,
    ]);

    $info2;

    if($ruleHolder){
      $info2 = $ruleHolder->rule->rule.' a etait prise par '.Auth::user()->name.' '.Auth::user()->last_name;


      Application::toHistory($ruleHolder, [
        50,
        'success',
        $info2
      ] );


      return $ruleHolder;
    }

  }

  public static function modelOf($type, $model){

    if( $type ){

      $modeling = Transporting::find( $model );

    }else{

      $modeling = self::byModel( ArrayHolder::deficiteTypes( $type ) , $model );
    }

    return $modeling;

  }

  public static function linkTeatcher2Subject(Request $request,User $teatcher, Subjectclass $subject_the_class_id )
  {
    // code...

    $year = Session::get('yearId');

    $teatchification = Teatchification::where('subject_the_class_id' , $subject_the_class_id->id)
      ->where('user_id' , $teatcher->id)
      ->where('year_id' , $year)
      ->first();

    if(!$teatchification){

          $teatchification = Teatchification::create([
            'subject_the_class_id' => $subject_the_class_id->id,
            'user_id' => $teatcher->id,
            'year_id' => Session::get('yearId')
          ]);

          $admin = User::find( Auth::id() );

          $creation = [

              'id_link' => $teatchification->id,
              'comment' => $request->comment,
              //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
              'info' => 'just talk',
              'hidden_note' => $request->hidden_note,
              'by_admin' => $admin->id,
              'category_history_id' => 36,
              'class' => 'success',
              //'id_link' => $request->id_link,

              ];

          $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a linker le maitre <strong>'.$teatcher->name.' </strong> au matiere qui porte le nom' . $subject_the_class_id->subject->name . ' au class ' . $subject_the_class_id->the_class->name . '  </strong>.'  ;

          History::create( $creation );
    }

    return $teatchification;

  }

  public static function linkClass2Subj(TheClass $class, Subject $subject, Request $request ){

            $year = Session::get('yearId');

            $pivot = $class->subjects()->attach( $subject->id, ['parameter' => $request->parameter, 'year_id' => $year  ]);

            $admin = User::find( Auth::id() );

            $creation = [

                'id_link' => $subject->id,
                'comment' => $request->comment,
                //lhomme a payeé un montant 500 dh de pour letudiant qui est dans la class 6  sur le payement du mois 6 sur lanée 2017/2018 et ila remplie le charge parsquil avait rien sur ce mois et il falait quil pay 700dh
                'info' => 'just talk',
                'hidden_note' => $request->hidden_note,
                'by_admin' => $admin->id,

                'category_history_id' => 13,
                'class' => 'success',
                //'id_link' => $request->id_link,

                ];

            $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .'</strong> a ajouté une matier qui porte le nom <strong>'.$subject->name.' </strong> au class qui porte le nom' . $class->name . ' </strong> avec cohéficiant </strong> au class qui porte le nom' . $request->parameter . ' </strong>.'  ;

            History::create( $creation );
  }

/************************************************/



    public static function changeClass4Student(Request $request, User $student){

      $the_class = TheClass::find( $request->class );

      //change s payments

      $spayments = StudentsPayment::where('user_id', $student->id )
        ->where('year_id', Session::get('yearId') )
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
            ->where('year_id', Session::get('yearId') )
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
                'year_id' => Session::get('yearId'),
                'the_class_id' => $request->class,
                'fourniture_id' => $fourniture->id
            ]);

          }

      }

      $notInClassFournitures = Fournituration::where('student_id', $student->id )
        ->where('year_id', Session::get('yearId') )
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

      $new_sc_ids = Subjectclass::where('the_class_id', $request->class)
      ->get(['the_class_id'])->toArray();

      if (!empty($new_sc_ids)) {
       // list is empty.

        $tests = Testyearsubclass::whereIn('subject_the_class_id', $new_sc_ids)
        ->where('publish', true )->get();

        foreach($tests as $test ){
          $alt_test = Note::where('year_id', Session::get('yearId')  )
            ->where('the_class_id', $student->the_class_id )
            ->where('subject_id', $test->subject_id )
            ->where('publish', true )
            ->where('navigator', $test->navigator )
            ->where('is_exercise', $test->is_exercise )
            ->first();

            $oldnote = Note::where('year_id', Session::get('yearId')  )
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
      $shoudlDelNotes = Note::where('year_id', Session::get('yearId')  )
                    ->where('student_id', $student->id )
                    ->where('the_class_id', $student->the_class_id )
                    ->get();

      foreach($shoudlDelNotes as $shoudlDelNote ){

        Note::find( $shoudlDelNote->id )->delete();

      }


      $student->the_class_id = $request->class;

      $student->save();


    }

/********************************************/




    public static function linkClass2Four(TheClass $class, Fourniture $fourniture, Request $request ){


              $pivot = $class->fournitures()->attach( $fourniture->id );

              $admin = User::find( Auth::id() );

              $creation = [

                  'id_link' => $fourniture->id,
                  'comment' => $request->comment,
                  'info' => 'just talk',
                  'hidden_note' => $request->hidden_note,
                  'by_admin' => $admin->id,

                  'category_history_id' => 24,
                  'class' => 'success',
                  //'id_link' => $request->id_link,

                  ];

              $creation['info'] = 'Ladmin : <strong>'.$admin->name .' '. $admin->last_name .
              '</strong> a ajouté une fourniture qui porte le nom <strong>'.
              $fourniture->name.' </strong> au class qui porte le nom' . $class->name . ' </strong>.'  ;

              History::create( $creation );

              self::fillStudentsFournituration( $class, $fourniture  );
    }

  public static function testsYouShouldStart(User $student ){

    $year = Session::get('yearId');

    $sc_ids = Subjectclass::where('the_class_id', $student->the_class_id)->get(['the_class_id'])->toArray();

    if (!empty($sc_ids)) {
     // list is empty.
     //conditions, publish kda ...
      $tests = Testyearsubclass::whereIn('subject_the_class_id', $sc_ids)
        ->where('publish', true )->get();

      foreach($tests as $test ){

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

  public static function beginNoteCollections(Testyearsubclass $test ){

    $year = Session::get('yearId');

    $students = User::where('the_class_id', $test->subjectclass->the_class->id )->where('role', 1)->get();
    foreach( $students as $student){

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

  public static function calendar_teat_from_teatcher(User $teatcher){
    $year = Session::get('yearId');

    $t = Teatchification::where('user_id', $teatcher->id )->where('year_id', $year )->get(['id'])->toArray();

    return Calendarteatchification::whereIn('teatchification_id', $t)->where('year_id', $year )->get();
  }


  public static function calendar_teat_from_class(TheClass $class){
    $year = Session::get('yearId');

    $sc = Subjectclass::where('the_class_id', $class->id)->where('year_id', $year )->get(['id'])->toArray();

    $t = Teatchification::whereIn('subject_the_class_id', $sc)->where('year_id', $year )->get(['id'])->toArray();

    return Calendarteatchification::whereIn('teatchification_id', $t)->where('year_id', $year )->get();
  }

  public static function calendar_teat_ids_from_class(TheClass $class){
    $year = Session::get('yearId');

    $sc = Subjectclass::where('the_class_id', $class->id)->where('year_id', $year )->get(['id'])->toArray();

    $t = Teatchification::whereIn('subject_the_class_id', $sc)->where('year_id', $year )->get(['id'])->toArray();

    return Calendarteatchification::whereIn('teatchification_id', $t)->where('year_id', $year )->get(['calendar_id'])->toArray();
  }

  public static function  isParent(User $parent, User $student){
    $parents = User::find( $student->id )->relashionshipsParentsStudent->pluck(['id'])->toArray();
    return in_array($parent->id, $parents);
  }

  public static function studentsFromTeatcher($year_id, User $teatcher){

    $subject_classesArray = $teatcher->teatchifications->where('year_id', $year_id)->pluck('subject_the_class_id')->toArray();

    $classes = SubjectClass::whereIn('id', $subject_classesArray )
    ->where('year_id',$year_id)
    ->distinct()->get(['the_class_id'])
    ->pluck('the_class_id'
)->toArray();

    return User::whereIn('the_class_id', $classes )->get();

  }


    public static function uniqueTeatchificationFromstudent($year_id, User $student){

      $ids = Subjectclass::where('year_id', $year_id)->where('the_class_id', $student->the_class_id )->pluck('id')->toArray();

      return  Teatchification::where('year_id', $year_id)->whereIn('subject_the_class_id', $ids)->distinct()->get(['user_id']) ;

    }


    public static function linkSubcourse2Course(Course $course, Subcourse $subcourse){

        $sorting = $course->subcourses()->pluck('sorting')->toArray();

        sort($sorting);

        $end = end($sorting);

        $course->subcourses()->attach($subcourse->id, ['sorting' => ++$end ]);

        return $end;

    }





    public static function linkSubcourse2CourseAfter($course,$subcourse, $id){

        $beforeItem = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $id)->first();

        $sortOfBefore = $beforeItem->sorting;

        $sorting = $course->subcourses()->pluck('sorting')->toArray();

        sort($sorting);

        $baster = $sortOfBefore +1;
        $baster2 = false;

        foreach ($sorting as $sort) {

            if( $sort ==  $baster){

                $toChange = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $id)->where('sorting', $baster)->first();

                if( $toChange ){

                    if( $baster2 == false ){

                        $course->subcourses()->attach($subcourse->id, ['sorting' => $baster ]);

                        $baster2 = true;

                    }

                    $toChange->sorting = ++$baster;
                    $toChange->save();

                    continue;
                }


            }

            if( $baster2 ){

                $toChange = PivotCoursub::where('course_id', $course->id)->where('sorting', $baster)->first();

                $toChange->sorting = ++$baster;
                $toChange->save();

            }


        }

        return $sortOfBefore;

    }








//Relation::linkSubcourse2CourseBefore($course, $newsubcourse ,$subcourse->id);

    public static function linkSubcourse2CourseBefore($course,$subcourse, $id){

        $beforeItem = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $id)->first();

        $sortOfBefore = $beforeItem->sorting;

        $sorting = $course->subcourses()->pluck('sorting')->toArray();

        sort($sorting);

        $baster = $sortOfBefore;
        $baster2 = false;

        foreach ($sorting as $sort) {

            if( $sort ==  $baster){

                $toChange = PivotCoursub::where('course_id', $course->id)->where('subcourse_id', $id)->where('sorting', $baster)->first();

                if( $toChange ){

                    if( $baster2 == false ){

                        $course->subcourses()->attach($subcourse->id, ['sorting' => $baster ]);

                        $baster2 = true;

                    }

                    $toChange->sorting = ++$baster;
                    $toChange->save();

                    continue;
                }


            }

            if( $baster2 ){

                $toChange = PivotCoursub::where('course_id', $course->id)->where('sorting', $baster)->first();

                $toChange->sorting = ++$baster;
                $toChange->save();

            }


        }

        return $sortOfBefore;

    }


    public static function fillPopulateMeeting($meeting_id){

        $meeting = Meeting::find( $meeting_id );

        $meetingtype = Meetingtype::find( $meeting->meetingtype_id );

        $loop = json_decode( $meetingtype->roles , true);

        foreach ($loop as $role) {
        # code...
            $people = User::where('role', $role )->pluck('id')->toArray();

            //dd($people);

            foreach ($people as $invited_id) {
            # code...

                Meetingpopulating::create([
                    'meeting_id' =>  $meeting->id,
                    'creator_id' => Auth::id(),
                    'invited_id' => $invited_id
                ]);

            }


        }

    }


    public static function fillStudentsFournituration( TheClass $the_class, Fourniture $fourniture  ){

        $year = Session::get('yearId');

        foreach ($the_class->students as $student) {
            # code...
            Fournituration::create([
                'student_id' => $student->id,
                'year_id' => $year,
                'the_class_id' => $the_class->id,
                'fourniture_id' => $fourniture->id
            ]);
        }

    }

    public static function fillFournituration( $student , $year , $class  ){

        $the_class = TheClass::find( $class);


        foreach ($the_class->fournitures as $fourniture) {
            # code...
            Fournituration::create([
                'student_id' => $student,
                'year_id' => $year,
                'the_class_id' => $the_class->id,
                'fourniture_id' => $fourniture->id
            ]);
        }


    }
    public static function fillStudentsPayment( $student , $year , $class , $shouldPay = 0,$transportPay = 0,$addClassesPay = 0, $addSavingPay = 0,$addAssurencePay = 0, $addTransAssurencePay  ){

        $months = Month::findMany([1, 2, 3, 4, 5, 6, 9, 10, 11, 12]);

        foreach ($months as $month) {
            # code...

            StudentsPayment::create([
                'user_id' => $student,
                'year_id' => $year,
                'the_class_id' => $class,
                'month_id' => $month->id,
                'should_pay' => $shouldPay,
                'transport_pay' => $transportPay,
                'add_classes_pay' => $addClassesPay,
            ]);

        }

        // frais denreg

        $saving = Month::find(13);


        StudentsPayment::create([
            'user_id' => $student,
            'year_id' => $year,
            'the_class_id' => $class,
            'month_id' => $saving->id,
            'should_pay' => $addSavingPay,
            'transport_pay' => 0,
            'add_classes_pay' => 0,
        ]);

        // frais assurenc

        $assurence = Month::find(14);


        StudentsPayment::create([
            'user_id' => $student,
            'year_id' => $year,
            'the_class_id' => $class,
            'month_id' => $assurence->id,
            'should_pay' => $addAssurencePay,
            'transport_pay' => 0,
            'add_classes_pay' => 0,
        ]);

        // frais trans asurence

        $trans_assurence = Month::find(15);


        StudentsPayment::create([
            'user_id' => $student,
            'year_id' => $year,
            'the_class_id' => $class,
            'month_id' => $trans_assurence->id,
            'should_pay' => $addTransAssurencePay,
            'transport_pay' => 0,
            'add_classes_pay' => 0,
        ]);


    }
    //($user->id, Session::get('yearId'), $request->should_be_payed, $request->cnss, $request->payment);
    //elation::fillUsersPayment($user->id, Session::get('yearId'), $request->should_be_payed, $request->cnss, $request->payment);

    public static function fillUsersPayment( $user , $year  ,$shouldBePayed ,$cnssPayment ){

        $months = Month::findMany([1, 2, 3, 4, 5, 6, 9, 10, 11, 12]);

        foreach ($months as $month) {
            # code...

            Userspayment::create([
                'user_id' => $user,
                'year_id' => $year,
                'month_id' => $month->id,
                'should_be_payed' => $shouldBePayed,
                'cnss_payment' => $cnssPayment

            ]);

        }

    }

    public static function byModel($model, $id){

        $model_name = 'App\\'.$model;
        return $model_name::where('id', $id)->first();

    }

}
