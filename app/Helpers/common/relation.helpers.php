<?php

namespace App\Helpers\Common;
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
    Meetingtype,
    Meeting,
    Meetingpopulating,
    PivotCoursub,
    Subjectclass,
    Teatchification,
    Demandefourniture,
    Calendarteatchification

};

use Session;
use Carbon;
use Auth;
class Relation {


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

  public function isParent(User $parent, User $student){
    $parents = User::find( $student->id )->relashionshipsParentsStudent->pluck(['id'])->toArray();
    return in_array($parent->id, $parents);
  }

  public static function studentsFromTeatcher($year_id, User $teatcher){

    $subject_classesArray = $teatcher->teatchifications->where('year_id', $year_id)->pluck('subject_the_class_id')->toArray();

    $classes = SubjectClass::whereIn('id', $subject_classesArray )->where('year_id',$year_id)->distinct()->get(['the_class_id'])->pluck('the_class_id'
)->toArray();

    return User::whereIn('the_class_id', $classes )->get();

  }


    public static function uniqueTeatchificationFromstudent($year_id, User $student){

      $ids = Subjectclass::where('year_id', $year_id)->where('the_class_id', $student->the_class_id )->pluck('id')->toArray();

      return  Teatchification::where('year_id', $year_id)->whereIn('subject_the_class_id', $ids)->distinct()->get(['user_id']) ;

    }


    public static function linkSubcourse2Course($course){

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
